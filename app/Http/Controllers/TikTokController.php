<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class TikTokController extends Controller
{
    private $clientKey;
    private $clientSecret;
    private $redirectUri;
    private $baseUrl;

    public function __construct()
    {
        $this->clientKey = config('tiktok.client_key');
        $this->clientSecret = config('tiktok.client_secret');
        $this->redirectUri = route('tiktok.callback');
        $this->baseUrl = config('tiktok.base_url');
    }

    /**
     * Redirect user to TikTok OAuth
     */
    public function redirect()
    {
        $state = bin2hex(random_bytes(16));
        Session::put('tiktok_state', $state);
        
        $authUrl = config('tiktok.auth_url') . '?' . http_build_query([
            'client_key' => $this->clientKey,
            'scope' => implode(',', config('tiktok.scopes')),
            'response_type' => 'code',
            'redirect_uri' => $this->redirectUri,
            'state' => $state,
        ]);

        return redirect($authUrl);
    }

    /**
     * Handle TikTok OAuth callback
     */
    public function callback(Request $request)
    {
        // Verify state parameter
        if ($request->get('state') !== Session::get('tiktok_state')) {
            return redirect()->route('generator')->with('error', 'Invalid state parameter');
        }

        $code = $request->get('code');
        if (!$code) {
            return redirect()->route('generator')->with('error', 'Authorization code not received');
        }

        try {
            // Exchange code for access token
            $response = Http::asForm()->post($this->baseUrl . '/oauth/token/', [
                'client_key' => $this->clientKey,
                'client_secret' => $this->clientSecret,
                'code' => $code,
                'grant_type' => 'authorization_code',
                'redirect_uri' => $this->redirectUri,
            ]);

            if ($response->successful()) {
                $tokenData = $response->json();
                
                // Store tokens in session
                Session::put('tiktok_access_token', $tokenData['access_token']);
                Session::put('tiktok_refresh_token', $tokenData['refresh_token']);
                Session::put('tiktok_open_id', $tokenData['open_id']);
                Session::put('tiktok_expires_at', time() + $tokenData['expires_in']);
                
                // Fetch user profile data
                $this->fetchUserProfile($tokenData['access_token']);
                
                return redirect()->route('generator')->with('success', 'TikTok account connected successfully!');
            } else {
                $error = $response->json();
                return redirect()->route('generator')->with('error', 'Failed to get access token: ' . ($error['error_description'] ?? 'Unknown error'));
            }
        } catch (\Exception $e) {
            return redirect()->route('generator')->with('error', 'Error connecting TikTok account: ' . $e->getMessage());
        }
    }

    /**
     * Fetch user profile information
     */
    private function fetchUserProfile($accessToken)
    {
        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $accessToken,
            ])->get($this->baseUrl . '/user/info/', [
                'fields' => 'open_id,union_id,avatar_url,display_name,bio_description,profile_deep_link,is_verified,follower_count,following_count,likes_count,video_count'
            ]);

            if ($response->successful()) {
                $profileData = $response->json();
                Session::put('tiktok_profile', $profileData);
            }
        } catch (\Exception $e) {
            // Log error but don't fail the entire flow
            \Log::error('Failed to fetch TikTok profile: ' . $e->getMessage());
        }
    }

    /**
     * Refresh access token
     */
    public function refreshToken()
    {
        $refreshToken = Session::get('tiktok_refresh_token');
        if (!$refreshToken) {
            return false;
        }

        try {
            $response = Http::asForm()->post($this->baseUrl . '/oauth/token/', [
                'client_key' => $this->clientKey,
                'client_secret' => $this->clientSecret,
                'grant_type' => 'refresh_token',
                'refresh_token' => $refreshToken,
            ]);

            if ($response->successful()) {
                $tokenData = $response->json();
                
                Session::put('tiktok_access_token', $tokenData['access_token']);
                Session::put('tiktok_refresh_token', $tokenData['refresh_token']);
                Session::put('tiktok_expires_at', time() + $tokenData['expires_in']);
                
                return true;
            }
        } catch (\Exception $e) {
            \Log::error('Failed to refresh TikTok token: ' . $e->getMessage());
        }

        return false;
    }

    /**
     * Get current user profile data
     */
    public function getProfile()
    {
        // Check if token is expired and refresh if needed
        if (time() >= Session::get('tiktok_expires_at', 0)) {
            if (!$this->refreshToken()) {
                return null;
            }
        }

        return Session::get('tiktok_profile');
    }

    /**
     * Disconnect TikTok account
     */
    public function disconnect()
    {
        $accessToken = Session::get('tiktok_access_token');
        if ($accessToken) {
            try {
                Http::asForm()->post($this->baseUrl . '/oauth/revoke/', [
                    'client_key' => $this->clientKey,
                    'client_secret' => $this->clientSecret,
                    'token' => $accessToken,
                ]);
            } catch (\Exception $e) {
                \Log::error('Failed to revoke TikTok token: ' . $e->getMessage());
            }
        }

        // Clear all TikTok data from session
        Session::forget([
            'tiktok_access_token',
            'tiktok_refresh_token',
            'tiktok_open_id',
            'tiktok_expires_at',
            'tiktok_profile'
        ]);

        return redirect()->route('generator')->with('success', 'TikTok account disconnected successfully!');
    }
} 
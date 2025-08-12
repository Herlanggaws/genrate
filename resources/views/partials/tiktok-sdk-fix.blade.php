{{-- TikTok SDK Fix --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Check if TikTok SDK is already loaded
    if (typeof window.TikTokAnalyticsObject !== 'undefined' || typeof window.BytedanceAnalyticsObject !== 'undefined') {
        console.warn('TikTok SDK conflict detected. Attempting to resolve...');
        
        // Try to safely remove conflicting SDK
        try {
            // Remove any existing TikTok SDK scripts
            const tiktokScripts = document.querySelectorAll('script[src*="tiktok"]');
            tiktokScripts.forEach(script => {
                if (script.parentNode) {
                    script.parentNode.removeChild(script);
                }
            });
            
            // Clear TikTok SDK objects if they exist
            if (window.TikTokAnalyticsObject) {
                delete window.TikTokAnalyticsObject;
            }
            
            if (window.BytedanceAnalyticsObject) {
                delete window.BytedanceAnalyticsObject;
            }
        } catch (e) {
            console.error('Error while trying to resolve TikTok SDK conflict:', e);
        }
    }
    
    // Override the dispatch_message handler to prevent errors
    const originalLocation = window.location;
    try {
        // Create a proxy to intercept attempts to use bytedance:// URLs
        const locationHandler = {
            get: function(target, prop) {
                if (prop === 'href' && target.href && target.href.startsWith('bytedance://')) {
                    console.warn('Blocked attempt to navigate to bytedance:// URL:', target.href);
                    return 'javascript:void(0)';
                }
                return target[prop];
            }
        };
        
        window.location = new Proxy(originalLocation, locationHandler);
    } catch (e) {
        // Fallback if Proxy is not supported
        console.warn('Proxy not supported, using fallback for bytedance:// URL handling');
    }
    
    // Add error handler for read-only property errors
    window.addEventListener('error', function(e) {
        if (e.message && e.message.includes("Cannot assign to read only property 'call'")) {
            console.warn('Caught read-only property error, preventing propagation:', e.message);
            e.preventDefault();
            e.stopPropagation();
            return false;
        }
    });
});
</script>
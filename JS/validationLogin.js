document.addEventListener('DOMContentLoaded', function () {
    // Get the screen resolution (width x height)
    var screenResolution = window.screen.width + 'x' + window.screen.height;
    
    // Get the operating system using the getOperatingSystem function
    var operatingSystem = getOperatingSystem();

    // Set the values of the hidden fields with the screen resolution and operating system
    document.getElementById('screenResolution').value = screenResolution;
    document.getElementById('operatingSystem').value = operatingSystem;
});

function getOperatingSystem() {
    var userAgent = navigator.userAgent;
    if (userAgent.includes('Windows NT')) {
        return 'Windows';
    } else if (userAgent.includes('Mac OS X')) {
        return 'macOS';
    } else if (userAgent.includes('Linux')) {
        return 'Linux';
    } else if (userAgent.includes('Android')) {
        return 'Android';
    } else if (userAgent.includes('iPhone') || userAgent.includes('iPad')) {
        return 'iOS';
    } else {
        return 'Unknown';
    }
}

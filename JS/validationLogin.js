document.addEventListener('DOMContentLoaded', function () {
    // Obtener el sistema operativo y la resolución de la pantalla
    var screenResolution = window.screen.width + 'x' + window.screen.height;
    var operatingSystem = getOperatingSystem();

    // Establecer los valores de los campos ocultos
    document.getElementById('screenResolution').value = screenResolution;
    document.getElementById('operatingSystem').value = operatingSystem;
});

// Función para obtener el sistema operativo
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

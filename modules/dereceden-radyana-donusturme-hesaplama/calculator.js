function hcDegToRad() {
    const deg = parseFloat(document.getElementById('hc-degrad-deg').value);
    if (isNaN(deg)) return;
    document.getElementById('hc-degrad-rad').value = (deg * Math.PI / 180).toFixed(6);
}

function hcRadToDeg() {
    const rad = parseFloat(document.getElementById('hc-degrad-rad').value);
    if (isNaN(rad)) return;
    document.getElementById('hc-degrad-deg').value = (rad * 180 / Math.PI).toFixed(2);
}

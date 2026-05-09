function hcRadToDeg() {
    const rad = parseFloat(document.getElementById('hc-raddeg-rad').value);
    if (isNaN(rad)) return;
    document.getElementById('hc-raddeg-deg').value = (rad * 180 / Math.PI).toFixed(2);
}

function hcDegToRad() {
    const deg = parseFloat(document.getElementById('hc-raddeg-deg').value);
    if (isNaN(deg)) return;
    document.getElementById('hc-raddeg-rad').value = (deg * Math.PI / 180).toFixed(6);
}

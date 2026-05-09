function hcWToMo() {
    const w = parseFloat(document.getElementById('hc-wmo-w').value);
    if (isNaN(w)) return;
    document.getElementById('hc-wmo-mo').value = (w / 4.34524).toFixed(2);
}

function hcMoToW() {
    const mo = parseFloat(document.getElementById('hc-wmo-mo').value);
    if (isNaN(mo)) return;
    document.getElementById('hc-wmo-w').value = (mo * 4.34524).toFixed(2);
}

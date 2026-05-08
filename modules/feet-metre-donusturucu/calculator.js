function hcFtToM() {
    const ft = parseFloat(document.getElementById('hc-ftm-ft').value);
    if (isNaN(ft)) return;
    document.getElementById('hc-ftm-m').value = (ft * 0.3048).toFixed(4);
}

function hcMToFt() {
    const m = parseFloat(document.getElementById('hc-ftm-m').value);
    if (isNaN(m)) return;
    document.getElementById('hc-ftm-ft').value = (m / 0.3048).toFixed(4);
}

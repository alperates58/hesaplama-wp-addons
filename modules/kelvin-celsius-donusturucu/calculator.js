function hcKToC() {
    const k = parseFloat(document.getElementById('hc-kc-k').value);
    if (isNaN(k)) return;
    document.getElementById('hc-kc-c').value = (k - 273.15).toFixed(2);
}

function hcCToK() {
    const c = parseFloat(document.getElementById('hc-kc-c').value);
    if (isNaN(c)) return;
    document.getElementById('hc-kc-k').value = (c + 273.15).toFixed(2);
}

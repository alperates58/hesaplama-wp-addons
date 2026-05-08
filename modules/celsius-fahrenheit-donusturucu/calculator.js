function hcCToF() {
    const c = parseFloat(document.getElementById('hc-cf-c').value);
    if (isNaN(c)) return;
    document.getElementById('hc-cf-f').value = (c * 1.8 + 32).toFixed(1);
}

function hcFToC() {
    const f = parseFloat(document.getElementById('hc-cf-f').value);
    if (isNaN(f)) return;
    document.getElementById('hc-cf-c').value = ((f - 32) / 1.8).toFixed(1);
}

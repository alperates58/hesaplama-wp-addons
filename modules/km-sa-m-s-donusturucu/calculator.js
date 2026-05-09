function hcKmhToMs() {
    const kmh = parseFloat(document.getElementById('hc-kmhms-kmh').value);
    if (isNaN(kmh)) return;
    document.getElementById('hc-kmhms-ms').value = (kmh / 3.6).toFixed(4);
}

function hcMsToKmh() {
    const ms = parseFloat(document.getElementById('hc-kmhms-ms').value);
    if (isNaN(ms)) return;
    document.getElementById('hc-kmhms-kmh').value = (ms * 3.6).toFixed(4);
}

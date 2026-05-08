function hcDToH() {
    const d = parseFloat(document.getElementById('hc-dh-d').value);
    if (isNaN(d)) return;
    document.getElementById('hc-dh-h').value = (d * 24).toLocaleString('tr-TR', {useGrouping: false});
}

function hcHToD() {
    const h = parseFloat(document.getElementById('hc-dh-h').value);
    if (isNaN(h)) return;
    document.getElementById('hc-dh-d').value = (h / 24).toLocaleString('tr-TR', {useGrouping: false, maximumFractionDigits: 4});
}

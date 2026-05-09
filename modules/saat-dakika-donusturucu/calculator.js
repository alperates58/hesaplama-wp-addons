function hcHToMin() {
    const h = parseFloat(document.getElementById('hc-hmin-h').value);
    if (isNaN(h)) return;
    document.getElementById('hc-hmin-min').value = (h * 60).toLocaleString('tr-TR', {useGrouping: false});
}

function hcMinToH() {
    const min = parseFloat(document.getElementById('hc-hmin-min').value);
    if (isNaN(min)) return;
    document.getElementById('hc-hmin-h').value = (min / 60).toLocaleString('tr-TR', {useGrouping: false, maximumFractionDigits: 4});
}

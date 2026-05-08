function hcJToKwh() {
    const j = parseFloat(document.getElementById('hc-jkwh-j').value);
    if (isNaN(j)) return;
    const kwh = j / 3600000;
    document.getElementById('hc-jkwh-kwh').value = kwh.toLocaleString('tr-TR', {maximumFractionDigits: 10, useGrouping: false});
}

function hcKwhToJ() {
    const kwh = parseFloat(document.getElementById('hc-jkwh-kwh').value);
    if (isNaN(kwh)) return;
    const j = kwh * 3600000;
    document.getElementById('hc-jkwh-j').value = j.toLocaleString('tr-TR', {maximumFractionDigits: 0, useGrouping: false});
}

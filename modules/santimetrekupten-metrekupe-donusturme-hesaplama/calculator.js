function hcCm3ToM3() {
    const cm3 = parseFloat(document.getElementById('hc-cm3m3-cm3').value);
    if (isNaN(cm3)) return;
    document.getElementById('hc-cm3m3-m3').value = (cm3 / 1000000).toLocaleString('tr-TR', {useGrouping: false, maximumFractionDigits: 10});
}

function hcM3ToCm3() {
    const m3 = parseFloat(document.getElementById('hc-cm3m3-m3').value);
    if (isNaN(m3)) return;
    document.getElementById('hc-cm3m3-cm3').value = (m3 * 1000000).toLocaleString('tr-TR', {useGrouping: false});
}

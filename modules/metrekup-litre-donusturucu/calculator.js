function hcM3ToL() {
    const m3 = parseFloat(document.getElementById('hc-m3l-m3').value);
    if (isNaN(m3)) return;
    document.getElementById('hc-m3l-l').value = (m3 * 1000).toLocaleString('tr-TR', {useGrouping: false});
}

function hcLToM3() {
    const l = parseFloat(document.getElementById('hc-m3l-l').value);
    if (isNaN(l)) return;
    document.getElementById('hc-m3l-m3').value = (l / 1000).toLocaleString('tr-TR', {useGrouping: false});
}

function hcCmToM() {
    const cm = parseFloat(document.getElementById('hc-cmm-cm').value);
    if (isNaN(cm)) return;
    document.getElementById('hc-cmm-m').value = (cm / 100).toLocaleString('tr-TR', {useGrouping: false});
}

function hcMToCm() {
    const m = parseFloat(document.getElementById('hc-cmm-m').value);
    if (isNaN(m)) return;
    document.getElementById('hc-cmm-cm').value = (m * 100).toLocaleString('tr-TR', {useGrouping: false});
}

function hcUmToMm() {
    const um = parseFloat(document.getElementById('hc-ummm-um').value);
    if (isNaN(um)) return;
    document.getElementById('hc-ummm-mm').value = (um / 1000).toLocaleString('tr-TR', {useGrouping: false, maximumFractionDigits: 6});
}

function hcMmToUm() {
    const mm = parseFloat(document.getElementById('hc-ummm-mm').value);
    if (isNaN(mm)) return;
    document.getElementById('hc-ummm-um').value = (mm * 1000).toLocaleString('tr-TR', {useGrouping: false});
}

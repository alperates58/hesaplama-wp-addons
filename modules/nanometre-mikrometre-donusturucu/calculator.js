function hcNmToUm() {
    const nm = parseFloat(document.getElementById('hc-nmum-nm').value);
    if (isNaN(nm)) return;
    document.getElementById('hc-nmum-um').value = (nm / 1000).toLocaleString('tr-TR', {useGrouping: false, maximumFractionDigits: 6});
}

function hcUmToNm() {
    const um = parseFloat(document.getElementById('hc-nmum-um').value);
    if (isNaN(um)) return;
    document.getElementById('hc-nmum-nm').value = (um * 1000).toLocaleString('tr-TR', {useGrouping: false});
}

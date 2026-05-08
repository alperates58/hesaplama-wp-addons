function hcLToMl() {
    const l = parseFloat(document.getElementById('hc-lml-l').value);
    if (isNaN(l)) return;
    document.getElementById('hc-lml-ml').value = (l * 1000).toLocaleString('tr-TR', {useGrouping: false});
}

function hcMlToL() {
    const ml = parseFloat(document.getElementById('hc-lml-ml').value);
    if (isNaN(ml)) return;
    document.getElementById('hc-lml-l').value = (ml / 1000).toLocaleString('tr-TR', {useGrouping: false});
}

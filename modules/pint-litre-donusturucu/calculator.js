function hcPintToL() {
    const pint = parseFloat(document.getElementById('hc-pintl-pint').value);
    const type = parseFloat(document.getElementById('hc-pintl-type').value);
    if (isNaN(pint)) return;
    document.getElementById('hc-pintl-l').value = (pint * type).toFixed(4);
}

function hcLToPint() {
    const l = parseFloat(document.getElementById('hc-pintl-l').value);
    const type = parseFloat(document.getElementById('hc-pintl-type').value);
    if (isNaN(l)) return;
    document.getElementById('hc-pintl-pint').value = (l / type).toFixed(4);
}

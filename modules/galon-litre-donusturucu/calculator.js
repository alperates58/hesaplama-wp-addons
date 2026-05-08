function hcGalToL() {
    const gal = parseFloat(document.getElementById('hc-gall-gal').value);
    if (isNaN(gal)) return;
    document.getElementById('hc-gall-l').value = (gal * 3.78541).toFixed(4);
}

function hcLToGal() {
    const l = parseFloat(document.getElementById('hc-gall-l').value);
    if (isNaN(l)) return;
    document.getElementById('hc-gall-gal').value = (l / 3.78541).toFixed(4);
}

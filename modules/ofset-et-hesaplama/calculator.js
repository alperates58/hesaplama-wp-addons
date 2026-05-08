function hcEtHesapla() {
    const w1 = parseFloat(document.getElementById('hc-et-w1').value);
    const e1 = parseFloat(document.getElementById('hc-et-e1').value);
    const w2 = parseFloat(document.getElementById('hc-et-w2').value);
    const e2 = parseFloat(document.getElementById('hc-et-e2').value);

    if (isNaN(w1) || isNaN(e1) || isNaN(w2) || isNaN(e2)) {
        alert('Lütfen tüm değerleri girin.');
        return;
    }

    const inner = ((w2 - w1) * 25.4 / 2) + (e2 - e1);
    const outer = ((w2 - w1) * 25.4 / 2) - (e2 - e1);

    const innerText = inner > 0 ? inner.toFixed(1) + " mm içeride" : Math.abs(inner).toFixed(1) + " mm dışarıda";
    const outerText = outer > 0 ? outer.toFixed(1) + " mm dışarıda" : Math.abs(outer).toFixed(1) + " mm içeride";

    document.getElementById('hc-et-inner').innerText = innerText;
    document.getElementById('hc-et-outer').innerText = outerText;

    document.getElementById('hc-et-result').classList.add('visible');
}

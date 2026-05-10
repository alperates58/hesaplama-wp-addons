function hcInvMatrixHesapla() {
    const a = parseFloat(document.getElementById('hc-m-a').value);
    const b = parseFloat(document.getElementById('hc-m-b').value);
    const c = parseFloat(document.getElementById('hc-m-c').value);
    const d = parseFloat(document.getElementById('hc-m-d').value);

    if (isNaN(a) || isNaN(b) || isNaN(c) || isNaN(d)) {
        alert('Lütfen tüm değerleri giriniz.');
        return;
    }

    const det = (a * d) - (b * c);

    if (det === 0) {
        alert('Determinant 0 olduğu için matrisin tersi yoktur.');
        return;
    }

    // A^-1 = 1/det * [d -b; -c a]
    const ra = d / det;
    const rb = -b / det;
    const rc = -c / det;
    const rd = a / det;

    const fmt = (n) => n.toLocaleString('tr-TR', { maximumFractionDigits: 3 });

    document.getElementById('hc-m-res-a').innerText = fmt(ra);
    document.getElementById('hc-m-res-b').innerText = fmt(rb);
    document.getElementById('hc-m-res-c').innerText = fmt(rc);
    document.getElementById('hc-m-res-d').innerText = fmt(rd);
    document.getElementById('hc-m-det').innerText = `Determinant: ${det}`;
    
    document.getElementById('hc-ters-matris-result').classList.add('visible');
}

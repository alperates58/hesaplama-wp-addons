function hcToleranceHesapla() {
    const nominal = parseFloat(document.getElementById('hc-t-nominal').value);
    const tol = parseFloat(document.getElementById('hc-t-val').value);

    if (isNaN(nominal) || isNaN(tol)) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    const upper = nominal + Math.abs(tol);
    const lower = nominal - Math.abs(tol);

    document.getElementById('hc-t-upper').innerText = upper.toLocaleString('tr-TR');
    document.getElementById('hc-t-lower').innerText = lower.toLocaleString('tr-TR');
    document.getElementById('hc-tolerans-result').classList.add('visible');
}

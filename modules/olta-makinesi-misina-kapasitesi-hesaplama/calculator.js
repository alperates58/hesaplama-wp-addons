function hcFishingLineHesapla() {
    const d1 = parseFloat(document.getElementById('hc-fl-orig-dia').value);
    const l1 = parseFloat(document.getElementById('hc-fl-orig-len').value);
    const d2 = parseFloat(document.getElementById('hc-fl-new-dia').value);

    if (!d1 || !l1 || !d2) {
        alert('Lütfen tüm çap ve uzunluk bilgilerini giriniz.');
        return;
    }

    // Formula: (D1^2 * L1) = (D2^2 * L2)
    // L2 = (D1^2 * L1) / D2^2
    const l2 = (Math.pow(d1, 2) * l1) / Math.pow(d2, 2);

    const resVal = document.getElementById('hc-fl-res-val');
    resVal.innerText = Math.round(l2).toLocaleString('tr-TR');

    document.getElementById('hc-fishing-line-result').classList.add('visible');
}

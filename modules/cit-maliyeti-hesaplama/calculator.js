function hcFenceCostHesapla() {
    const L = parseFloat(document.getElementById('hc-fc-len').value);
    const M = parseFloat(document.getElementById('hc-fc-mat').value);
    const W = parseFloat(document.getElementById('hc-fc-labor').value);

    if (!L) {
        alert('Lütfen uzunluk giriniz.');
        return;
    }

    const total = L * (M + W);

    const resVal = document.getElementById('hc-fc-res-val');
    resVal.innerText = total.toLocaleString('tr-TR', { minimumFractionDigits: 0, maximumFractionDigits: 0 }) + " ₺";

    document.getElementById('hc-fence-cost-result').classList.add('visible');
}

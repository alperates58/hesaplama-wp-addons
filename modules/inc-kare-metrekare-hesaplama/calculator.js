function hcSqinToSqmHesapla() {
    const sqin = parseFloat(document.getElementById('hc-im-val').value);

    if (isNaN(sqin)) {
        alert('Lütfen bir değer giriniz.');
        return;
    }

    // 1 sq in = 0.00064516 m2
    const sqm = sqin * 0.00064516;

    document.getElementById('hc-im-res-val').innerText = sqm.toLocaleString('tr-TR', { minimumFractionDigits: 6, maximumFractionDigits: 6 });
    document.getElementById('hc-sqin-sqm-result').classList.add('visible');
}

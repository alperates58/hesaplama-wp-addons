function hcKiraCarpaniHesapla() {
    const price = parseFloat(document.getElementById('hc-kc-price').value);
    const rent = parseFloat(document.getElementById('hc-kc-rent').value);

    if (!price || !rent) {
        alert('Lütfen satış fiyatı ve kira tutarını girin.');
        return;
    }

    // Kira Çarpanı (Ay) = Fiyat / Aylık Kira
    const multiplierMonths = price / rent;
    const multiplierYears = multiplierMonths / 12;

    document.getElementById('hc-kc-value').innerText = multiplierYears.toLocaleString('tr-TR', { minimumFractionDigits: 1, maximumFractionDigits: 2 }) + ' Yıl';
    document.getElementById('hc-kc-months').innerText = Math.round(multiplierMonths) + ' Ay';
    document.getElementById('hc-kc-result').classList.add('visible');
}

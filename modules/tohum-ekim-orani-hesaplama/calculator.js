function hcSeedRateHesapla() {
    const area = parseFloat(document.getElementById('hc-sr-area').value);
    const targetKgPerDekar = parseFloat(document.getElementById('hc-sr-target').value);
    const germRate = parseFloat(document.getElementById('hc-sr-germ').value || 100);

    if (!area || !targetKgPerDekar) {
        alert('Lütfen alan ve hedef miktar bilgilerini giriniz.');
        return;
    }

    // Miktar = (Alan / 1000) * HedefKg * (100 / ÇimlenmeOranı)
    const totalKg = (area / 1000) * targetKgPerDekar * (100 / germRate);

    const resVal = document.getElementById('hc-sr-res-val');
    resVal.innerText = totalKg.toFixed(2).toLocaleString('tr-TR');

    document.getElementById('hc-seed-rate-result').classList.add('visible');
}

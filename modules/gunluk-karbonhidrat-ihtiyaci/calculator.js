function hcKarbonhidratHesapla() {
    const toplam = parseFloat(document.getElementById('hc-carb-toplam').value);
    const oran = parseFloat(document.getElementById('hc-carb-oran').value) / 100;

    if (!toplam) {
        alert('Lütfen günlük toplam kalori alımınızı girin.');
        return;
    }

    const carbKcal = toplam * oran;
    const carbGram = carbKcal / 4;

    document.getElementById('hc-carb-gram').innerText = Math.round(carbGram).toLocaleString('tr-TR') + ' g';
    document.getElementById('hc-carb-kcal').innerText = Math.round(carbKcal).toLocaleString('tr-TR') + ' kcal';

    document.getElementById('hc-gunluk-karbonhidrat-result').classList.add('visible');
}

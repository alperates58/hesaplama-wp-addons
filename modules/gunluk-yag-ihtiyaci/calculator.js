function hcYagHesapla() {
    const toplam = parseFloat(document.getElementById('hc-fat-toplam').value);
    const oran = parseFloat(document.getElementById('hc-fat-oran').value) / 100;

    if (!toplam) {
        alert('Lütfen günlük toplam kalori alımınızı girin.');
        return;
    }

    const fatKcal = toplam * oran;
    const fatGram = fatKcal / 9;

    document.getElementById('hc-fat-gram').innerText = Math.round(fatGram).toLocaleString('tr-TR') + ' g';
    document.getElementById('hc-fat-kcal').innerText = Math.round(fatKcal).toLocaleString('tr-TR') + ' kcal';

    document.getElementById('hc-gunluk-yag-result').classList.add('visible');
}

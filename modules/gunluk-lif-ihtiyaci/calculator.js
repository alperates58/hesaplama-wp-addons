function hcLifHesapla() {
    const toplam = parseFloat(document.getElementById('hc-fiber-toplam').value);
    const cinsiyet = document.getElementById('hc-fiber-cinsiyet').value;

    if (!toplam) {
        alert('Lütfen günlük toplam kalori alımınızı girin.');
        return;
    }

    // Formula: 14g per 1000 kcal
    let lifIhtiyaci = (toplam / 1000) * 14;

    // Minimum check
    const minVal = (cinsiyet === 'erkek') ? 38 : 25;
    if (lifIhtiyaci < minVal) {
        lifIhtiyaci = minVal;
    }

    document.getElementById('hc-fiber-value').innerText = Math.round(lifIhtiyaci).toLocaleString('tr-TR') + ' g';
    document.getElementById('hc-gunluk-lif-result').classList.add('visible');
}

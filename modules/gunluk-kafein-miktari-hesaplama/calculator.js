function hcDailyCaffHesapla() {
    const filter = parseInt(document.getElementById('hc-caff-filter').value) || 0;
    const espresso = parseInt(document.getElementById('hc-caff-espresso').value) || 0;
    const turkish = parseInt(document.getElementById('hc-caff-turkish').value) || 0;
    const tea = parseInt(document.getElementById('hc-caff-tea').value) || 0;
    const energy = parseInt(document.getElementById('hc-caff-energy').value) || 0;

    // Ortalama kafein değerleri (mg)
    const total = (filter * 95) + (espresso * 63) + (turkish * 60) + (tea * 25) + (energy * 80);

    document.getElementById('hc-caff-total').innerText = total + ' mg';

    let status = '';
    if (total <= 400) {
        status = 'Güvenli seviye. Yetişkinler için günlük sınır 400 mg\'dır.';
    } else {
        status = 'Dikkat: Günlük önerilen kafein sınırını (400 mg) aştınız.';
    }

    document.getElementById('hc-caff-status').innerText = status;
    document.getElementById('hc-daily-caff-result').classList.add('visible');
}

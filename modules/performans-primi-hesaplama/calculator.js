function hcPerfPrimHesapla() {
    const salary = parseFloat(document.getElementById('hc-pp-salary').value) || 0;
    const target = parseFloat(document.getElementById('hc-pp-target').value) || 0;
    const maxRate = parseFloat(document.getElementById('hc-pp-max').value) || 0;

    if (salary <= 0) {
        alert('Lütfen maaş bilgisini giriniz.');
        return;
    }

    // Simplified logic: achievement ratio directly affects the max rate
    const achievementRatio = target / 100;
    const earnedRate = maxRate * achievementRatio;
    const total = (salary * earnedRate) / 100;

    document.getElementById('hc-pp-res-ratio').innerText = achievementRatio.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    document.getElementById('hc-pp-res-total').innerText = total.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-perf-prim-result').classList.add('visible');
}

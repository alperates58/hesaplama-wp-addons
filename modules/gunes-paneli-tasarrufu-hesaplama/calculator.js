function hcSolarTasarrufHesapla() {
    const power = parseFloat(document.getElementById('hc-ss-power').value);
    const sun = parseFloat(document.getElementById('hc-ss-sun').value);
    const price = parseFloat(document.getElementById('hc-ss-price').value);

    if (isNaN(power) || isNaN(sun) || isNaN(price)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const dailyKwh = power * sun * 0.75; // 25% system loss
    const dailySaving = dailyKwh * price;
    const monthlySaving = dailySaving * 30;
    const yearlySaving = monthlySaving * 12;

    document.getElementById('hc-res-ss-daily').innerText = dailySaving.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-res-ss-monthly').innerText = monthlySaving.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-res-ss-yearly').innerText = yearlySaving.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-ss-result').classList.add('visible');
}

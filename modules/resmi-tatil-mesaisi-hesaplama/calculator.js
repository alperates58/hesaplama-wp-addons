function hcResmiTatilMesaiHesapla() {
    const salary = parseFloat(document.getElementById('hc-rtm-salary').value) || 0;
    const days = parseFloat(document.getElementById('hc-rtm-days').value) || 0;

    if (salary <= 0 || days <= 0) {
        alert('Lütfen maaş ve gün bilgilerini giriniz.');
        return;
    }

    const dailyBase = salary / 30;
    const total = dailyBase * days;

    document.getElementById('hc-rtm-res-daily').innerText = dailyBase.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-rtm-res-total').innerText = total.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-rtm-result').classList.add('visible');
}

function hcKkFaiziHesapla() {
    const amount = parseFloat(document.getElementById('hc-kkf-amount').value);
    const days = parseInt(document.getElementById('hc-kkf-days').value);
    const monthlyRate = parseFloat(document.getElementById('hc-kkf-rate').value) / 100;

    if (isNaN(amount) || isNaN(days) || isNaN(monthlyRate)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    // Günlük faiz = Aylık Faiz / 30
    const dailyRate = monthlyRate / 30;
    const netInterest = amount * dailyRate * days;
    const kkdf = netInterest * 0.15;
    const bsmv = netInterest * 0.15;
    const total = netInterest + kkdf + bsmv;

    document.getElementById('hc-kkf-res-net').innerText = netInterest.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-kkf-res-kkdf').innerText = kkdf.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-kkf-res-bsmv').innerText = bsmv.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-kkf-res-total').innerText = total.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-kkf-result').classList.add('visible');
}

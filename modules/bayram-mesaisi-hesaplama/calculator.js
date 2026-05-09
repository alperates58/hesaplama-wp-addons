function hcBayramMesaiHesapla() {
    const salary = parseFloat(document.getElementById('hc-bm-salary').value) || 0;
    const days = parseFloat(document.getElementById('hc-bm-days').value) || 0;

    if (salary <= 0 || days <= 0) {
        alert('Lütfen maaş ve gün bilgilerini giriniz.');
        return;
    }

    const dailyBase = salary / 30;
    const total = dailyBase * days; // Extra pay (on top of normal monthly salary)

    document.getElementById('hc-bm-res-daily').innerText = dailyBase.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-bm-res-total').innerText = total.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-bayram-result').classList.add('visible');
}

function hcFazlaMesaiHesapla() {
    const salary = parseFloat(document.getElementById('hc-fm-salary').value) || 0;
    const hours = parseFloat(document.getElementById('hc-fm-hours').value) || 0;
    const rate = parseFloat(document.getElementById('hc-fm-rate').value);

    if (salary <= 0 || hours <= 0) {
        alert('Lütfen maaş ve mesai saati bilgilerini giriniz.');
        return;
    }

    const hourlyBase = salary / 225;
    const fmHourly = hourlyBase * rate;
    const total = fmHourly * hours;

    document.getElementById('hc-fm-res-hourly').innerText = hourlyBase.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-fm-res-fm-hourly').innerText = fmHourly.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-fm-res-total').innerText = total.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-fazla-mesai-result').classList.add('visible');
}

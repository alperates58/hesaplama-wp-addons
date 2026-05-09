function hcFazlaMesaiNobetHesapla() {
    const salary = parseFloat(document.getElementById('hc-fmn-salary').value) || 0;
    const fmHours = parseFloat(document.getElementById('hc-fmn-fm-hours').value) || 0;
    const nbHours = parseFloat(document.getElementById('hc-fmn-nb-hours').value) || 0;
    const nbRate = parseFloat(document.getElementById('hc-fmn-nb-rate').value);

    if (salary <= 0) {
        alert('Lütfen maaş bilgisini giriniz.');
        return;
    }

    const hourlyBase = salary / 225;
    const fmTotal = hourlyBase * 1.5 * fmHours;
    const nbTotal = hourlyBase * nbRate * nbHours;
    const total = fmTotal + nbTotal;

    document.getElementById('hc-fmn-res-fm').innerText = fmTotal.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-fmn-res-nb').innerText = nbTotal.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-fmn-res-total').innerText = total.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-fmn-result').classList.add('visible');
}

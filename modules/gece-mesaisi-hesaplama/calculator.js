function hcGeceMesaiHesapla() {
    const salary = parseFloat(document.getElementById('hc-gm-salary').value) || 0;
    const hoursPerDay = parseFloat(document.getElementById('hc-gm-hours').value) || 0;
    const days = parseFloat(document.getElementById('hc-gm-days').value) || 0;

    if (salary <= 0 || hoursPerDay <= 0) {
        alert('Lütfen maaş ve saat bilgilerini giriniz.');
        return;
    }

    const hourlyBase = salary / 225;
    const extraHoursPerDay = Math.max(0, hoursPerDay - 7.5);
    const totalExtraHours = extraHoursPerDay * days;
    const total = totalExtraHours * (hourlyBase * 1.5);

    document.getElementById('hc-gm-res-extra-h').innerText = extraHoursPerDay.toLocaleString('tr-TR') + ' Saat';
    document.getElementById('hc-gm-res-total').innerText = total.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-gece-result').classList.add('visible');
}

function hcIsGoremezlikHesapla() {
    const salary = parseFloat(document.getElementById('hc-ig-salary').value) || 0;
    const type = document.getElementById('hc-ig-type').value;
    const totalDays = parseInt(document.getElementById('hc-ig-days').value) || 0;

    if (salary <= 0 || totalDays <= 0) {
        alert('Lütfen kazanç ve gün bilgilerini giriniz.');
        return;
    }

    const dailyGross = salary / 30;
    let rate = 2/3;
    if (type === 'in') rate = 0.5;

    let paidDays = totalDays;
    if (type === 'out' || type === 'in') {
        // SGK doesn't pay for the first 2 days of sickness
        paidDays = Math.max(0, totalDays - 2);
    }
    // Maternity and Work Accident usually pay from day 1, but I'll simplify based on 'type' selection
    if (type === 'maternity') paidDays = totalDays;

    const dailyPay = dailyGross * rate;
    const totalPay = dailyPay * paidDays;

    document.getElementById('hc-ig-res-daily').innerText = dailyPay.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-ig-res-paid-days').innerText = paidDays + ' Gün';
    document.getElementById('hc-ig-res-total').innerText = totalPay.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-is-goremezlik-result').classList.add('visible');
}

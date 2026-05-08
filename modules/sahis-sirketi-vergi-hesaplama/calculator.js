function hcSahisVergiHesapla() {
    const income = parseFloat(document.getElementById('hc-ss-income').value) || 0;
    const expense = parseFloat(document.getElementById('hc-ss-expense').value) || 0;
    const bagkurType = document.getElementById('hc-ss-bagkur').value;

    const minWage = 33030.00;
    let yearlyBagkur = 0;
    if (bagkurType === 'min') {
        // 29.5% with discount
        yearlyBagkur = (minWage * 0.295) * 12;
    }

    const profit = Math.max(0, income - expense);
    // Bağkur is a deductible expense for Income Tax
    const matrah = Math.max(0, profit - yearlyBagkur);

    const brackets = [
        { limit: 110000, rate: 0.15 },
        { limit: 230000, rate: 0.20 },
        { limit: 580000, rate: 0.27 },
        { limit: 1900000, rate: 0.35 },
        { limit: Infinity, rate: 0.40 }
    ];

    let remaining = matrah;
    let totalTax = 0;
    let prevLimit = 0;

    for (let i = 0; i < brackets.length; i++) {
        const b = brackets[i];
        const range = b.limit - prevLimit;
        const taxableInRange = Math.min(remaining, range);
        if (taxableInRange > 0) {
            totalTax += taxableInRange * b.rate;
            remaining -= taxableInRange;
        }
        prevLimit = b.limit;
        if (remaining <= 0) break;
    }

    const net = profit - totalTax - yearlyBagkur;

    document.getElementById('hc-ss-res-profit').innerText = profit.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-ss-res-tax').innerText = totalTax.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-ss-res-net').innerText = net.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-sahis-result').classList.add('visible');
}

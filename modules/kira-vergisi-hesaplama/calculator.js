function hcKiraVergisiHesapla() {
    const income = parseFloat(document.getElementById('hc-kvg-income').value) || 0;
    const type = document.getElementById('hc-kvg-type').value;
    const expenseRate = document.getElementById('hc-kvg-expense').value === 'real' ? 0 : 0.15;

    const exemption = (type === 'konut') ? 55000 : 0;
    
    let matrah = 0;
    if (income > exemption) {
        matrah = (income - exemption) * (1 - expenseRate);
    }

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

    document.getElementById('hc-kvg-res-exemp').innerText = exemption.toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-kvg-res-matrah').innerText = matrah.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-kvg-res-total').innerText = totalTax.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-kira-result').classList.add('visible');
}

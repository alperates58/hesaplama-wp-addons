function hcBorclanmaHesapla() {
    const type = document.getElementById('hc-borc-type').value;
    const days = parseInt(document.getElementById('hc-borc-days').value) || 0;
    const baseType = document.getElementById('hc-borc-base').value;

    if (days <= 0) {
        alert('Lütfen geçerli bir gün sayısı giriniz.');
        return;
    }

    // 2026 Daily Gross Minimum Wage
    const dailyMinWage = 1101.00;
    let dailyBase = dailyMinWage;
    
    if (baseType === 'max') {
        dailyBase = dailyMinWage * 7.5;
    }

    let rate = 0.32; // Default for birth/military
    if (type === 'overseas') rate = 0.45;
    if (type === 'part-time') rate = 0.39;

    const dailyCost = dailyBase * rate;
    const totalCost = dailyCost * days;

    document.getElementById('hc-res-daily').innerText = dailyCost.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-res-total-days').innerText = days.toLocaleString('tr-TR') + ' Gün';
    document.getElementById('hc-res-total-cost').innerText = totalCost.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-borclanma-result').classList.add('visible');
}

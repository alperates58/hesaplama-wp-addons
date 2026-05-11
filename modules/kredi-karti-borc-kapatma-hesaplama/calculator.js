function hcKkBorcKapatmaHesapla() {
    const balance = parseFloat(document.getElementById('hc-kkbk-balance').value);
    const cardRate = parseFloat(document.getElementById('hc-kkbk-card-rate').value) / 100;
    const loanRate = parseFloat(document.getElementById('hc-kkbk-loan-rate').value) / 100;
    const months = parseInt(document.getElementById('hc-kkbk-months').value);

    if (isNaN(balance) || isNaN(cardRate) || isNaN(loanRate) || isNaN(months)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const taxFactor = 1.30; // %15 BSMV + %15 KKDF
    
    // Kart tarafında her ay anaparanın aynı kaldığı (asgari ödenmediği) varsayımıyla aylık faiz
    const monthlyCardInterest = balance * cardRate * taxFactor;
    const totalCardCost = monthlyCardInterest * months;

    // Kredi tarafı (Annuity)
    const r = loanRate * taxFactor;
    const loanPayment = (r * balance) / (1 - Math.pow(1 + r, -months));
    const totalLoanCost = (loanPayment * months) - balance;

    const totalSavings = totalCardCost - totalLoanCost;

    document.getElementById('hc-kkbk-card-interest').innerText = monthlyCardInterest.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-kkbk-loan-payment').innerText = loanPayment.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-kkbk-savings').innerText = Math.max(0, totalSavings).toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-kkbk-result').classList.add('visible');
}

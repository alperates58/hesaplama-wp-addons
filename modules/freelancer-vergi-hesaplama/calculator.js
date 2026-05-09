function hcFreelancerVergiHesapla() {
    const income = parseFloat(document.getElementById('hc-income').value) || 0;
    const expenses = parseFloat(document.getElementById('hc-expenses').value) || 0;
    const isAbroad = document.getElementById('hc-abroad').value === 'yes';
    const kdvRate = parseFloat(document.getElementById('hc-kdv-rate').value) / 100;

    if (income <= 0) {
        alert('Lütfen geçerli bir gelir tutarı giriniz.');
        return;
    }

    // KDV Calculation
    const kdvAmount = income * kdvRate;

    // Taxable Income (Monthly to Annual for bracket calculation)
    let monthlyProfit = income - expenses;
    if (isAbroad) {
        // 80% exemption for services provided abroad (if conditions met)
        monthlyProfit = monthlyProfit * 0.20;
    }
    
    const annualTaxable = monthlyProfit * 12;
    let annualIncomeTax = 0;

    // 2026 Tax Brackets
    // 190k: 15%
    // 400k: 28.5k + 20%
    // 1M: 70.5k + 27%
    // 4.3M: 232.5k + 35%
    // Over 4.3M: 1.38M + 40%

    if (annualTaxable <= 190000) {
        annualIncomeTax = annualTaxable * 0.15;
    } else if (annualTaxable <= 400000) {
        annualIncomeTax = 28500 + (annualTaxable - 190000) * 0.20;
    } else if (annualTaxable <= 1000000) {
        annualIncomeTax = 70500 + (annualTaxable - 400000) * 0.27;
    } else if (annualTaxable <= 4300000) {
        annualIncomeTax = 232500 + (annualTaxable - 1000000) * 0.35;
    } else {
        annualIncomeTax = 1387500 + (annualTaxable - 4300000) * 0.40;
    }

    const monthlyIncomeTax = annualIncomeTax / 12;
    const totalMonthlyTax = kdvAmount + monthlyIncomeTax;
    const netIncome = income - totalMonthlyTax - expenses;

    // Update Results
    document.getElementById('hc-res-kdv').innerText = kdvAmount.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-res-income-tax').innerText = monthlyIncomeTax.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺ (Aylık)';
    document.getElementById('hc-res-total-tax').innerText = totalMonthlyTax.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-res-net').innerText = netIncome.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-freelancer-result').classList.add('visible');
}

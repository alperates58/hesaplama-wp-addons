function hcInfluencerVergiHesapla() {
    const income = parseFloat(document.getElementById('hc-inf-income').value) || 0;
    const limit2026 = 5300000;

    if (income <= 0) {
        alert('Lütfen geçerli bir kazanç tutarı giriniz.');
        return;
    }

    let status = "";
    let stopaj = income * 0.15;
    let extraTax = 0;
    const extraTaxRow = document.getElementById('hc-inf-extra-tax-row');

    if (income <= limit2026) {
        status = "İstisna Kapsamında (%15 Sabit)";
        extraTaxRow.style.display = 'none';
    } else {
        status = "İstisna Dışı (Beyanname Gerekli)";
        extraTaxRow.style.display = 'flex';
        
        // Simplified extra tax calculation for the portion above the limit
        // using the highest brackets approx
        const taxablePortion = income; 
        // In reality, stopaj is deducted from the final tax.
        // Let's use 2026 brackets for the whole amount and subtract the 15% stopaj
        
        let totalTax = 0;
        if (taxablePortion <= 190000) totalTax = taxablePortion * 0.15;
        else if (taxablePortion <= 400000) totalTax = 28500 + (taxablePortion - 190000) * 0.20;
        else if (taxablePortion <= 1000000) totalTax = 70500 + (taxablePortion - 400000) * 0.27;
        else if (taxablePortion <= 4300000) totalTax = 232500 + (taxablePortion - 1000000) * 0.35;
        else totalTax = 1387500 + (taxablePortion - 4300000) * 0.40;

        extraTax = Math.max(0, totalTax - stopaj);
    }

    const net = income - stopaj - extraTax;

    document.getElementById('hc-inf-status').innerText = status;
    document.getElementById('hc-inf-stopaj').innerText = stopaj.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-inf-extra-tax').innerText = extraTax.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-inf-net').innerText = net.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-influencer-result').classList.add('visible');
}

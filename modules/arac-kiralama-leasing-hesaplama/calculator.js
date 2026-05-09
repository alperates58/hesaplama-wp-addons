function hcLcHesapla() {
    const price = parseFloat(document.getElementById('hc-lc-price').value);
    const down = parseFloat(document.getElementById('hc-lc-down').value) || 0;
    const residualPct = parseFloat(document.getElementById('hc-lc-residual').value) || 0;
    const term = parseInt(document.getElementById('hc-lc-term').value);
    const yearlyRate = parseFloat(document.getElementById('hc-lc-interest').value);

    if (isNaN(price) || isNaN(yearlyRate) || price <= down) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    const principal = price - down;
    const residualValue = price * (residualPct / 100);
    const monthlyRate = (yearlyRate / 12) / 100;

    let monthlyPayment;
    if (monthlyRate === 0) {
        monthlyPayment = (principal - residualValue) / term;
    } else {
        const factor = Math.pow(1 + monthlyRate, term);
        monthlyPayment = (principal * factor * monthlyRate - residualValue * monthlyRate) / (factor - 1);
    }

    const totalPayment = (monthlyPayment * term) + down + residualValue;

    document.getElementById('hc-lc-monthly').innerText = monthlyPayment.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + " ₺";
    document.getElementById('hc-lc-total').innerText = totalPayment.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + " ₺";
    document.getElementById('hc-lc-res-val').innerText = residualValue.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + " ₺";

    document.getElementById('hc-lc-result').classList.add('visible');
}

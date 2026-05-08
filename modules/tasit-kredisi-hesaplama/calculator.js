function hcTkHesapla() {
    const price = parseFloat(document.getElementById('hc-tk-price').value);
    const down = parseFloat(document.getElementById('hc-tk-down').value) || 0;
    const term = parseInt(document.getElementById('hc-tk-term').value);
    const rate = parseFloat(document.getElementById('hc-tk-interest').value);

    if (isNaN(price) || isNaN(rate) || price <= down) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    const loanAmount = price - down;
    const effectiveRate = (rate / 100) * 1.20; // KKDF %15 + BSMV %5 dahil

    let monthlyPayment;
    if (effectiveRate === 0) {
        monthlyPayment = loanAmount / term;
    } else {
        monthlyPayment = loanAmount * (effectiveRate * Math.pow(1 + effectiveRate, term)) / (Math.pow(1 + effectiveRate, term) - 1);
    }

    const totalPayment = monthlyPayment * term;
    const totalInterest = totalPayment - loanAmount;

    document.getElementById('hc-monthly').innerText = monthlyPayment.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + " ₺";
    document.getElementById('hc-total').innerText = totalPayment.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + " ₺";
    document.getElementById('hc-amount').innerText = loanAmount.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + " ₺";
    document.getElementById('hc-interest-total').innerText = totalInterest.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + " ₺";

    document.getElementById('hc-tk-result').classList.add('visible');
}

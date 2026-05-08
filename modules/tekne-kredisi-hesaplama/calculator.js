function hcTekHesapla() {
    const price = parseFloat(document.getElementById('hc-tek-price').value);
    const down = parseFloat(document.getElementById('hc-tek-down').value) || 0;
    const term = parseInt(document.getElementById('hc-tek-term').value);
    const rate = parseFloat(document.getElementById('hc-tek-interest').value);

    if (isNaN(price) || isNaN(rate) || price <= down) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    const loanAmount = price - down;
    const effectiveRate = (rate / 100) * 1.20;

    let monthlyPayment;
    if (effectiveRate === 0) {
        monthlyPayment = loanAmount / term;
    } else {
        monthlyPayment = loanAmount * (effectiveRate * Math.pow(1 + effectiveRate, term)) / (Math.pow(1 + effectiveRate, term) - 1);
    }

    const totalPayment = monthlyPayment * term;

    document.getElementById('hc-tek-monthly').innerText = monthlyPayment.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + " ₺";
    document.getElementById('hc-tek-total').innerText = totalPayment.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + " ₺";

    document.getElementById('hc-tek-result').classList.add('visible');
}

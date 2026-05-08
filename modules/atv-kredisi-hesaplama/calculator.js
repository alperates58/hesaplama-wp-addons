function hcAkHesapla() {
    const price = parseFloat(document.getElementById('hc-ak-price').value);
    const down = parseFloat(document.getElementById('hc-ak-down').value) || 0;
    const term = parseInt(document.getElementById('hc-ak-term').value);
    const rate = parseFloat(document.getElementById('hc-ak-interest').value);

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

    document.getElementById('hc-ak-monthly').innerText = monthlyPayment.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + " ₺";
    document.getElementById('hc-ak-total').innerText = totalPayment.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + " ₺";

    document.getElementById('hc-ak-result').classList.add('visible');
}

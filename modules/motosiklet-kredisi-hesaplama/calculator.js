function hcMkHesapla() {
    const price = parseFloat(document.getElementById('hc-mk-price').value);
    const down = parseFloat(document.getElementById('hc-mk-down').value) || 0;
    const term = parseInt(document.getElementById('hc-mk-term').value);
    const rate = parseFloat(document.getElementById('hc-mk-interest').value);

    if (isNaN(price) || isNaN(rate) || price <= down) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    const loanAmount = price - down;
    const effectiveRate = (rate / 100) * 1.20; // KKDF + BSMV

    let monthlyPayment;
    if (effectiveRate === 0) {
        monthlyPayment = loanAmount / term;
    } else {
        monthlyPayment = loanAmount * (effectiveRate * Math.pow(1 + effectiveRate, term)) / (Math.pow(1 + effectiveRate, term) - 1);
    }

    const totalPayment = monthlyPayment * term;

    document.getElementById('hc-mk-monthly').innerText = monthlyPayment.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + " ₺";
    document.getElementById('hc-mk-total').innerText = totalPayment.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + " ₺";

    document.getElementById('hc-mk-result').classList.add('visible');
}

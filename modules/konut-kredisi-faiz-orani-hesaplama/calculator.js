function hcKonutKredisiFaizOraniHesapla() {
    const p = parseFloat(document.getElementById('hc-kkfo-amount').value);
    const m = parseFloat(document.getElementById('hc-kkfo-installment').value);
    const n = parseInt(document.getElementById('hc-kkfo-term').value);

    if (isNaN(p) || isNaN(m) || isNaN(n) || m * n <= p) {
        alert('Lütfen geçerli değerler girin. Toplam ödeme (Taksit x Vade) kredi miktarından büyük olmalıdır.');
        return;
    }

    // Binary search for interest rate 'i'
    // m = [p * i * (1+i)^n] / [(1+i)^n - 1]
    let low = 0;
    let high = 1.0; // %100 aylık (çok yüksek bir sınır)
    let mid;

    for (let iteration = 0; iteration < 100; iteration++) {
        mid = (low + high) / 2;
        let estimate = (p * mid * Math.pow(1 + mid, n)) / (Math.pow(1 + mid, n) - 1);
        
        if (estimate > m) {
            high = mid;
        } else {
            low = mid;
        }
    }

    const resultRate = mid * 100;

    document.getElementById('hc-kkfo-value').innerText = '%' + resultRate.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 4 });
    document.getElementById('hc-kkfo-result').classList.add('visible');
}

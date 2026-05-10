function hcCoinFlipHesapla() {
    const n = parseInt(document.getElementById('hc-cf-total').value);
    const k = parseInt(document.getElementById('hc-cf-target').value);

    if (isNaN(n) || isNaN(k) || n < 1 || k < 0 || k > n) {
        alert('Lütfen geçerli (n ≥ k ≥ 0) değerler giriniz.');
        return;
    }

    function factorial(num) {
        if (num === 0 || num === 1) return 1;
        let res = 1;
        for (let i = 2; i <= num; i++) res *= i;
        return res;
    }

    function combination(n, k) {
        return factorial(n) / (factorial(k) * factorial(n - k));
    }

    // Binomial Probability: P(X=k) = C(n,k) * (0.5)^n
    const prob = combination(n, k) * Math.pow(0.5, n);
    const percentage = prob * 100;

    document.getElementById('hc-cf-res-val').innerText = `% ${percentage.toLocaleString('tr-TR', { maximumFractionDigits: 4 })}`;
    document.getElementById('hc-cf-desc').innerText = `${n} atışta tam olarak ${k} kez gelme olasılığı.`;
    document.getElementById('hc-coin-flip-result').classList.add('visible');
}

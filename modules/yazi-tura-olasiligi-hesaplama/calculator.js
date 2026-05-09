function hcCoinProbHesapla() {
    const n = parseInt(document.getElementById('hc-cp-total').value) || 0;
    const k = parseInt(document.getElementById('hc-cp-target').value) || 0;

    if (n <= 0 || k < 0 || k > n) {
        document.getElementById('hc-res-cp-val').innerText = '%0';
        document.getElementById('hc-coin-prob-result').classList.add('visible');
        return;
    }

    function factorial(num) {
        if (num === 0 || num === 1) return 1;
        let res = 1;
        for (let i = 2; i <= num; i++) res *= i;
        return res;
    }

    function combinations(n, k) {
        // Use multiplicative formula to avoid huge factorials if possible
        let res = 1;
        if (k > n / 2) k = n - k;
        for (let i = 1; i <= k; i++) {
            res = res * (n - i + 1) / i;
        }
        return res;
    }

    // P(k) = C(n, k) * p^k * (1-p)^(n-k) where p = 0.5
    const comb = combinations(n, k);
    const prob = comb * Math.pow(0.5, n) * 100;

    document.getElementById('hc-res-cp-val').innerText = '%' + prob.toLocaleString('tr-TR', { maximumFractionDigits: 4 });
    document.getElementById('hc-coin-prob-result').classList.add('visible');
}

function hcBinomHesapla() {
    const n = parseInt(document.getElementById('hc-binom-n').value);
    const k = parseInt(document.getElementById('hc-binom-k').value);
    const p = parseFloat(document.getElementById('hc-binom-p').value);

    if (isNaN(n) || isNaN(k) || isNaN(p) || p < 0 || p > 1 || k < 0 || k > n) {
        alert('Lütfen geçerli değerler girin (0 ≤ p ≤ 1 ve 0 ≤ k ≤ n).');
        return;
    }

    function combinations(n, k) {
        if (k < 0 || k > n) return 0;
        if (k === 0 || k === n) return 1;
        if (k > n / 2) k = n - k;
        let res = 1;
        for (let i = 1; i <= k; i++) {
            res = res * (n - i + 1) / i;
        }
        return res;
    }

    function binomialProb(n, k, p) {
        return combinations(n, k) * Math.pow(p, k) * Math.pow(1 - p, n - k);
    }

    const probK = binomialProb(n, k, p);
    
    let cumProb = 0;
    for (let i = 0; i <= k; i++) {
        cumProb += binomialProb(n, i, p);
    }

    const mean = n * p;
    const variance = n * p * (1 - p);

    const fmt = (val) => val.toLocaleString('tr-TR', { maximumFractionDigits: 6 });

    document.getElementById('hc-res-binom-p-val').innerText = fmt(probK);
    document.getElementById('hc-res-binom-cum-val').innerText = fmt(cumProb);
    document.getElementById('hc-res-binom-mean').innerText = fmt(mean);
    document.getElementById('hc-res-binom-var').innerText = fmt(variance);

    document.getElementById('hc-binom-dagilimi-hesaplama-result').classList.add('visible');
}

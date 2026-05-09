function hcDiceProbHesapla() {
    const n = parseInt(document.getElementById('hc-dp-count').value) || 0;
    const s = parseInt(document.getElementById('hc-dp-target').value) || 0;

    if (n <= 0 || n > 5 || s < n || s > n * 6) {
        document.getElementById('hc-res-dp-val').innerText = '%0';
        document.getElementById('hc-dice-prob-result').classList.add('visible');
        return;
    }

    // Dinamik programlama ile kombinasyon sayısı bulma
    const dp = Array.from({ length: n + 1 }, () => Array(s + 1).fill(0));
    dp[0][0] = 1;

    for (let i = 1; i <= n; i++) {
        for (let j = 1; j <= s; j++) {
            for (let k = 1; k <= 6 && k <= j; k++) {
                dp[i][j] += dp[i - 1][j - k];
            }
        }
    }

    const ways = dp[n][s];
    const totalWays = Math.pow(6, n);
    const prob = (ways / totalWays) * 100;

    document.getElementById('hc-res-dp-val').innerText = '%' + prob.toLocaleString('tr-TR', { maximumFractionDigits: 4 });
    document.getElementById('hc-dice-prob-result').classList.add('visible');
}

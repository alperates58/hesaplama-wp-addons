function hcDiceHesapla() {
    const n = parseInt(document.getElementById('hc-dice-n').value);
    const target = parseInt(document.getElementById('hc-dice-sum').value);

    if (isNaN(n) || isNaN(target) || n < 1 || target < n || target > 6 * n) {
        alert('Lütfen geçerli bir zar sayısı ve bu sayılara uygun bir hedef toplam girin.');
        return;
    }

    // Function to calculate number of ways to get sum 'S' with 'n' dice
    function countWays(n, s) {
        if (n === 0) return s === 0 ? 1 : 0;
        if (s < 0) return 0;
        let ways = 0;
        for (let i = 1; i <= 6; i++) {
            ways += countWays(n - 1, s - i);
        }
        return ways;
    }

    // Since n is small (max 10), we can use a more efficient DP or combination approach if needed, 
    // but for 10 dice recursion is too slow. Let's use DP.
    function countWaysDP(n, s) {
        const dp = Array.from({ length: n + 1 }, () => Array(s + 1).fill(0));
        dp[0][0] = 1;
        for (let i = 1; i <= n; i++) {
            for (let j = 1; j <= s; j++) {
                for (let k = 1; k <= 6 && k <= j; k++) {
                    dp[i][j] += dp[i - 1][j - k];
                }
            }
        }
        return dp[n][s];
    }

    const ways = countWaysDP(n, target);
    const totalWays = Math.pow(6, n);
    const prob = ways / totalWays;

    const fmt = (val) => val.toLocaleString('tr-TR', { maximumFractionDigits: 6 });
    const percent = (val) => '%' + (val * 100).toLocaleString('tr-TR', { maximumFractionDigits: 4 });

    document.getElementById('hc-res-dice-val').innerText = `${fmt(prob)} (${percent(prob)})`;
    document.getElementById('hc-dice-info').innerText = `${n} zarla ${target} toplamını elde etmenin ${ways} farklı yolu vardır (Toplam ${totalWays.toLocaleString('tr-TR')} olasılık içinden).`;

    document.getElementById('hc-alti-yuzlu-zar-olasiligi-hesaplama-result').classList.add('visible');
}

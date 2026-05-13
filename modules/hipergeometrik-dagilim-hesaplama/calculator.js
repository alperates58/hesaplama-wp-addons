function hcHipergeometrikHesapla() {
    const N = parseInt(document.getElementById('hc-hg-N').value);
    const K = parseInt(document.getElementById('hc-hg-K').value);
    const n = parseInt(document.getElementById('hc-hg-n').value);
    const k = parseInt(document.getElementById('hc-hg-k').value);

    if (isNaN(N) || isNaN(K) || isNaN(n) || isNaN(k)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    if (K > N || n > N || k > K || k > n || (n - k) > (N - K)) {
        alert('Girilen değerler hipergeometrik dağılım kurallarına uygun değildir (Örn: k ≤ K, n ≤ N vb.).');
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

    const p = (combinations(K, k) * combinations(N - K, n - k)) / combinations(N, n);
    const mean = (n * K) / N;

    const fmt = (val) => val.toLocaleString('tr-TR', { maximumFractionDigits: 6 });

    document.getElementById('hc-res-hg-p').innerText = fmt(p);
    document.getElementById('hc-res-hg-mean').innerText = fmt(mean);

    document.getElementById('hc-hipergeometrik-result').classList.add('visible');
}

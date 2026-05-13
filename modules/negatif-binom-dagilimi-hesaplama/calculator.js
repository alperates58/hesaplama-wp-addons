function hcNegatifBinomHesapla() {
    const r = parseInt(document.getElementById('hc-nb-r').value);
    const k = parseInt(document.getElementById('hc-nb-k').value);
    const p = parseFloat(document.getElementById('hc-nb-p').value);
    const resultDiv = document.getElementById('hc-negatif-binom-dagilimi-hesaplama-result');

    if (isNaN(r) || isNaN(k) || isNaN(p) || r <= 0 || k < r || p < 0 || p > 1) {
        alert('Lütfen geçerli değerler giriniz (k ≥ r > 0, 0 ≤ p ≤ 1).');
        return;
    }

    function combinations(n, k) {
        if (k < 0 || k > n) return 0;
        if (k === 0 || k === n) return 1;
        if (k > n / 2) k = n - k;
        let res = 1;
        for (let i = 1; i <= k; i++) res = res * (n - i + 1) / i;
        return res;
    }

    // P(X=k) = C(k-1, r-1) * p^r * (1-p)^(k-r)
    const prob = combinations(k - 1, r - 1) * Math.pow(p, r) * Math.pow(1 - p, k - r);
    const mean = r / p;
    const variance = (r * (1 - p)) / Math.pow(p, 2);

    document.getElementById('hc-nb-res-exact').innerHTML = `${k}. denemede ${r}. başarıyı elde etme olasılığı: <strong>%${(prob * 100).toLocaleString('tr-TR', {maximumFractionDigits: 4})}</strong>`;
    document.getElementById('hc-nb-res-mean').innerHTML = `Beklenen Deneme Sayısı (Ortalama): <strong>${mean.toLocaleString('tr-TR', {maximumFractionDigits: 2})}</strong>`;
    document.getElementById('hc-nb-res-var').innerHTML = `Varyans: <strong>${variance.toLocaleString('tr-TR', {maximumFractionDigits: 2})}</strong>`;

    resultDiv.classList.add('visible');
}

function hcKombinasyonHesapla() {
    const n = parseInt(document.getElementById('hc-comb-n').value);
    let r = parseInt(document.getElementById('hc-comb-r').value);
    const resultDiv = document.getElementById('hc-olasi-kombinasyon-sayisi-hesaplama-result');

    if (isNaN(n) || isNaN(r) || n < 0 || r < 0) {
        alert('Lütfen geçerli pozitif tam sayılar giriniz.');
        return;
    }

    if (r > n) {
        alert('r değeri n değerinden büyük olamaz.');
        return;
    }

    // C(n, r) = C(n, n-r)
    if (r > n / 2) r = n - r;

    let res = 1;
    for (let i = 1; i <= r; i++) {
        res = res * (n - i + 1) / i;
    }

    document.getElementById('hc-comb-res-val').innerText = Math.round(res).toLocaleString('tr-TR');

    resultDiv.classList.add('visible');
}

function hcKombinasyonHesapla() {
    const n = parseInt(document.getElementById('hc-comb-n').value);
    const r = parseInt(document.getElementById('hc-comb-r').value);

    if (isNaN(n) || isNaN(r) || n < 0 || r < 0) {
        alert('Lütfen pozitif tam sayılar girin.');
        return;
    }

    if (r > n) {
        alert('r değeri n değerinden büyük olamaz.');
        return;
    }

    // C(n, r) = C(n, n-r)
    const k = Math.min(r, n - r);
    
    let result = 1;
    for (let i = 1; i <= k; i++) {
        result *= (n - i + 1);
        result /= i;
    }

    document.getElementById('hc-res-comb-val').innerText = Math.round(result).toLocaleString('tr-TR');
    document.getElementById('hc-comb-formula').innerText = n + " elemandan " + r + " eleman " + Math.round(result).toLocaleString('tr-TR') + " farklı şekilde seçilebilir.";
    document.getElementById('hc-kombinasyon-result').classList.add('visible');
}

function hcCombRepHesapla() {
    const n = parseInt(document.getElementById('hc-cr-n').value) || 0;
    const r = parseInt(document.getElementById('hc-cr-r').value) || 0;

    if (n <= 0 || r < 0) return;

    // C(n+r-1, r)
    const newN = n + r - 1;
    let newR = r;

    if (newR > newN / 2) newR = newN - newR;

    let result = 1;
    for (let i = 1; i <= newR; i++) {
        result = result * (newN - i + 1) / i;
    }

    document.getElementById('hc-res-cr-val').innerText = Math.round(result).toLocaleString('tr-TR');
    document.getElementById('hc-comb-rep-result').classList.add('visible');
}

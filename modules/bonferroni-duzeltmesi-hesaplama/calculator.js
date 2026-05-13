function hcBonferroniHesapla() {
    const alpha = parseFloat(document.getElementById('hc-bonf-alpha').value);
    const n = parseInt(document.getElementById('hc-bonf-n').value);

    if (isNaN(alpha) || isNaN(n) || n <= 0 || alpha <= 0 || alpha > 1) {
        alert('Lütfen geçerli değerler girin (n > 0 ve 0 < α ≤ 1).');
        return;
    }

    const adjustedAlpha = alpha / n;

    document.getElementById('hc-res-bonf-val').innerText = adjustedAlpha.toLocaleString('tr-TR', { maximumFractionDigits: 10 });
    document.getElementById('hc-bonferroni-duzeltmesi-hesaplama-result').classList.add('visible');
}

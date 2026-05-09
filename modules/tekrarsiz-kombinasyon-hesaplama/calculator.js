function hcCombNoRepHesapla() {
    const n = parseInt(document.getElementById('hc-cnr-n').value) || 0;
    let r = parseInt(document.getElementById('hc-cnr-r').value) || 0;

    if (r > n) {
        alert('r değeri n değerinden büyük olamaz.');
        return;
    }

    if (r > n / 2) r = n - r;

    let result = 1;
    for (let i = 1; i <= r; i++) {
        result = result * (n - i + 1) / i;
    }

    document.getElementById('hc-res-cnr-val').innerText = Math.round(result).toLocaleString('tr-TR');
    document.getElementById('hc-comb-no-rep-result').classList.add('visible');
}

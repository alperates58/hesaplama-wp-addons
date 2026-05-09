function hcPermNoRepHesapla() {
    const n = parseInt(document.getElementById('hc-pnr-n').value) || 0;
    const r = parseInt(document.getElementById('hc-pnr-r').value) || 0;

    if (r > n) {
        alert('r değeri n değerinden büyük olamaz.');
        return;
    }

    let result = 1;
    for (let i = 0; i < r; i++) {
        result *= (n - i);
    }

    document.getElementById('hc-res-pnr-val').innerText = result.toLocaleString('tr-TR');
    document.getElementById('hc-perm-no-rep-result').classList.add('visible');
}

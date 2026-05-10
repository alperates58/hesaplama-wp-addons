function hcGeoMeanHesapla() {
    const raw = document.getElementById('hc-gm-data').value;
    const nums = raw.split(/[\s,]+/).map(n => parseFloat(n.trim())).filter(n => !isNaN(n) && n > 0);

    if (nums.length === 0) {
        alert('Lütfen geçerli pozitif sayılar giriniz.');
        return;
    }

    let product = 1;
    for (let n of nums) {
        product *= n;
    }

    const result = Math.pow(product, 1 / nums.length);

    document.getElementById('hc-gm-res-val').innerText = result.toLocaleString('tr-TR', { maximumFractionDigits: 4 });
    document.getElementById('hc-geo-mean-result').classList.add('visible');
}

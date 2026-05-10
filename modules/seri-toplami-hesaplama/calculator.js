function hcSeriesTypeChange() {
    const type = document.getElementById('hc-ss-type').value;
    const label = document.getElementById('hc-ss-diff-label');
    const input = document.getElementById('hc-ss-diff');
    
    if (type === 'arithmetic') {
        label.innerText = 'Ortak Fark (d):';
        input.placeholder = '1';
    } else {
        label.innerText = 'Ortak Çarpan (r):';
        input.placeholder = '2';
    }
}

function hcSeriesSumHesapla() {
    const type = document.getElementById('hc-ss-type').value;
    const a1 = parseFloat(document.getElementById('hc-ss-a1').value);
    const d_r = parseFloat(document.getElementById('hc-ss-diff').value);
    const n = parseInt(document.getElementById('hc-ss-n').value);

    if (isNaN(a1) || isNaN(d_r) || isNaN(n) || n < 1) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    let sum = 0;
    if (type === 'arithmetic') {
        // Sn = n/2 * (2*a1 + (n-1)*d)
        sum = (n / 2) * (2 * a1 + (n - 1) * d_r);
    } else {
        // Sn = a1 * (1 - r^n) / (1 - r)
        if (d_r === 1) {
            sum = a1 * n;
        } else {
            sum = a1 * (1 - Math.pow(d_r, n)) / (1 - d_r);
        }
    }

    document.getElementById('hc-ss-res-val').innerText = sum.toLocaleString('tr-TR');
    document.getElementById('hc-seri-toplami-result').classList.add('visible');
}

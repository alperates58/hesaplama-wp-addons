function hcAsalCarpanHesapla() {
    let n = parseInt(document.getElementById('hc-pf-val').value);

    if (isNaN(n) || n < 2) {
        alert('Lütfen 1\'den büyük bir tam sayı girin.');
        return;
    }

    const factors = {};
    let d = 2;
    let temp = n;

    while (temp >= d * d) {
        if (temp % d === 0) {
            factors[d] = (factors[d] || 0) + 1;
            temp /= d;
        } else {
            d++;
        }
    }
    if (temp > 1) {
        factors[temp] = (factors[temp] || 0) + 1;
    }

    const factorList = Object.keys(factors).join(', ');
    const powList = Object.entries(factors).map(([p, e]) => `${p}<sup>${e}</sup>`).join(' × ');

    document.getElementById('hc-res-pf-list').innerText = factorList;
    document.getElementById('hc-res-pf-pow').innerHTML = powList;

    document.getElementById('hc-pf-result').classList.add('visible');
}

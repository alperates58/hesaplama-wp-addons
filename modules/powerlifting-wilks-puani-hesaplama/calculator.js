function hcPowerliftingWilksPuaniHesapla() {
    const bw = parseFloat(document.getElementById('hc-wilks-bw').value);
    const total = parseFloat(document.getElementById('hc-wilks-total').value);
    const gender = document.querySelector('input[name="hc-wilks-gender"]:checked').value;

    if (!bw || !total) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    // Wilks 2020 Coefficients
    const coeff = {
        male: {
            a: -114.316335,
            b: 22.846467,
            c: -0.522201,
            d: 0.005404,
            e: -0.000028,
            f: 0.000000057
        },
        female: {
            a: -34.802123,
            b: 9.385584,
            c: -0.197022,
            d: 0.002047,
            e: -0.00001,
            f: 0.000000021
        }
    };

    const c = coeff[gender];
    const x = bw;
    
    // Wilks Score = Total * 600 / (a + bx + cx^2 + dx^3 + ex^4 + fx^5)
    const denominator = c.a + (c.b * x) + (c.c * Math.pow(x, 2)) + (c.d * Math.pow(x, 3)) + (c.e * Math.pow(x, 4)) + (c.f * Math.pow(x, 5));
    const score = total * (600 / denominator);

    document.getElementById('hc-wilks-val').innerText = score.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    document.getElementById('hc-wilks-result').classList.add('visible');
}

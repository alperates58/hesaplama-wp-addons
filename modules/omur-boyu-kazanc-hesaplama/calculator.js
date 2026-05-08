function hcLifetimeEarnings() {
    const p = parseFloat(document.getElementById('hc-lt-income').value) || 0;
    const n = parseInt(document.getElementById('hc-lt-years').value) || 0;
    const g = (parseFloat(document.getElementById('hc-lt-growth').value) || 0) / 100;

    let total = 0;

    if (g === 0) {
        total = p * n;
    } else {
        // Sum of geometric series: P * ((1+g)^n - 1) / g
        total = p * (Math.pow(1 + g, n) - 1) / g;
    }

    document.getElementById('hc-lt-res-val').innerText = total.toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + ' ₺';

    document.getElementById('hc-lifetime-result').classList.add('visible');
}

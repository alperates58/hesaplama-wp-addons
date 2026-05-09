function hcInvNormHesapla() {
    const p = parseFloat(document.getElementById('hc-in-prob').value) || 0.95;
    const mu = parseFloat(document.getElementById('hc-in-mean').value) || 0;
    const sigma = parseFloat(document.getElementById('hc-in-std').value) || 1;

    if (p <= 0 || p >= 1) return;

    // Abramowitz and Stegun approximation for inverse normal
    function inverseNormal(p) {
        const c = [2.515517, 0.802853, 0.010328];
        const d = [1.432788, 0.189269, 0.001308];
        let t = p < 0.5 ? Math.sqrt(-2 * Math.log(p)) : Math.sqrt(-2 * Math.log(1 - p));
        let num = c[0] + c[1] * t + c[2] * t * t;
        let den = 1 + d[0] * t + d[1] * t * t + d[2] * t * t * t;
        let z = t - (num / den);
        return p < 0.5 ? -z : z;
    }

    const z = inverseNormal(p);
    const x = mu + (z * sigma);

    document.getElementById('hc-res-in-val').innerText = x.toFixed(4);
    document.getElementById('hc-inv-norm-result').classList.add('visible');
}

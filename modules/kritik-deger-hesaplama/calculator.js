function hcKritikDegerHesapla() {
    const alpha = parseFloat(document.getElementById('hc-crit-alpha').value);
    const df = parseInt(document.getElementById('hc-crit-df').value);
    const tails = parseInt(document.querySelector('input[name="hc-crit-tails"]:checked').value);

    if (isNaN(df) || df <= 0) {
        alert('Lütfen geçerli bir serbestlik derecesi girin.');
        return;
    }

    const p = (tails === 2) ? 1 - (alpha / 2) : 1 - alpha;

    // Inverse Normal Approximation (Z)
    const getZ = (p) => {
        const t = Math.sqrt(-2 * Math.log(1 - p));
        const c0 = 2.515517, c1 = 0.802853, c2 = 0.010328;
        const d1 = 1.432788, d2 = 0.189269, d3 = 0.001308;
        return t - ((c0 + c1 * t + c2 * t * t) / (1 + d1 * t + d2 * t * t + d3 * t * t * t));
    };

    const zCrit = getZ(p);

    // Inverse T Approximation
    // For large df, T converges to Z. For small df, we use a simple approximation.
    const getT = (z, df) => {
        const g1 = (z * z + 1) / 4;
        const g2 = (5 * Math.pow(z, 4) + 16 * z * z + 3) / 96;
        const g3 = (3 * Math.pow(z, 6) + 19 * Math.pow(z, 4) + 17 * z * z - 15) / 384;
        return z + (g1 * z) / df + (g2 * z) / (df * df) + (g3 * z) / (df * df * df);
    };

    const tCrit = getT(zCrit, df);

    const fmt = (val) => val.toLocaleString('tr-TR', { minimumFractionDigits: 4, maximumFractionDigits: 4 });

    document.getElementById('hc-res-crit-z').innerText = fmt(zCrit);
    document.getElementById('hc-res-crit-t').innerText = fmt(tCrit);

    document.getElementById('hc-kritik-deger-result').classList.add('visible');
}

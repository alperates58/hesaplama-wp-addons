function hcBetaHesapla() {
    const x = parseFloat(document.getElementById('hc-beta-x').value);
    const alpha = parseFloat(document.getElementById('hc-beta-alpha').value);
    const beta = parseFloat(document.getElementById('hc-beta-beta').value);

    if (isNaN(x) || isNaN(alpha) || isNaN(beta) || x < 0 || x > 1 || alpha <= 0 || beta <= 0) {
        alert('Lütfen geçerli değerler girin (0 ≤ x ≤ 1, α > 0, β > 0).');
        return;
    }

    function gamma(z) {
        const g = 7;
        const p = [0.99999999999980993, 676.5203681218851, -1259.1392167224028,
            771.32342877765313, -176.61502916214059, 12.507343278686905,
            -0.13857109526572012, 9.9843695780195716e-6, 1.5056327351493116e-7];
        if (z < 0.5) return Math.PI / (Math.sin(Math.PI * z) * gamma(1 - z));
        z -= 1;
        let x = p[0];
        for (let i = 1; i < g + 2; i++) x += p[i] / (z + i);
        let t = z + g + 0.5;
        return Math.sqrt(2 * Math.PI) * Math.pow(t, z + 0.5) * Math.exp(-t) * x;
    }

    const betaFunc = (gamma(alpha) * gamma(beta)) / gamma(alpha + beta);
    const pdf = (Math.pow(x, alpha - 1) * Math.pow(1 - x, beta - 1)) / betaFunc;
    
    const mean = alpha / (alpha + beta);
    const variance = (alpha * beta) / (Math.pow(alpha + beta, 2) * (alpha + beta + 1));

    const fmt = (val) => val.toLocaleString('tr-TR', { maximumFractionDigits: 6 });

    document.getElementById('hc-res-beta-pdf').innerText = fmt(pdf);
    document.getElementById('hc-res-beta-mean').innerText = fmt(mean);
    document.getElementById('hc-res-beta-var').innerText = fmt(variance);

    document.getElementById('hc-beta-dagilimi-hesaplama-result').classList.add('visible');
}

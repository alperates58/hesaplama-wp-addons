function hcSigmaLevelHesapla() {
    const opp = parseInt(document.getElementById('hc-sl-opp').value) || 1;
    const def = parseInt(document.getElementById('hc-sl-def').value) || 0;

    const dpmo = (def / opp) * 1000000;
    
    // Normal distribution approximation for sigma
    // 3.4 DPMO = 6 Sigma (with 1.5 shift)
    function dpmoToSigma(d) {
        if (d <= 0) return 6;
        const p = d / 1000000;
        
        // Simplified inverse normal approximation for sigma level
        const t = Math.sqrt(Math.log(1 / Math.pow(p, 2)));
        const z = t - (2.30753 + 0.27061 * t) / (1 + 0.99229 * t + 0.04481 * t * t);
        return z + 1.5; // 1.5 shift
    }

    const sigma = dpmoToSigma(dpmo);

    document.getElementById('hc-res-sl-dpmo').innerText = Math.round(dpmo).toLocaleString('tr-TR');
    document.getElementById('hc-res-sl-val').innerText = sigma.toFixed(2);
    
    document.getElementById('hc-sigma-level-result').classList.add('visible');
}

function hcKiKareHesapla() {
    const obsInput = document.getElementById('hc-chi-obs').value;
    const expInput = document.getElementById('hc-chi-exp').value;

    const parse = (input) => input.split(/[,\s]+/).map(Number).filter(n => !isNaN(n));
    const obs = parse(obsInput);
    const exp = parse(expInput);

    if (obs.length < 2 || exp.length < 2) {
        alert('En az 2 kategori girmelisiniz.');
        return;
    }

    if (obs.length !== exp.length) {
        alert('Gözlemlenen ve beklenen değerlerin sayısı aynı olmalıdır.');
        return;
    }

    let chiVal = 0;
    for (let i = 0; i < obs.length; i++) {
        if (exp[i] === 0) continue;
        chiVal += Math.pow(obs[i] - exp[i], 2) / exp[i];
    }

    const df = obs.length - 1;
    
    // Chi-Square P-value approximation
    const getP = (chi, df) => {
        if (df <= 0) return 1;
        if (chi <= 0) return 1;
        
        // Wilson-Hilferty transformation for Chi-Square to Normal
        const z = Math.pow(chi / df, 1 / 3) - (1 - 2 / (9 * df));
        const zScore = z / Math.sqrt(2 / (9 * df));
        
        // Normal CDF approximation
        const t = 1 / (1 + 0.2316419 * Math.abs(zScore));
        const d = 0.3989423 * Math.exp(-zScore * zScore / 2);
        const prob = d * t * (0.3193815 + t * (-0.3565638 + t * (1.781478 + t * (-1.821256 + t * 1.330274))));
        return (zScore > 0) ? prob : 1 - prob;
    };

    const pValue = getP(chiVal, df);
    const fmt = (val) => val.toLocaleString('tr-TR', { maximumFractionDigits: 6 });

    document.getElementById('hc-res-chi-val').innerText = fmt(chiVal);
    document.getElementById('hc-res-chi-df').innerText = df;
    document.getElementById('hc-res-chi-p').innerText = fmt(pValue);
    
    let sig = "Anlamlı Değil (p > 0.05)";
    if (pValue < 0.01) sig = "Çok Anlamlı (p < 0.01)";
    else if (pValue < 0.05) sig = "Anlamlı (p < 0.05)";

    document.getElementById('hc-res-chi-sig').innerText = sig;
    document.getElementById('hc-ki-kare-result').classList.add('visible');
}

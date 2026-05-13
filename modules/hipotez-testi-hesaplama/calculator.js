function hcHipotezTestiHesapla() {
    const mu0 = parseFloat(document.getElementById('hc-hypo-mu0').value);
    const xBar = parseFloat(document.getElementById('hc-hypo-x').value);
    const sigma = parseFloat(document.getElementById('hc-hypo-sigma').value);
    const n = parseInt(document.getElementById('hc-hypo-n').value);

    if (isNaN(mu0) || isNaN(xBar) || isNaN(sigma) || isNaN(n) || n <= 0 || sigma <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    const z = (xBar - mu0) / (sigma / Math.sqrt(n));
    
    // Normal CDF approximation
    const getP = (z) => {
        const absZ = Math.abs(z);
        const t = 1 / (1 + 0.2316419 * absZ);
        const d = 0.3989423 * Math.exp(-absZ * absZ / 2);
        const prob = d * t * (0.3193815 + t * (-0.3565638 + t * (1.781478 + t * (-1.821256 + t * 1.330274))));
        return 2 * prob; // 2-tailed p-value
    };

    const pValue = getP(z);
    const fmt = (val) => val.toLocaleString('tr-TR', { maximumFractionDigits: 4 });

    document.getElementById('hc-res-hypo-z').innerText = fmt(z);
    document.getElementById('hc-res-hypo-p').innerText = fmt(pValue);
    
    let desc = "";
    if (pValue < 0.05) {
        desc = "Sonuç istatistiksel olarak anlamlıdır (p < 0.05). Sıfır hipotezi (H₀) reddedilir.";
    } else {
        desc = "Sonuç istatistiksel olarak anlamlı değildir (p >= 0.05). Sıfır hipotezi (H₀) reddedilemez.";
    }

    document.getElementById('hc-hypo-desc').innerText = desc;
    document.getElementById('hc-hipotez-testi-result').classList.add('visible');
}

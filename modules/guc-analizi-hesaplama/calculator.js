function hcGucAnaliziHesapla() {
    const alpha = parseFloat(document.getElementById('hc-pwr-alpha').value);
    const d = parseFloat(document.getElementById('hc-pwr-effect').value);
    const n = parseInt(document.getElementById('hc-pwr-n').value);

    if (isNaN(d) || isNaN(n) || n <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    // Z value for alpha (2-tailed)
    const zAlphas = { "0.01": 2.576, "0.05": 1.96, "0.10": 1.645 };
    const zAlpha = zAlphas[alpha.toString()];

    // Power = Phi( (d * sqrt(n)) - zAlpha )
    const lambda = d * Math.sqrt(n);
    const zPower = lambda - zAlpha;

    // Normal CDF function
    const normalCDF = (z) => {
        const t = 1 / (1 + 0.2316419 * Math.abs(z));
        const d = 0.3989423 * Math.exp(-z * z / 2);
        const prob = d * t * (0.3193815 + t * (-0.3565638 + t * (1.781478 + t * (-1.821256 + t * 1.330274))));
        return z > 0 ? 1 - prob : prob;
    };

    const power = normalCDF(zPower);
    
    document.getElementById('hc-res-pwr-val').innerText = '%' + (power * 100).toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    
    let desc = "";
    if (power >= 0.8) {
        desc = "Yeterli güç (%80 üstü). Test, gerçek bir etkiyi tespit etme konusunda güçlüdür.";
    } else {
        desc = "Düşük güç. Tip II hata (gerçek bir etkiyi kaçırma) riski yüksektir. Örneklem boyutunu artırmayı düşünün.";
    }

    document.getElementById('hc-pwr-desc').innerText = desc;
    document.getElementById('hc-guc-analizi-result').classList.add('visible');
}

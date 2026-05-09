function hcWeibullHesapla() {
    const x = parseFloat(document.getElementById('hc-wd-x').value) || 0;
    const k = parseFloat(document.getElementById('hc-wd-shape').value) || 1.5;
    const lambda = parseFloat(document.getElementById('hc-wd-scale').value) || 20;

    if (x < 0 || k <= 0 || lambda <= 0) return;

    // PDF: (k/lambda) * (x/lambda)^(k-1) * exp(-(x/lambda)^k)
    const pdf = (k / lambda) * Math.pow(x / lambda, k - 1) * Math.exp(-Math.pow(x / lambda, k));

    // CDF: 1 - exp(-(x/lambda)^k)
    const cdf = 1 - Math.exp(-Math.pow(x / lambda, k));

    document.getElementById('hc-res-wd-pdf').innerText = pdf.toFixed(6);
    document.getElementById('hc-res-wd-cdf').innerText = cdf.toFixed(6);
    
    document.getElementById('hc-weibull-result').classList.add('visible');
}

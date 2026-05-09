function hcExpDistHesapla() {
    const x = parseFloat(document.getElementById('hc-ed-x').value) || 0;
    const lambda = parseFloat(document.getElementById('hc-ed-rate').value) || 0.5;

    if (x < 0 || lambda <= 0) return;

    // PDF: lambda * exp(-lambda * x)
    const pdf = lambda * Math.exp(-lambda * x);

    // CDF: 1 - exp(-lambda * x)
    const cdf = 1 - Math.exp(-lambda * x);

    document.getElementById('hc-res-ed-pdf').innerText = pdf.toFixed(6);
    document.getElementById('hc-res-ed-cdf').innerText = cdf.toFixed(6);
    
    document.getElementById('hc-exp-dist-result').classList.add('visible');
}

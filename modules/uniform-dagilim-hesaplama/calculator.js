function hcUniformDistHesapla() {
    const a = parseFloat(document.getElementById('hc-ud-a').value) || 0;
    const b = parseFloat(document.getElementById('hc-ud-b').value) || 0;
    const x = parseFloat(document.getElementById('hc-ud-x').value) || 0;

    if (b <= a) {
        alert('Üst sınır alt sınırdan büyük olmalıdır.');
        return;
    }

    const pdf = 1 / (b - a);
    let cdf = 0;
    if (x < a) cdf = 0;
    else if (x > b) cdf = 1;
    else cdf = (x - a) / (b - a);

    document.getElementById('hc-res-ud-pdf').innerText = pdf.toFixed(4);
    document.getElementById('hc-res-ud-cdf').innerText = (cdf * 100).toFixed(2) + '%';
    
    document.getElementById('hc-unif-dist-result').classList.add('visible');
}

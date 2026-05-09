function hcValveCvHesapla() {
    const q = parseFloat(document.getElementById('hc-cv-q').value) || 0;
    const dp = parseFloat(document.getElementById('hc-cv-dp').value) || 1;
    const sg = parseFloat(document.getElementById('hc-cv-sg').value) || 1;

    if (dp <= 0) return;

    const cv = q * Math.sqrt(sg / dp);

    document.getElementById('hc-res-cv-val').innerText = cv.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    document.getElementById('hc-valve-cv-result').classList.add('visible');
}

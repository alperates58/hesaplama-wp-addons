function hcSürdürülebilirlikSkoruHesapla() {
    const checks = document.querySelectorAll('.hc-ss-point:checked');
    let score = 0;
    checks.forEach(c => score += parseFloat(c.value));
    score = Math.min(100, score);

    document.getElementById('hc-ss-val').innerText = score + ' / 100';

    let status = "Geliştirilmeli";
    let color = "#e67e22";
    if (score >= 85) { status = "Sürdürülebilirlik Öncüsü"; color = "#27ae60"; }
    else if (score >= 60) { status = "Bilinçli Tüketici"; color = "#2ecc71"; }
    else if (score >= 30) { status = "Başlangıç Seviyesi"; color = "#f1c40f"; }

    const statusEl = document.getElementById('hc-ss-status');
    statusEl.innerText = status;
    statusEl.style.color = color;
    document.getElementById('hc-ss-result').classList.add('visible');
}

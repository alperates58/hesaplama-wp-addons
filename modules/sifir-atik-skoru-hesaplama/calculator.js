function hcSıfırAtıkSkoruHesapla() {
    const checks = document.querySelectorAll('.hc-zw-point:checked');
    let score = 0;

    checks.forEach(c => score += parseFloat(c.value));

    // Skor 100'ü geçebilir ama biz 100 üzerinden gösterelim
    score = Math.min(100, score);

    document.getElementById('hc-zw-val').innerText = score + ' / 100';

    let status = "Gelişmekte";
    let color = "#e67e22";

    if (score >= 90) { status = "Sıfır Atık Kahramanı!"; color = "#27ae60"; }
    else if (score >= 70) { status = "Çevre Dostu"; color = "#2ecc71"; }
    else if (score >= 40) { status = "Orta Seviye"; color = "#f1c40f"; }

    const statusEl = document.getElementById('hc-zw-status');
    statusEl.innerText = status;
    statusEl.style.color = color;
    document.getElementById('hc-zw-result').classList.add('visible');
}

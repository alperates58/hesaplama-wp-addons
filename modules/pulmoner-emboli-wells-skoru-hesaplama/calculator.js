function hcWellsPEHesapla() {
    const checks = document.querySelectorAll('.hc-ws-check');
    let score = 0;
    checks.forEach(c => { if(c.checked) score += parseFloat(c.getAttribute('data-val')); });

    let probability = "";
    if (score > 6.0) probability = "Yüksek Olasılık (> %60)";
    else if (score >= 2.0) probability = "Orta Olasılık (~ %20)";
    else probability = "Düşük Olasılık (< %10)";

    document.getElementById('hc-ws-stats').innerHTML = `
        Wells Skoru: <strong>${score.toFixed(1)}</strong><br>
        Klinik Olasılık: <strong>${probability}</strong><br>
        <p style="font-size:0.85em; color:#666; margin-top:10px;">*4.0 puan üzeri "PE olası" olarak kabul edilir.</p>
    `;
    document.getElementById('hc-ws-result').classList.add('visible');
}

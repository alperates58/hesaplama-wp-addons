function hcGutHesapla() {
    let score = 0;
    if (document.getElementById('hc-g-joint').checked) score += 2;
    if (document.getElementById('hc-g-toe').checked) score += 2;
    if (document.getElementById('hc-g-red').checked) score += 1;
    if (document.getElementById('hc-g-male').checked) score += 2;

    const ua = parseFloat(document.getElementById('hc-g-ua').value);
    if (ua > 6.0) score += (ua > 8.0 ? 3 : 1);

    let risk = "";
    if (score <= 4) risk = "Düşük Olasılık";
    else if (score <= 8) risk = "Orta Olasılık";
    else risk = "Yüksek Olasılık (Gut Düşünülmeli)";

    document.getElementById('hc-g-stats').innerHTML = `
        Toplam Skor: <strong>${score}</strong><br>
        Risk Durumu: <strong>${risk}</strong><br>
        <p style="font-size:0.85em; color:#666; margin-top:10px;">*Bu skor klinik bir rehberdir, kesin tanı doktor kontrolü gerektirir.</p>
    `;
    document.getElementById('hc-g-result').classList.add('visible');
}

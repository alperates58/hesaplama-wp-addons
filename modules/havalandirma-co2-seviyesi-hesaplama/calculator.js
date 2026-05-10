function hcHavalandırmaCO2SeviyesiHesapla() {
    const n = parseFloat(document.getElementById('hc-co-persons').value);
    const v = parseFloat(document.getElementById('hc-co-area').value);
    const q = parseFloat(document.getElementById('hc-co-rate').value);

    if (!n || !q) return;

    // Kararlı hal CO2 formülü: C = Ca + (G / Q)
    // Ca: Dış hava CO2 (~400 ppm)
    // G: Kişi başı CO2 üretimi (~18-20 L/saat)
    const outdoorCo2 = 400;
    const generationPerPerson = 19; // L/saat
    
    // ppm = (mg/m3) veya (L/10^6L).
    // G (L/saat) / Q (m3/saat) * 1000 = ppm
    const indoorCo2 = outdoorCo2 + ( (n * generationPerPerson) / q ) * 1000;

    document.getElementById('hc-co-val').innerText = Math.round(indoorCo2) + ' ppm';

    let status = "Mükemmel";
    let color = "#27ae60";

    if (indoorCo2 > 1500) { status = "Kötü (Uykululuk, Baş Ağrısı)"; color = "#c0392b"; }
    else if (indoorCo2 > 1000) { status = "Dikkat (Havalandırın)"; color = "#e67e22"; }
    else if (indoorCo2 > 600) { status = "İyi"; color = "#f1c40f"; }

    const statusEl = document.getElementById('hc-co-status');
    statusEl.innerText = status;
    statusEl.style.color = color;
    document.getElementById('hc-co-result').classList.add('visible');
}

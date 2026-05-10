function hcHavaKalitesiİndeksiHesapla() {
    const pm25 = parseFloat(document.getElementById('hc-aq-pm25').value);
    const pm10 = parseFloat(document.getElementById('hc-aq-pm10').value);

    if (isNaN(pm25) && isNaN(pm10)) return;

    function calculateAQI(Cp, Ih, Il, BPh, BPl) {
        return Math.round(((Ih - Il) / (BPh - BPl)) * (Cp - BPl) + Il);
    }

    let aqiPM25 = 0;
    if (pm25 <= 12) aqiPM25 = calculateAQI(pm25, 50, 0, 12, 0);
    else if (pm25 <= 35.4) aqiPM25 = calculateAQI(pm25, 100, 51, 35.4, 12.1);
    else if (pm25 <= 55.4) aqiPM25 = calculateAQI(pm25, 150, 101, 55.4, 35.5);
    else if (pm25 <= 150.4) aqiPM25 = calculateAQI(pm25, 200, 151, 150.4, 55.5);
    else aqiPM25 = 300;

    let aqiPM10 = 0;
    if (pm10 <= 54) aqiPM10 = calculateAQI(pm10, 50, 0, 54, 0);
    else if (pm10 <= 154) aqiPM10 = calculateAQI(pm10, 100, 51, 154, 55);
    else if (pm10 <= 254) aqiPM10 = calculateAQI(pm10, 150, 101, 254, 155);
    else aqiPM10 = 300;

    const finalAQI = Math.max(aqiPM25, aqiPM10);
    document.getElementById('hc-aq-val').innerText = finalAQI;

    let status = "İyi";
    let desc = "Hava kalitesi tatmin edici ve risk çok az veya hiç yok.";
    let color = "#27ae60";

    if (finalAQI > 200) { status = "Çok Sağlıksız"; desc = "Herkes daha ciddi sağlık etkileri yaşayabilir."; color = "#8e44ad"; }
    else if (finalAQI > 150) { status = "Sağlıksız"; desc = "Herkes sağlık etkileri yaşamaya başlayabilir."; color = "#c0392b"; }
    else if (finalAQI > 100) { status = "Hassas Gruplar İçin Sağlıksız"; desc = "Hassas gruplar sağlık etkileri yaşayabilir."; color = "#e67e22"; }
    else if (finalAQI > 50) { status = "Orta"; desc = "Hava kalitesi kabul edilebilir."; color = "#f1c40f"; }

    const statusEl = document.getElementById('hc-aq-status');
    statusEl.innerText = status;
    statusEl.style.color = color;
    document.getElementById('hc-aq-desc').innerText = desc;
    document.getElementById('hc-aq-result').classList.add('visible');
}

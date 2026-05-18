function hcMutlakNemHesapla() {
    const temp = parseFloat(document.getElementById('hc-ah-temp').value);
    const rh = parseFloat(document.getElementById('hc-ah-rh').value);

    if (isNaN(temp) || isNaN(rh) || rh < 0 || rh > 100 || temp < -50 || temp > 100) {
        alert('Lütfen geçerli sıcaklık (-50 ile 100 °C arası) ve bağıl nem (% 0 ile 100 arası) değerleri giriniz.');
        return;
    }

    // 1. Doymuş Buhar Basıncı (es) - Tetens Formülü (hPa)
    const es = 6.1078 * Math.pow(10, (7.5 * temp) / (temp + 237.3));

    // 2. Aktüel Buhar Basıncı (e)
    const e = es * (rh / 100);

    // 3. Mutlak Nem (AH) - g/m3 cinsinden
    // AH = (216.7 * e) / (T + 273.15)
    const ah = (216.7 * e) / (temp + 273.15);

    // Magnus-Tetens Çiy Noktası Formülü
    const a = 17.27;
    const b = 237.7;
    const alpha = ((a * temp) / (b + temp)) + Math.log(rh / 100);
    const dewPoint = (b * alpha) / (a - alpha);

    document.getElementById('hc-ah-val').innerText = ah.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' g/m³';
    document.getElementById('hc-ah-es-val').innerText = es.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' hPa';
    document.getElementById('hc-ah-e-val').innerText = e.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' hPa';
    document.getElementById('hc-ah-dewpoint-val').innerText = dewPoint.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' °C';

    document.getElementById('hc-mutlak-nem-result').classList.add('visible');
}

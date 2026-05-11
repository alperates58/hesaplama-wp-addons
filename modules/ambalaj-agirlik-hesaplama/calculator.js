function hcAmbalajAgirlikHesapla() {
    const rho = parseFloat(document.getElementById('hc-pw-materyal').value);
    const alan = parseFloat(document.getElementById('hc-pw-alan').value);
    const kalinlik_mm = parseFloat(document.getElementById('hc-pw-kalinlik').value);

    if (!alan || !kalinlik_mm) {
        alert('Lütfen alan ve kalınlık bilgilerini giriniz.');
        return;
    }

    const kalinlik_m = kalinlik_mm / 1000;
    
    // Agirlik (kg) = Alan (m2) * Kalinlik (m) * Yoguluk (kg/m3)
    const agirlik_kg = alan * kalinlik_m * rho;
    const agirlik_g = agirlik_kg * 1000;

    const sonucDiv = document.getElementById('hc-pkg-weight-result');
    let resText = "";
    if (agirlik_g < 1000) {
        resText = agirlik_g.toLocaleString('tr-TR', {maximumFractionDigits: 1}) + ' g';
    } else {
        resText = agirlik_kg.toLocaleString('tr-TR', {maximumFractionDigits: 3}) + ' kg';
    }

    document.getElementById('hc-pw-res-val').innerText = resText;
    
    const noteDiv = document.getElementById('hc-pw-res-note');
    noteDiv.innerText = `Seçilen malzemenin yoğunluğu ${rho} kg/m³ olarak alınmıştır.`;

    sonucDiv.classList.add('visible');
}

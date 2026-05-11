function hcAktifCamurHesapla() {
    const Q = parseFloat(document.getElementById('hc-ac-debi').value);
    const So = parseFloat(document.getElementById('hc-ac-bod').value);
    const V = parseFloat(document.getElementById('hc-ac-hacim').value);
    const X = parseFloat(document.getElementById('hc-ac-mlss').value);

    if (!Q || !So || !V || !X) {
        alert('Lütfen tüm alanları doldurunuz.');
        return;
    }

    // F/M = (Q * So) / (V * X)
    // Q: m3/gun, So: mg/L, V: m3, X: mg/L
    // Birimler birbirini götürür: (m3/gun * g/m3) / (m3 * g/m3) = 1/gun
    const fm = (Q * So) / (V * X);

    // Organik Yükleme = (Q * So) / V  (g BOD / m3 . gun)
    const organikYuk = (Q * So) / V / 1000; // kg BOD / m3 . gun

    const sonucDiv = document.getElementById('hc-aktif-camur-result');
    document.getElementById('hc-ac-res-fm').innerText = fm.toLocaleString('tr-TR', {maximumFractionDigits: 3}) + ' kg BOD / kg MLSS.gün';
    document.getElementById('hc-ac-res-yuk').innerText = organikYuk.toLocaleString('tr-TR', {maximumFractionDigits: 3}) + ' kg BOD/m³.gün';
    
    const noteDiv = document.getElementById('hc-ac-res-note');
    let yorum = "";
    if (fm < 0.1) yorum = "Düşük hız (Extended Aeration) prosesi.";
    else if (fm < 0.4) yorum = "Standart aktif çamur prosesi.";
    else yorum = "Yüksek hızlı proses.";
    
    noteDiv.innerText = yorum;

    sonucDiv.classList.add('visible');
}

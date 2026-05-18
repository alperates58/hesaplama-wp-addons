function hcKüpYoğunluğuHesapla() {
    const sideVal = parseFloat(document.getElementById('hc-cube-side').value);
    const sideUnit = document.getElementById('hc-cube-side-unit').value;
    
    const massVal = parseFloat(document.getElementById('hc-cube-mass').value);
    const massUnit = document.getElementById('hc-cube-mass-unit').value;

    if (!sideVal || !massVal || sideVal <= 0 || massVal <= 0) {
        alert('Lütfen kenar uzunluğu ve kütleyi geçerli ve pozitif sayılar olarak giriniz.');
        return;
    }

    // SI birimlerine dönüştürme (metre ve kg)
    let sideM = sideVal;
    if (sideUnit === 'cm') {
        sideM = sideVal / 100;
    }

    let massKg = massVal;
    if (massUnit === 'g') {
        massKg = massVal / 1000;
    }

    // Hacim V = sideM^3
    const volM3 = Math.pow(sideM, 3);
    const volCm3 = volM3 * 1000000;

    // Yoğunluk rho = massKg / volM3
    const rhoKgM3 = massKg / volM3;
    const rhoGCm3 = rhoKgM3 / 1000;

    // Tahmini malzeme belirleme (rho in g/cm3)
    let mat = 'Bilinmeyen / Karmaşık Malzeme';
    if (rhoGCm3 >= 0.1 && rhoGCm3 < 0.3) mat = 'Mantar / Strafor';
    else if (rhoGCm3 >= 0.3 && rhoGCm3 < 0.9) mat = 'Ahşap (Çam/Meşe vb.)';
    else if (rhoGCm3 >= 0.9 && rhoGCm3 <= 1.0) mat = 'Su / Bazı Plastikler';
    else if (rhoGCm3 > 1.0 && rhoGCm3 < 2.0) mat = 'Sert Plastik / Tuğla (Gözenekli)';
    else if (rhoGCm3 >= 2.0 && rhoGCm3 < 3.0) mat = 'Cam / Beton / Alüminyum';
    else if (rhoGCm3 >= 7.0 && rhoGCm3 < 8.2) mat = 'Demir / Çelik';
    else if (rhoGCm3 >= 8.2 && rhoGCm3 < 9.5) mat = 'Bakır / Pirinç';
    else if (rhoGCm3 >= 10.0 && rhoGCm3 < 11.5) mat = 'Gümüş / Kurşun';
    else if (rhoGCm3 >= 18.0 && rhoGCm3 < 20.0) mat = 'Altın / Tungsten';

    document.getElementById('hc-cube-rho-val').innerText = rhoKgM3.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' kg/m³';
    document.getElementById('hc-cube-v-val').innerText = volM3.toLocaleString('tr-TR', { maximumFractionDigits: 6 }) + ' m³ (' + volCm3.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' cm³)';
    document.getElementById('hc-cube-rho-gcm-val').innerText = rhoGCm3.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' g/cm³';
    document.getElementById('hc-cube-material-val').innerText = mat;

    document.getElementById('hc-kup-yogunlugu-result').classList.add('visible');
}

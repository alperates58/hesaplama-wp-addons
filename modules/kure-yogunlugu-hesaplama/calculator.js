function hcSphereDimTypeChange() {
    const type = document.getElementById('hc-sphere-dim-type').value;
    const label = document.getElementById('hc-sphere-dim-label');
    if (type === 'radius') {
        label.innerText = 'Kürenin Yarıçapı';
    } else {
        label.innerText = 'Kürenin Çapı';
    }
}

function hcKüreYoğunluğuHesapla() {
    const dimVal = parseFloat(document.getElementById('hc-sphere-dim').value);
    const dimUnit = document.getElementById('hc-sphere-dim-unit').value;
    const dimType = document.getElementById('hc-sphere-dim-type').value;
    
    const massVal = parseFloat(document.getElementById('hc-sphere-mass').value);
    const massUnit = document.getElementById('hc-sphere-mass-unit').value;

    if (!dimVal || !massVal || dimVal <= 0 || massVal <= 0) {
        alert('Lütfen boyut ve kütle değerlerini geçerli ve pozitif sayılar olarak giriniz.');
        return;
    }

    // Yarıçapı metre cinsinden bulalım
    let rM = dimVal;
    if (dimType === 'diameter') {
        rM = dimVal / 2;
    }
    if (dimUnit === 'cm') {
        rM = rM / 100;
    }

    // Kütleyi kg cinsine çevirelim
    let massKg = massVal;
    if (massUnit === 'g') {
        massKg = massVal / 1000;
    }

    // Küre Hacmi V = 4/3 * pi * r^3
    const volM3 = (4 / 3) * Math.PI * Math.pow(rM, 3);
    const volCm3 = volM3 * 1000000;

    // Yoğunluk
    const rhoKgM3 = massKg / volM3;
    const rhoGCm3 = rhoKgM3 / 1000;

    // Tahmini malzeme
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

    document.getElementById('hc-sphere-rho-val').innerText = rhoKgM3.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' kg/m³';
    document.getElementById('hc-sphere-v-val').innerText = volM3.toLocaleString('tr-TR', { maximumFractionDigits: 6 }) + ' m³ (' + volCm3.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' cm³)';
    document.getElementById('hc-sphere-rho-gcm-val').innerText = rhoGCm3.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' g/cm³';
    document.getElementById('hc-sphere-material-val').innerText = mat;

    document.getElementById('hc-kure-yogunlugu-result').classList.add('visible');
}

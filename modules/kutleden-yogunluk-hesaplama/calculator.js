function hcKütledenYoğunlukHesapla() {
    const massVal = parseFloat(document.getElementById('hc-mtr-mass').value);
    const massUnit = document.getElementById('hc-mtr-mass-unit').value;
    
    const volVal = parseFloat(document.getElementById('hc-mtr-vol').value);
    const volUnit = document.getElementById('hc-mtr-vol-unit').value;

    if (!massVal || !volVal || massVal <= 0 || volVal <= 0) {
        alert('Lütfen kütle ve hacim değerlerini geçerli ve pozitif sayılar olarak giriniz.');
        return;
    }

    // SI birimlerine (kg ve m3) çevirme
    let massKg = massVal;
    if (massUnit === 'g') {
        massKg = massVal / 1000;
    }

    let volM3 = volVal;
    if (volUnit === 'l') {
        volM3 = volVal / 1000; // 1 m3 = 1000 L
    } else if (volUnit === 'cm3') {
        volM3 = volVal / 1e6; // 1 m3 = 10^6 cm3
    }

    // Yoğunluk
    const rhoKgM3 = massKg / volM3;
    const rhoGCm3 = rhoKgM3 / 1000;
    const rhoGL = rhoKgM3; // 1 kg/m3 = 1 g/L

    document.getElementById('hc-mtr-rho-val').innerText = rhoKgM3.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' kg/m³';
    document.getElementById('hc-mtr-rho-gcm-val').innerText = rhoGCm3.toLocaleString('tr-TR', { maximumFractionDigits: 5 }) + ' g/cm³';
    document.getElementById('hc-mtr-rho-gl-val').innerText = rhoGL.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' g/L';

    document.getElementById('hc-kutleden-yogunluk-result').classList.add('visible');
}

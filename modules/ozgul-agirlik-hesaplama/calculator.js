function hcSwInputTypeChange() {
    const type = document.getElementById('hc-sw-input-type').value;
    document.getElementById('hc-sw-density-group').style.display = type === 'density' ? 'block' : 'none';
    document.getElementById('hc-sw-massvol-group').style.display = type === 'mass-vol' ? 'block' : 'none';
}

function hcÖzgülAğırlıkHesapla() {
    const type = document.getElementById('hc-sw-input-type').value;
    const g = 9.80665; // Yerçekimi ivmesi

    let rho = 0;

    if (type === 'density') {
        rho = parseFloat(document.getElementById('hc-sw-rho').value);
        if (isNaN(rho) || rho <= 0) {
            alert('Lütfen pozitif ve geçerli bir yoğunluk değeri giriniz.');
            return;
        }
    } else {
        const m = parseFloat(document.getElementById('hc-sw-mass').value);
        const v = parseFloat(document.getElementById('hc-sw-vol').value);
        if (isNaN(m) || isNaN(v) || m <= 0 || v <= 0) {
            alert('Lütfen geçerli kütle ve hacim değerleri giriniz.');
            return;
        }
        rho = m / v; // Yoğunluk = Kütle / Hacim
    }

    // 1. Özgül Ağırlık gamma = rho * g (N/m^3)
    const gamma = rho * g;

    // 2. Bağıl Yoğunluk (Specific Gravity) SG = rho / rho_su (rho_su = 1000 kg/m^3)
    const sg = rho / 1000;

    // Sonuçları birim dönüştürerek gösterelim
    let gammaStr = gamma.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' N/m³';
    if (gamma >= 1000) {
        gammaStr += ' (' + (gamma / 1000).toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' kN/m³)';
    }

    document.getElementById('hc-sw-val').innerText = gammaStr;
    document.getElementById('hc-sw-sg-val').innerText = sg.toLocaleString('tr-TR', { maximumFractionDigits: 4 });
    document.getElementById('hc-sw-rho-val').innerText = rho.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' kg/m³';

    document.getElementById('hc-ozgul-agirlik-result').classList.add('visible');
}

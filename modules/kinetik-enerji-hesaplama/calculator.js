function hcKinetikEnerjiHesapla() {
    const mass = parseFloat(document.getElementById('hc-ke-mass').value);
    const vVal = parseFloat(document.getElementById('hc-ke-velocity').value);
    const unit = document.getElementById('hc-ke-v-unit').value;

    if (!mass || !vVal || mass <= 0 || vVal < 0) {
        alert('Lütfen kütle ve hız değerlerini geçerli ve pozitif olarak giriniz.');
        return;
    }

    // Hızı m/s cinsine çevirelim
    let v = vVal;
    if (unit === 'kms') {
        v = vVal / 3.6; // km/sa -> m/s
    }

    // Ek = 0.5 * m * v^2
    const EkJoule = 0.5 * mass * Math.pow(v, 2);
    const EkkJ = EkJoule / 1000;
    const EkMJ = EkJoule / 1000000;
    const EkWh = EkJoule / 3600; // 1 Wh = 3600 J

    document.getElementById('hc-ke-val').innerText = EkJoule.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' J';
    document.getElementById('hc-ke-kj-val').innerText = EkkJ.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' kJ';
    document.getElementById('hc-ke-mj-val').innerText = EkMJ.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' MJ';
    document.getElementById('hc-ke-wh-val').innerText = EkWh.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' Wh';

    document.getElementById('hc-kinetik-enerji-result').classList.add('visible');
}

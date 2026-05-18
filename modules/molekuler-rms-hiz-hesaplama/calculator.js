function hcMrmsGasChange() {
    const gas = document.getElementById('hc-mrms-gas').value;
    const customGroup = document.getElementById('hc-mrms-custom-molar-group');
    customGroup.style.display = gas === 'custom' ? 'block' : 'none';
}

function hcMolekülerRMSHızHesapla() {
    const gasSelect = document.getElementById('hc-mrms-gas').value;
    const tempC = parseFloat(document.getElementById('hc-mrms-temp').value);

    let M = 0.028; // default kg/mol
    if (gasSelect === 'custom') {
        const customMolar = parseFloat(document.getElementById('hc-mrms-m').value);
        if (isNaN(customMolar) || customMolar <= 0) {
            alert('Lütfen geçerli bir molar kütle giriniz.');
            return;
        }
        M = customMolar / 1000; // g/mol -> kg/mol
    } else {
        M = parseFloat(gasSelect);
    }

    if (isNaN(tempC) || tempC < -273.15) {
        alert('Lütfen mutlak sıfırın (-273.15 °C) üzerinde geçerli bir sıcaklık giriniz.');
        return;
    }

    // Kelvin sıcaklık
    const T = tempC + 273.15;

    // R = 8.31446 J/(mol K)
    const R = 8.31446;

    // v_rms = sqrt(3 * R * T / M)
    const vRms = Math.sqrt((3 * R * T) / M);
    const vKmh = vRms * 3.6;

    document.getElementById('hc-mrms-val').innerText = vRms.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' m/s';
    document.getElementById('hc-mrms-kelvin-val').innerText = T.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' K';
    document.getElementById('hc-mrms-kmh-val').innerText = vKmh.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' km/sa';

    document.getElementById('hc-molekuler-rms-hiz-result').classList.add('visible');
}

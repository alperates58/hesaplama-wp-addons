function hcRmsMethodChange() {
    const method = document.getElementById('hc-rms-method').value;
    document.getElementById('hc-rms-dataset-group').style.display = method === 'dataset' ? 'block' : 'none';
    document.getElementById('hc-rms-particle-group').style.display = method === 'particle' ? 'block' : 'none';
}

function hcRMSHızHesapla() {
    const method = document.getElementById('hc-rms-method').value;
    
    let rms = 0;
    let avg = 0;
    let countText = '';

    if (method === 'dataset') {
        const inputStr = document.getElementById('hc-rms-speeds').value;
        // Sayıları ayrıştıralım
        const speeds = inputStr.split(/[\s,;]+/).map(parseFloat).filter(n => !isNaN(n));
        
        if (speeds.length === 0) {
            alert('Lütfen en az bir hız değeri giriniz.');
            return;
        }

        // RMS = sqrt((v1^2 + v2^2 + ...) / N)
        const sumSquares = speeds.reduce((sum, v) => sum + Math.pow(v, 2), 0);
        rms = Math.sqrt(sumSquares / speeds.length);
        
        const sum = speeds.reduce((sum, v) => sum + v, 0);
        avg = sum / speeds.length;
        countText = speeds.length + ' adet hız değeri';
    } else {
        const tempC = parseFloat(document.getElementById('hc-rms-temp').value);
        const massStr = document.getElementById('hc-rms-mass').value;
        const m = parseFloat(massStr);

        if (isNaN(tempC) || tempC < -273.15 || isNaN(m) || m <= 0) {
            alert('Lütfen geçerli bir sıcaklık (>-273.15 °C) ve pozitif parçacık kütlesi giriniz.');
            return;
        }

        // T in Kelvin
        const T = tempC + 273.15;
        // kB = 1.380649e-23 J/K
        const kB = 1.380649e-23;

        // v_rms = sqrt(3 * kB * T / m)
        rms = Math.sqrt((3 * kB * T) / m);
        avg = Math.sqrt((8 * kB * T) / (Math.PI * m)); // Ortalama moleküler hız
        countText = 'Mikroskobik Simülasyon';
    }

    document.getElementById('hc-rms-val').innerText = rms.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' m/s';
    document.getElementById('hc-rms-avg-val').innerText = avg.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' m/s';
    document.getElementById('hc-rms-count-val').innerText = countText;

    document.getElementById('hc-rms-hiz-result').classList.add('visible');
}

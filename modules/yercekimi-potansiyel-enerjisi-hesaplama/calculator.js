function hcPotansiyelSolveDegisti() {
    var mode = document.getElementById('hc-peh-solve').value;
    
    document.getElementById('hc-peh-energy-group').style.display = mode === 'energy' ? 'none' : 'block';
    document.getElementById('hc-peh-mass-group').style.display = mode === 'mass' ? 'none' : 'block';
    document.getElementById('hc-peh-height-group').style.display = mode === 'height' ? 'none' : 'block';
}

function hcPotansiyelGezegenDegisti() {
    var pSelect = document.getElementById('hc-peh-planet').value;
    var customG = document.getElementById('hc-peh-custom-g-group');
    
    if (pSelect === 'custom') {
        customG.style.display = 'block';
    } else {
        customG.style.display = 'none';
    }
}

function hcPotansiyelEnerjiHesapla() {
    var mode = document.getElementById('hc-peh-solve').value;
    var pSelect = document.getElementById('hc-peh-planet').value;
    
    var g = parseFloat(pSelect);
    if (pSelect === 'custom') {
        g = parseFloat(document.getElementById('hc-peh-custom-g').value);
    }

    if (isNaN(g) || g <= 0) {
        alert('Lütfen geçerli bir yerçekimi ivmesi değeri girin.');
        return;
    }

    var resVal = 0;
    var resLabel = '';
    var desc = '';
    var E = 0; // energy in Joules for final conversions

    if (mode === 'energy') {
        var m = parseFloat(document.getElementById('hc-peh-mass').value);
        var h = parseFloat(document.getElementById('hc-peh-height').value);

        if (isNaN(m) || m < 0 || isNaN(h) || h < 0) {
            alert('Lütfen geçerli kütle ve yükseklik değerleri girin.');
            return;
        }

        // PE = m * g * h
        E = m * g * h;
        resVal = E;
        resLabel = 'Potansiyel Enerji (PE):';
        desc = m.toLocaleString('tr-TR') + ' kg kütleli bir cismin, ' + g.toLocaleString('tr-TR') + ' m/s² yerçekimi ivmesi altında ' + h.toLocaleString('tr-TR') + ' metre yüksekteyken kazandığı yerçekimi potansiyel enerjisi tam ' + E.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' Joule\'dür (PE = m × g × h).';
    } else if (mode === 'mass') {
        var energy = parseFloat(document.getElementById('hc-peh-energy').value);
        var h = parseFloat(document.getElementById('hc-peh-height').value);

        if (isNaN(energy) || energy < 0 || isNaN(h) || h <= 0) {
            alert('Lütfen geçerli potansiyel enerji ve pozitif yükseklik girin.');
            return;
        }

        // m = PE / (g * h)
        var m = energy / (g * h);
        resVal = m;
        E = energy;
        resLabel = 'Kütle (m):';
        desc = h.toLocaleString('tr-TR') + ' metre yükseklikteyken ' + energy.toLocaleString('tr-TR') + ' Joule potansiyel enerji depolayan bir cismin kütlesi ' + m.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' kg olarak hesaplanmıştır (m = PE / (g × h)).';
    } else {
        var energy = parseFloat(document.getElementById('hc-peh-energy').value);
        var m = parseFloat(document.getElementById('hc-peh-mass').value);

        if (isNaN(energy) || energy < 0 || isNaN(m) || m <= 0) {
            alert('Lütfen geçerli potansiyel enerji ve pozitif kütle girin.');
            return;
        }

        // h = PE / (g * m)
        var h = energy / (g * m);
        resVal = h;
        E = energy;
        resLabel = 'Yükseklik (h):';
        desc = m.toLocaleString('tr-TR') + ' kg kütleli bir cismin ' + energy.toLocaleString('tr-TR') + ' Joule yerçekimi potansiyel enerjisine sahip olabilmesi için bulunması gereken yükseklik tam ' + h.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' metredir (h = PE / (g × m)).';
    }

    var unit = mode === 'energy' ? ' J' : (mode === 'mass' ? ' kg' : ' m');
    var cal = E * 0.2388458966;

    document.getElementById('hc-peh-res-label').innerText = resLabel;
    document.getElementById('hc-peh-res-val').innerText = resVal.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + unit;
    document.getElementById('hc-peh-res-cal').innerText = cal.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' cal';
    document.getElementById('hc-peh-desc').innerText = desc;

    document.getElementById('hc-yercekimi-potansiyel-enerjisi-hesaplama-result').classList.add('visible');
}

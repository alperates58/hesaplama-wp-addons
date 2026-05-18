function hcYhkSolveDegisti() {
    var mode = document.getElementById('hc-yhk-solve').value;
    
    document.getElementById('hc-yhk-density-group').style.display = mode === 'density' ? 'none' : 'block';
    document.getElementById('hc-yhk-mass-group').style.display = mode === 'mass' ? 'none' : 'block';
    document.getElementById('hc-yhk-volume-group').style.display = mode === 'volume' ? 'none' : 'block';
    document.getElementById('hc-yhk-preset-group').style.display = mode === 'density' ? 'block' : 'none';
}

function hcYhkPresetDegisti() {
    var preset = document.getElementById('hc-yhk-preset').value;
    if (preset !== '') {
        document.getElementById('hc-yhk-density').value = parseFloat(preset);
    }
}

function hcYhkHesapla() {
    var mode = document.getElementById('hc-yhk-solve').value;
    var d = parseFloat(document.getElementById('hc-yhk-density').value);
    var m = parseFloat(document.getElementById('hc-yhk-mass').value);
    var V = parseFloat(document.getElementById('hc-yhk-volume').value);

    var resVal = 0;
    var resLabel = '';
    var extraVal = '';
    var desc = '';

    if (mode === 'density') {
        if (isNaN(m) || m < 0 || isNaN(V) || V <= 0) {
            alert('Lütfen geçerli kütle ve pozitif hacim değerleri girin.');
            return;
        }

        // d = m / V
        d = m / V;
        resVal = d;
        resLabel = 'Yoğunluk (d):';
        var gcm = d / 1000; // kg/m^3 to g/cm^3
        extraVal = gcm.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' g/cm³';
        desc = m.toLocaleString('tr-TR') + ' kg kütleye sahip ve ' + V.toLocaleString('tr-TR', { maximumFractionDigits: 6 }) + ' m³ hacim kaplayan bir maddenin yoğunluğu (özkütlesi) tam ' + d.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' kg/m³ olarak hesaplanmıştır.';
    } else if (mode === 'mass') {
        if (isNaN(d) || d <= 0 || isNaN(V) || V <= 0) {
            alert('Lütfen geçerli yoğunluk ve pozitif hacim değerleri girin.');
            return;
        }

        // m = d * V
        m = d * V;
        resVal = m;
        resLabel = 'Kütle (m):';
        var grams = m * 1000;
        extraVal = grams.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' g';
        desc = d.toLocaleString('tr-TR') + ' kg/m³ yoğunluğa sahip bir malzemeden yapılan ' + V.toLocaleString('tr-TR', { maximumFractionDigits: 6 }) + ' m³ hacmindeki bir cismin toplam kütlesi ' + m.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' kg olarak hesaplanmıştır.';
    } else {
        if (isNaN(m) || m < 0 || isNaN(d) || d <= 0) {
            alert('Lütfen geçerli kütle ve pozitif yoğunluk değerleri girin.');
            return;
        }

        // V = m / d
        V = m / d;
        resVal = V;
        resLabel = 'Hacim (V):';
        var liters = V * 1000;
        extraVal = liters.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' Litre (L)';
        desc = d.toLocaleString('tr-TR') + ' kg/m³ yoğunluğa sahip bir malzemeden yapılan ' + m.toLocaleString('tr-TR') + ' kg kütleli cismin kapladığı toplam hacim ' + V.toLocaleString('tr-TR', { maximumFractionDigits: 6 }) + ' metreküp (m³) veya ' + liters.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' Litre\'dir.';
    }

    var unit = mode === 'density' ? ' kg/m³' : (mode === 'mass' ? ' kg' : ' m³');
    document.getElementById('hc-yhk-res-label').innerText = resLabel;
    document.getElementById('hc-yhk-res-val').innerText = resVal.toLocaleString('tr-TR', { maximumFractionDigits: 6 }) + unit;
    
    document.getElementById('hc-yhk-res-extra-row').style.display = 'flex';
    document.getElementById('hc-yhk-res-extra').innerText = extraVal;
    
    document.getElementById('hc-yhk-desc').innerText = desc;
    document.getElementById('hc-yogunluk-hacim-kutle-hesaplama-result').classList.add('visible');
}

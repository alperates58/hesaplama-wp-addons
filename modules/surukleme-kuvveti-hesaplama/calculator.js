function hcSuruklemeSablonDegisti() {
    var preset = document.getElementById('hc-srk-preset').value;
    var cdInput = document.getElementById('hc-srk-cd');

    if (preset === 'sphere') cdInput.value = 0.47;
    else if (preset === 'cube') cdInput.value = 1.05;
    else if (preset === 'cylinder') cdInput.value = 0.82;
    else if (preset === 'car') cdInput.value = 0.28;
    else if (preset === 'streamlined') cdInput.value = 0.04;
}

function hcSuruklemeAkiskanDegisti() {
    var fluid = document.getElementById('hc-srk-fluid').value;
    var rhoInput = document.getElementById('hc-srk-rho');
    var rhoGroup = document.getElementById('hc-srk-rho-group');

    if (fluid === 'air') {
        rhoInput.value = 1.225;
        rhoGroup.style.display = 'none';
    } else if (fluid === 'water') {
        rhoInput.value = 998.2;
        rhoGroup.style.display = 'none';
    } else {
        rhoGroup.style.display = 'block';
    }
}

function hcSuruklemeKuvvetiHesapla() {
    var cd = parseFloat(document.getElementById('hc-srk-cd').value);
    var fluid = document.getElementById('hc-srk-fluid').value;
    var rho = parseFloat(document.getElementById('hc-srk-rho').value);
    var v = parseFloat(document.getElementById('hc-srk-v').value);
    var A = parseFloat(document.getElementById('hc-srk-area').value);

    if (isNaN(cd) || cd < 0) {
        alert('Lütfen geçerli bir sürükleme katsayısı (Cd) girin.');
        return;
    }
    if (isNaN(rho) || rho <= 0) {
        alert('Lütfen geçerli bir akışkan yoğunluğu değeri girin.');
        return;
    }
    if (isNaN(v) || v < 0) {
        alert('Lütfen geçerli bir hız değeri girin.');
        return;
    }
    if (isNaN(A) || A <= 0) {
        alert('Lütfen geçerli bir projeksiyon kesit alanı değeri girin.');
        return;
    }

    // Fd = 0.5 * rho * v^2 * Cd * A
    var Fd = 0.5 * rho * Math.pow(v, 2) * cd * A;
    var vKmh = v * 3.6;

    document.getElementById('hc-srk-res-fd').innerText = Fd.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' N';
    document.getElementById('hc-srk-res-kmh').innerText = vKmh.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' km/sa';

    var desc = A.toLocaleString('tr-TR') + ' m² projeksiyon alanına ve ' + cd.toLocaleString('tr-TR') + ' sürükleme katsayısına (Cd) sahip bir cisim, yoğunluğu ' + rho.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' kg/m³ olan bir akışkanda ' + vKmh.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' km/sa (' + v.toLocaleString('tr-TR') + ' m/s) hızla hareket ederken tam olarak ' + Fd.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' Newton aerodinamik/hidrodinamik sürükleme kuvvetiyle (dirençle) karşılaşır.';
    document.getElementById('hc-srk-desc').innerText = desc;

    document.getElementById('hc-surukleme-kuvveti-hesaplama-result').classList.add('visible');
}

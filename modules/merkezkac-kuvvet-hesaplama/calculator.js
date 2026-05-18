function hcCentrifugalSpeedTypeChange() {
    const type = document.getElementById('hc-cf-speed-type').value;
    document.getElementById('hc-cf-linear-group').style.display = type === 'linear' ? 'block' : 'none';
    document.getElementById('hc-cf-angular-group').style.display = type === 'angular' ? 'block' : 'none';
}

function hcMerkezkaçKuvvetHesapla() {
    const m = parseFloat(document.getElementById('hc-cf-mass').value);
    const r = parseFloat(document.getElementById('hc-cf-r').value);
    const speedType = document.getElementById('hc-cf-speed-type').value;

    if (isNaN(m) || isNaN(r) || m <= 0 || r <= 0) {
        alert('Lütfen geçerli ve pozitif kütle ve yarıçap değerleri giriniz.');
        return;
    }

    let force = 0;
    let accel = 0;

    if (speedType === 'linear') {
        const v = parseFloat(document.getElementById('hc-cf-v').value);
        if (isNaN(v) || v < 0) {
            alert('Lütfen çizgisel hız değerini giriniz.');
            return;
        }
        // Ff = m * v^2 / r
        force = (m * Math.pow(v, 2)) / r;
        accel = Math.pow(v, 2) / r;
    } else {
        const wVal = parseFloat(document.getElementById('hc-cf-w').value);
        const wUnit = document.getElementById('hc-cf-w-unit').value;
        if (isNaN(wVal) || wVal < 0) {
            alert('Lütfen açısal hız değerini giriniz.');
            return;
        }

        let omega = wVal;
        if (wUnit === 'rpm') {
            omega = (wVal * 2 * Math.PI) / 60;
        }

        // Ff = m * omega^2 * r
        force = m * Math.pow(omega, 2) * r;
        accel = Math.pow(omega, 2) * r;
    }

    // G-Kuvveti (Dünya yerçekimi ivmesi g = 9.80665 m/s^2)
    const gForce = accel / 9.80665;

    document.getElementById('hc-cf-val').innerText = force.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' N';
    document.getElementById('hc-cf-accel-val').innerText = accel.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' m/s²';
    document.getElementById('hc-cf-g-val').innerText = gForce.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' g';

    document.getElementById('hc-merkezkac-kuvvet-result').classList.add('visible');
}

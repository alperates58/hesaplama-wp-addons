function hcCentripetalSpeedTypeChange() {
    const type = document.getElementById('hc-c-speed-type').value;
    document.getElementById('hc-c-linear-group').style.display = type === 'linear' ? 'block' : 'none';
    document.getElementById('hc-c-angular-group').style.display = type === 'angular' ? 'block' : 'none';
}

function hcMerkezcilKuvvetHesapla() {
    const m = parseFloat(document.getElementById('hc-c-mass').value);
    const r = parseFloat(document.getElementById('hc-c-r').value);
    const speedType = document.getElementById('hc-c-speed-type').value;

    if (isNaN(m) || isNaN(r) || m <= 0 || r <= 0) {
        alert('Lütfen geçerli ve pozitif kütle ve yarıçap değerleri giriniz.');
        return;
    }

    let force = 0;
    let accel = 0;
    let speedEquiv = '';

    if (speedType === 'linear') {
        const v = parseFloat(document.getElementById('hc-c-v').value);
        if (isNaN(v) || v < 0) {
            alert('Lütfen çizgisel hız değerini giriniz.');
            return;
        }
        // Fc = m * v^2 / r
        force = (m * Math.pow(v, 2)) / r;
        accel = Math.pow(v, 2) / r;
        
        const omega = v / r;
        const rpm = (omega * 60) / (2 * Math.PI);
        speedEquiv = `Açısal Hız (&omega;): ${omega.toLocaleString('tr-TR', { maximumFractionDigits: 3 })} rad/s (${rpm.toLocaleString('tr-TR', { maximumFractionDigits: 1 })} RPM)`;
    } else {
        const wVal = parseFloat(document.getElementById('hc-c-w').value);
        const wUnit = document.getElementById('hc-c-w-unit').value;
        if (isNaN(wVal) || wVal < 0) {
            alert('Lütfen açısal hız değerini giriniz.');
            return;
        }

        let omega = wVal;
        if (wUnit === 'rpm') {
            omega = (wVal * 2 * Math.PI) / 60; // rpm -> rad/s
        }

        // Fc = m * omega^2 * r
        force = m * Math.pow(omega, 2) * r;
        accel = Math.pow(omega, 2) * r;
        
        const v = omega * r;
        speedEquiv = `Çizgisel Hız (v): ${v.toLocaleString('tr-TR', { maximumFractionDigits: 3 })} m/s`;
    }

    document.getElementById('hc-c-val').innerText = force.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' N';
    document.getElementById('hc-c-accel-val').innerText = accel.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' m/s²';
    document.getElementById('hc-c-speed-equivalent-val').innerHTML = speedEquiv;

    document.getElementById('hc-merkezcil-kuvvet-result').classList.add('visible');
}

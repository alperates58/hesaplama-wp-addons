function hcVolanEnerjiHesapla() {
    var type = document.getElementById('hc-vle-type').value;
    var m = parseFloat(document.getElementById('hc-vle-m').value);
    var r = parseFloat(document.getElementById('hc-vle-r').value);
    var rpm = parseFloat(document.getElementById('hc-vle-rpm').value);

    if (isNaN(m) || m <= 0) {
        alert('Lütfen geçerli bir kütle değeri girin.');
        return;
    }
    if (isNaN(r) || r <= 0) {
        alert('Lütfen geçerli bir dış yarıçap girin.');
        return;
    }
    if (isNaN(rpm) || rpm < 0) {
        alert('Lütfen geçerli bir dönüş hızı (RPM) girin.');
        return;
    }

    // Moment of inertia: I
    var I = 0;
    if (type === 'disk') {
        I = 0.5 * m * Math.pow(r, 2);
    } else if (type === 'rim') {
        I = m * Math.pow(r, 2);
    } else {
        // Hollow thick cylinder with inner radius = 0.5 * outer radius
        // I = 0.5 * m * (R1^2 + R2^2) = 0.5 * m * (0.25 * r^2 + r^2) = 0.625 * m * r^2
        I = 0.625 * m * Math.pow(r, 2);
    }

    // Angular velocity: omega = (2 * pi * rpm) / 60
    var omega = (2 * Math.PI * rpm) / 60;

    // Energy: E = 0.5 * I * omega^2
    var E = 0.5 * I * Math.pow(omega, 2);
    
    // E in Wh = E / 3600
    var Ewh = E / 3600;

    document.getElementById('hc-vle-res-j').innerText = E.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' Joule';
    document.getElementById('hc-vle-res-wh').innerText = Ewh.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' Wh';
    document.getElementById('hc-vle-res-i').innerText = I.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' kg·m²';

    var desc = m.toLocaleString('tr-TR') + ' kg kütleli ve ' + r.toLocaleString('tr-TR') + ' m yarıçaplı volan, ' + rpm.toLocaleString('tr-TR') + ' RPM dönüş hızında tam olarak ' + E.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' Joule (' + Ewh.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' Wh) kinetik enerji depolar. Volanın eylemsizlik momenti ise ' + I.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' kg·m² olarak hesaplanmıştır.';
    document.getElementById('hc-vle-desc').innerText = desc;

    document.getElementById('hc-volan-enerji-depolama-hesaplama-result').classList.add('visible');
}

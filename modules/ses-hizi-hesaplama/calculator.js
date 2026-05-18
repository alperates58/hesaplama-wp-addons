function hcSesHiziOrtamDegisti() {
    var medium = document.getElementById('hc-sh-medium').value;
    if (medium === 'air') {
        document.getElementById('hc-sh-temp-group').style.display = 'block';
        document.getElementById('hc-sh-liquid-group').style.display = 'none';
        document.getElementById('hc-sh-solid-group').style.display = 'none';
    } else if (medium === 'liquid') {
        document.getElementById('hc-sh-temp-group').style.display = 'none';
        document.getElementById('hc-sh-liquid-group').style.display = 'block';
        document.getElementById('hc-sh-solid-group').style.display = 'none';
    } else {
        document.getElementById('hc-sh-temp-group').style.display = 'none';
        document.getElementById('hc-sh-liquid-group').style.display = 'none';
        document.getElementById('hc-sh-solid-group').style.display = 'block';
    }
}

function hcSesHiziHesapla() {
    var medium = document.getElementById('hc-sh-medium').value;
    var v = 0;
    var desc = '';

    if (medium === 'air') {
        var temp = parseFloat(document.getElementById('hc-sh-temp').value);
        if (isNaN(temp)) {
            alert('Lütfen geçerli bir sıcaklık girin.');
            return;
        }
        // v = 331.3 * sqrt(1 + T/273.15)
        v = 331.3 * Math.sqrt(1 + temp / 273.15);
        desc = temp.toLocaleString('tr-TR') + ' °C sıcaklıktaki kuru havada ses hızı yaklaşık olarak ' + v.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' m/s\'dir.';
    } else if (medium === 'liquid') {
        var bulk = parseFloat(document.getElementById('hc-sh-bulk').value); // GPa
        var rho = parseFloat(document.getElementById('hc-sh-rho-liq').value); // kg/m^3

        if (isNaN(bulk) || bulk <= 0 || isNaN(rho) || rho <= 0) {
            alert('Lütfen Bulk Modülü ve Yoğunluk alanlarını pozitif değerlerle doldurun.');
            return;
        }
        // v = sqrt(K / rho). Note: K is in GPa = 1e9 Pa
        v = Math.sqrt((bulk * 1e9) / rho);
        desc = 'Bulk modülü ' + bulk.toLocaleString('tr-TR') + ' GPa ve yoğunluğu ' + rho.toLocaleString('tr-TR') + ' kg/m³ olan sıvı içerisinde ses, ' + v.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' m/s hızla yayılır.';
    } else {
        var young = parseFloat(document.getElementById('hc-sh-young').value); // GPa
        var rho = parseFloat(document.getElementById('hc-sh-rho-sol').value); // kg/m^3

        if (isNaN(young) || young <= 0 || isNaN(rho) || rho <= 0) {
            alert('Lütfen Young Modülü ve Yoğunluk alanlarını pozitif değerlerle doldurun.');
            return;
        }
        // v = sqrt(E / rho). E is in GPa = 1e9 Pa
        v = Math.sqrt((young * 1e9) / rho);
        desc = 'Young modülü ' + young.toLocaleString('tr-TR') + ' GPa ve yoğunluğu ' + rho.toLocaleString('tr-TR') + ' kg/m³ olan katı malzeme içerisinde ses dalgaları boyuna olarak ' + v.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' m/s hızla ilerler.';
    }

    var vKmh = v * 3.6;

    document.getElementById('hc-sh-res-ms').innerText = v.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' m/s';
    document.getElementById('hc-sh-res-kmh').innerText = vKmh.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' km/sa';
    document.getElementById('hc-sh-desc').innerText = desc;

    document.getElementById('hc-ses-hizi-hesaplama-result').classList.add('visible');
}

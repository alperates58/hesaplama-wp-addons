function hcSesDalgaBoyuModDegisti() {
    var mode = document.getElementById('hc-sdb-mode').value;
    if (mode === 'temp') {
        document.getElementById('hc-sdb-temp-group').style.display = 'block';
        document.getElementById('hc-sdb-v-group').style.display = 'none';
    } else {
        document.getElementById('hc-sdb-temp-group').style.display = 'none';
        document.getElementById('hc-sdb-v-group').style.display = 'block';
    }
}

function hcSesDalgaBoyuHesapla() {
    var f = parseFloat(document.getElementById('hc-sdb-f').value);
    var mode = document.getElementById('hc-sdb-mode').value;

    if (isNaN(f) || f <= 0) {
        alert('Lütfen pozitif bir frekans değeri girin.');
        return;
    }

    var v = 0;
    if (mode === 'temp') {
        var temp = parseFloat(document.getElementById('hc-sdb-temp').value);
        if (isNaN(temp)) {
            alert('Lütfen geçerli bir sıcaklık değeri girin.');
            return;
        }
        // v = 331.3 * sqrt(1 + T / 273.15)
        v = 331.3 * Math.sqrt(1 + temp / 273.15);
    } else {
        v = parseFloat(document.getElementById('hc-sdb-v').value);
        if (isNaN(v) || v <= 0) {
            alert('Lütfen geçerli bir ses hızı değeri girin.');
            return;
        }
    }

    // lambda = v / f
    var lambda = v / f;
    var lambdaCm = lambda * 100;

    document.getElementById('hc-sdb-res-m').innerText = lambda.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' m';
    document.getElementById('hc-sdb-res-cm').innerText = lambdaCm.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' cm';
    document.getElementById('hc-sdb-res-v').innerText = v.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' m/s';

    var desc = f.toLocaleString('tr-TR') + ' Hz frekansındaki ses dalgası, ' + v.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' m/s yayılma hızına sahip bir ortamda tam olarak ' + lambdaCm.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' cm dalga boyuna sahiptir.';
    document.getElementById('hc-sdb-desc').innerText = desc;

    document.getElementById('hc-ses-dalga-boyu-hesaplama-result').classList.add('visible');
}

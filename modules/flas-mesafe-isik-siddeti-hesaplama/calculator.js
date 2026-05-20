function hcFlasModuDegis() {
    var mode = document.getElementById('hc-flash-mode').value;
    document.getElementById('hc-flash-distance-group').style.display = mode === 'distance' ? 'block' : 'none';
    document.getElementById('hc-flash-aperture-group').style.display = mode === 'aperture' ? 'block' : 'none';
}

function hcFlasMesafeIsikSiddietiHesapla() {
    var gn = parseFloat(document.getElementById('hc-flash-gn').value);
    var iso = parseFloat(document.getElementById('hc-flash-iso').value);
    var mode = document.getElementById('hc-flash-mode').value;

    if (isNaN(gn) || isNaN(iso) || gn <= 0 || iso <= 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    // ISO düzeltmesi (ISO 100 referans)
    var gnCorrected = gn * Math.sqrt(iso / 100);

    if (mode === 'distance') {
        var distance = parseFloat(document.getElementById('hc-flash-distance').value);
        if (isNaN(distance) || distance <= 0) {
            alert('Lütfen geçerli bir mesafe giriniz.');
            return;
        }
        // f-stop = GN / distance
        var aperture = gnCorrected / distance;
        document.getElementById('hc-flash-result-label1').innerText = 'Gerekli Diyafram (f/):';
        document.getElementById('hc-flash-result-val1').innerText = 'f/' + aperture.toLocaleString('tr-TR', { minimumFractionDigits: 1, maximumFractionDigits: 1 });
    } else {
        var aperture = parseFloat(document.getElementById('hc-flash-aperture').value);
        if (isNaN(aperture) || aperture <= 0) {
            alert('Lütfen geçerli bir diyafram giriniz.');
            return;
        }
        // distance = GN / f-stop
        var distance = gnCorrected / aperture;
        document.getElementById('hc-flash-result-label1').innerText = 'Maksimum Mesafe (m):';
        document.getElementById('hc-flash-result-val1').innerText = distance.toLocaleString('tr-TR', { minimumFractionDigits: 1, maximumFractionDigits: 1 });
    }

    document.getElementById('hc-flash-gn-val').innerText = 'GN ' + gn.toLocaleString('tr-TR');
    document.getElementById('hc-flash-result-label2').innerText = 'ISO Düzeltme Çarpanı:';
    document.getElementById('hc-flash-result-val2').innerText = (iso / 100).toLocaleString('tr-TR', { minimumFractionDigits: 1, maximumFractionDigits: 1 }) + 'x';

    document.getElementById('hc-flas-mesafe-isik-siddeti-hesaplama-result').classList.add('visible');
}

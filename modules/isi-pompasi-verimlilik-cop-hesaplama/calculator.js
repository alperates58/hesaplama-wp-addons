function hcCopHesapla() {
    var cikti = parseFloat(document.getElementById('hc-cop-cikti').value) || 0;
    var tuketim = parseFloat(document.getElementById('hc-cop-tuketim').value) || 0;
    var tSource = parseFloat(document.getElementById('hc-cop-tsource').value);
    var tSink = parseFloat(document.getElementById('hc-cop-tsink').value);

    if (cikti <= 0 || tuketim <= 0) {
        alert('Lütfen geçerli üretim ve tüketim değerleri giriniz.');
        return;
    }

    if (tSink <= tSource) {
        alert('Isı çıkış sıcaklığı kaynak sıcaklığından büyük olmalıdır.');
        return;
    }

    var copReal = cikti / tuketim;

    // Kelvin dönüşümleri
    var kSource = tSource + 273.15;
    var kSink = tSink + 273.15;
    var copCarnot = kSink / (kSink - kSource);

    var verimOrani = (copReal / copCarnot) * 100;

    // Sınıflandırma
    var sinif = 'Çok Düşük';
    if (copReal >= 4.5) {
        sinif = 'Mükemmel (A+++ Yerden Isıtma Uyumlu)';
    } else if (copReal >= 3.5) {
        sinif = 'Yüksek (A++ Verimli)';
    } else if (copReal >= 2.5) {
        sinif = 'Standart / Orta';
    } else if (copReal >= 1.5) {
        sinif = 'Düşük Verimli (Radyatör Isıtma Kaynaklı Olabilir)';
    }

    document.getElementById('hc-cop-res-real').innerText = copReal.toFixed(2);
    document.getElementById('hc-cop-res-carnot').innerText = copCarnot.toFixed(2);
    document.getElementById('hc-cop-res-class').innerText = sinif;
    document.getElementById('hc-cop-res-ratio').innerText = '%' + verimOrani.toFixed(1);

    document.getElementById('hc-cop-result').classList.add('visible');
}
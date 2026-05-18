function hcSerbestDusmeSuresiHesapla() {
    var h = parseFloat(document.getElementById('hc-sds-h').value);
    var g = parseFloat(document.getElementById('hc-sds-g').value);

    if (isNaN(h) || h < 0) {
        alert('Lütfen geçerli bir yükseklik değeri girin.');
        return;
    }
    if (isNaN(g) || g <= 0) {
        alert('Lütfen geçerli bir yerçekimi ivmesi girin.');
        return;
    }

    // t = sqrt(2h / g)
    var t = Math.sqrt((2 * h) / g);

    document.getElementById('hc-sds-res-s').innerText = t.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' saniye';

    var desc = h.toLocaleString('tr-TR') + ' metreden bırakılan bir nesne, yerçekimi ivmesi ' + g.toLocaleString('tr-TR') + ' m/s² olan bir ortamda tam olarak ' + t.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' saniyede yere düşer.';
    document.getElementById('hc-sds-desc').innerText = desc;

    document.getElementById('hc-serbest-dusme-suresi-hesaplama-result').classList.add('visible');
}

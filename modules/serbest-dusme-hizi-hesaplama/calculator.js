function hcSerbestDusmeHiziHesapla() {
    var h = parseFloat(document.getElementById('hc-sdh-h').value);
    var g = parseFloat(document.getElementById('hc-sdh-g').value);

    if (isNaN(h) || h < 0) {
        alert('Lütfen geçerli bir yükseklik değeri girin.');
        return;
    }
    if (isNaN(g) || g <= 0) {
        alert('Lütfen geçerli bir yerçekimi ivmesi girin.');
        return;
    }

    // v = sqrt(2gh)
    var v = Math.sqrt(2 * g * h);
    var vKmh = v * 3.6;

    document.getElementById('hc-sdh-res-ms').innerText = v.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' m/s';
    document.getElementById('hc-sdh-res-kmh').innerText = vKmh.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' km/sa';

    var desc = h.toLocaleString('tr-TR') + ' metreden serbest bırakılan bir nesne, yerçekimi ivmesi ' + g.toLocaleString('tr-TR') + ' m/s² olan bir ortamda yere ulaştığında ' + vKmh.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' km/sa hıza ulaşır.';
    document.getElementById('hc-sdh-desc').innerText = desc;

    document.getElementById('hc-serbest-dusme-hizi-hesaplama-result').classList.add('visible');
}

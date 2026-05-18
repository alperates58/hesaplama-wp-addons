function hcSerbestDusmeMesafesiHesapla() {
    var t = parseFloat(document.getElementById('hc-sdm-t').value);
    var g = parseFloat(document.getElementById('hc-sdm-g').value);

    if (isNaN(t) || t < 0) {
        alert('Lütfen geçerli bir süre değeri girin.');
        return;
    }
    if (isNaN(g) || g <= 0) {
        alert('Lütfen geçerli bir yerçekimi ivmesi girin.');
        return;
    }

    // d = 0.5 * g * t^2
    var d = 0.5 * g * Math.pow(t, 2);
    var dKm = d / 1000;

    document.getElementById('hc-sdm-res-m').innerText = d.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' m';
    document.getElementById('hc-sdm-res-km').innerText = dKm.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' km';

    var desc = 'Yerçekimi ivmesi ' + g.toLocaleString('tr-TR') + ' m/s² olan bir ortamda serbest düşüşe bırakılan cisim, ' + t.toLocaleString('tr-TR') + ' saniye içerisinde tam ' + d.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' metre aşağı düşer.';
    document.getElementById('hc-sdm-desc').innerText = desc;

    document.getElementById('hc-serbest-dusme-mesafesi-hesaplama-result').classList.add('visible');
}

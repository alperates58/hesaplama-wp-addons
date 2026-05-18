function hcUfukMesafesiHesapla() {
    var h = parseFloat(document.getElementById('hc-ufk-h').value); // meters
    var refraction = document.getElementById('hc-ufk-refraction').value;

    if (isNaN(h) || h < 0) {
        alert('Lütfen geçerli bir göz yüksekliği değeri girin.');
        return;
    }

    var R = 6371000; // Earth mean radius in meters
    var d = 0;

    if (refraction === 'yes') {
        // Standard atmospheric refraction increases effective Earth radius by factor of ~7/6
        var Reff = R * (7/6);
        d = Math.sqrt(2 * Reff * h + Math.pow(h, 2));
    } else {
        // Pure geometric horizon
        d = Math.sqrt(2 * R * h + Math.pow(h, 2));
    }

    var dKm = d / 1000;

    document.getElementById('hc-ufk-res-m').innerText = d.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' m';
    document.getElementById('hc-ufk-res-km').innerText = dKm.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' km';

    var desc = 'Dünya\'nın eğriliği sebebiyle, gözünüz yer seviyesinden ' + h.toLocaleString('tr-TR') + ' metre yükseklikteyken ufuk çizgisi sizden yaklaşık ' + d.toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + ' metre (' + dKm.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' km) uzaktadır. Bu mesafenin ötesindeki yer seviyesinde bulunan nesneler Dünya eğrisinin arkasında kalacağı için görünmezler.';
    if (refraction === 'yes') {
        desc += ' Atmosferik kırılma, ışığın bükülmesini sağlayarak ufuk çizgisini normal geometrik sınırdan yaklaşık %8 daha öteye taşıyarak görüş mesafenizi genişletmiştir.';
    }
    document.getElementById('hc-ufk-desc').innerText = desc;

    document.getElementById('hc-ufuk-mesafesi-hesaplama-result').classList.add('visible');
}

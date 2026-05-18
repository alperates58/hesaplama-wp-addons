function hcSimsekMesafesiHesapla() {
    var t = parseFloat(document.getElementById('hc-sm-time').value);
    var temp = parseFloat(document.getElementById('hc-sm-temp').value);

    if (isNaN(t) || t < 0) {
        alert('Lütfen ışık ile ses arasındaki süreyi saniye cinsinden girin.');
        return;
    }
    if (isNaN(temp)) {
        alert('Lütfen geçerli bir hava sıcaklığı değeri girin.');
        return;
    }

    // Sound speed in air: v = 331.3 * sqrt(1 + temp / 273.15)
    var v = 331.3 * Math.sqrt(1 + temp / 273.15);

    // Distance: d = v * t
    var d = v * t;
    var dKm = d / 1000;

    document.getElementById('hc-sm-res-m').innerText = d.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' m';
    document.getElementById('hc-sm-res-km').innerText = dKm.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' km';
    document.getElementById('hc-sm-res-v').innerText = v.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' m/s';

    var rating = '';
    if (t === 0) {
        rating = 'Şimşek tam bulunduğunuz yere düştü! Son derece tehlikeli!';
    } else if (t < 3) {
        rating = 'Yıldırım son derece yakınınıza düştü! Derhal güvenli kapalı bir alana geçin.';
    } else if (t < 10) {
        rating = 'Yıldırım yakın bir bölgeye düştü (yaklaşık 1-3 km). Güvenlik tedbirlerini elden bırakmayın.';
    } else {
        rating = 'Yıldırım güvenli sayılabilecek uzak bir mesafeye düştü.';
    }

    var desc = 'Işık saniyede yaklaşık 300.000 km hızla hareket ettiği için şimşeğin parıltısını anında görürsünüz. Ancak ses hızı havanın sıcaklığına bağlı olarak yaklaşık ' + v.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' m/s\'dir. Sesin size ulaşması ' + t.toLocaleString('tr-TR') + ' saniye sürdüğü için yıldırımın düştüğü yer sizden yaklaşık ' + d.toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + ' metre (' + dKm.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' km) uzaklıktadır. ' + rating;
    document.getElementById('hc-sm-desc').innerText = desc;

    document.getElementById('hc-simsek-mesafesi-hesaplama-result').classList.add('visible');
}

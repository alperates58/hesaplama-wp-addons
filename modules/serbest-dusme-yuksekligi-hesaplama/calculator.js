function hcSerbestDusmeYuksekligiHesapla() {
    var vType = document.getElementById('hc-sdy-v-type').value;
    var rawV = parseFloat(document.getElementById('hc-sdy-v').value);
    var g = parseFloat(document.getElementById('hc-sdy-g').value);

    if (isNaN(rawV) || rawV < 0) {
        alert('Lütfen geçerli bir çarpma hızı girin.');
        return;
    }
    if (isNaN(g) || g <= 0) {
        alert('Lütfen geçerli bir yerçekimi ivmesi girin.');
        return;
    }

    var v = rawV;
    if (vType === 'kmh') {
        v = rawV / 3.6;
    }

    // h = v^2 / 2g
    var h = Math.pow(v, 2) / (2 * g);
    var hKm = h / 1000;

    document.getElementById('hc-sdy-res-m').innerText = h.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' m';
    document.getElementById('hc-sdy-res-km').innerText = hKm.toLocaleString('tr-TR', { maximumFractionDigits: 5 }) + ' km';

    var desc = 'Yerçekimi ivmesi ' + g.toLocaleString('tr-TR') + ' m/s² olan bir ortamda yere ' + rawV.toLocaleString('tr-TR') + ' ' + (vType === 'ms' ? 'm/s' : 'km/sa') + ' hızla çarpan bir cisim, tam olarak ' + h.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' metre yükseklikten serbest bırakılmıştır.';
    document.getElementById('hc-sdy-desc').innerText = desc;

    document.getElementById('hc-serbest-dusme-yuksekligi-hesaplama-result').classList.add('visible');
}

function hcSesFormatDegisti() {
    var format = document.getElementById('hc-dsd-format').value;
    document.getElementById('hc-dsd-wav-fields').style.display = format === 'wav' ? 'block' : 'none';
    document.getElementById('hc-dsd-mp3-fields').style.display = format === 'mp3' ? 'block' : 'none';
}

function hcSesBoyutuHesapla() {
    var saat = parseFloat(document.getElementById('hc-dsd-saat').value) || 0;
    var dakika = parseFloat(document.getElementById('hc-dsd-dakika').value) || 0;
    var saniye = parseFloat(document.getElementById('hc-dsd-saniye').value) || 0;
    var format = document.getElementById('hc-dsd-format').value;

    var toplamSaniye = (saat * 3600) + (dakika * 60) + saniye;
    if (toplamSaniye <= 0) {
        alert('Lütfen geçerli bir ses süresi giriniz.');
        return;
    }

    var bitrateKbps = 0;
    var dosyaBoyutuMb = 0;

    if (format === 'wav') {
        var sampleRate = parseFloat(document.getElementById('hc-dsd-sample').value) || 44100;
        var bitDepth = parseFloat(document.getElementById('hc-dsd-bit').value) || 16;
        var kanallar = parseFloat(document.getElementById('hc-dsd-kanallar').value) || 2;

        // Bitrate (bps) = Sample Rate * Bit Depth * Kanallar
        var bps = sampleRate * bitDepth * kanallar;
        bitrateKbps = bps / 1000;
        
        // Boyut (Byte) = bps * Saniye / 8
        var bytes = (bps * toplamSaniye) / 8;
        dosyaBoyutuMb = bytes / (1024 * 1024);
    } else {
        var bitrate = parseFloat(document.getElementById('hc-dsd-bitrate').value) || 320;
        bitrateKbps = bitrate;
        
        // Boyut = Bitrate (kbps) * 1000 * Saniye / 8 (Byte)
        var bytes = (bitrate * 1000 * toplamSaniye) / 8;
        dosyaBoyutuMb = bytes / (1024 * 1024);
    }

    document.getElementById('hc-dsd-res-sure').innerText = toplamSaniye + ' Saniye (' + saat + 's ' + dakika + 'd ' + saniye + 's)';
    document.getElementById('hc-dsd-res-bitrate').innerText = bitrateKbps.toLocaleString('tr-TR', {maximumFractionDigits: 1}) + ' kbps';
    document.getElementById('hc-dsd-res-boyut').innerText = dosyaBoyutuMb.toFixed(2) + ' MB';

    document.getElementById('hc-dsd-result').classList.add('visible');
}
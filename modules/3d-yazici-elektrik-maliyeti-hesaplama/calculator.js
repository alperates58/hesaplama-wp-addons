function hc3dElektrikHesapla() {
    var guc = parseFloat(document.getElementById('hc-3de-guc').value) || 0;
    var saat = parseFloat(document.getElementById('hc-3de-saat').value) || 0;
    var dakika = parseFloat(document.getElementById('hc-3de-dakika').value) || 0;
    var tarife = parseFloat(document.getElementById('hc-3de-tarife').value) || 0;

    if (guc <= 0 || (saat <= 0 && dakika <= 0)) {
        alert('Lütfen yazıcı gücünü ve baskı süresini giriniz.');
        return;
    }

    var toplamSaat = saat + (dakika / 60);
    var toplamKwh = (guc * toplamSaat) / 1000;
    var toplamMaliyet = toplamKwh * tarife;

    document.getElementById('hc-3de-res-sure').innerText = saat + ' Saat ' + dakika + ' Dakika';
    document.getElementById('hc-3de-res-tuketim').innerText = toplamKwh.toFixed(3) + ' kWh';
    document.getElementById('hc-3de-res-maliyet').innerText = toplamMaliyet.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2});

    document.getElementById('hc-3de-result').classList.add('visible');
}
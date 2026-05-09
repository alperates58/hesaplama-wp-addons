function hcDikdortgenAlanCevreHesapla() {
    var en = parseFloat(document.getElementById('hc-dac-en').value);
    var boy = parseFloat(document.getElementById('hc-dac-boy').value);
    var sonuc = document.getElementById('hc-dikdortgen-alan-cevre-hesaplama-result');
    if (isNaN(en) || isNaN(boy) || en <= 0 || boy <= 0) { alert('En ve boy pozitif değer olmalıdır.'); return; }
    sonuc.innerHTML =
        '<p class="hc-result-value">Alan = ' + (en*boy).toLocaleString('tr-TR',{maximumFractionDigits:6}) + ' m²</p>' +
        '<p class="hc-result-value">Çevre = ' + (2*(en+boy)).toLocaleString('tr-TR',{maximumFractionDigits:6}) + ' m</p>' +
        '<p><strong>Köşegen:</strong> ' + Math.sqrt(en*en+boy*boy).toLocaleString('tr-TR',{maximumFractionDigits:6}) + ' m</p>';
    sonuc.classList.add('visible');
}

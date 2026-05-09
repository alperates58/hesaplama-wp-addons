function hcDikdortgenAlanHesapla() {
    var en = parseFloat(document.getElementById('hc-dah-en').value);
    var boy = parseFloat(document.getElementById('hc-dah-boy').value);
    var sonuc = document.getElementById('hc-dikdortgen-alan-hesaplama-result');
    if (isNaN(en) || isNaN(boy) || en <= 0 || boy <= 0) { alert('En ve boy pozitif değer olmalıdır.'); return; }
    sonuc.innerHTML =
        '<p><strong>En:</strong> ' + en.toLocaleString('tr-TR') + ' m &nbsp;|&nbsp; <strong>Boy:</strong> ' + boy.toLocaleString('tr-TR') + ' m</p>' +
        '<p><strong>Formül:</strong> A = en × boy</p>' +
        '<p class="hc-result-value">Alan = ' + (en*boy).toLocaleString('tr-TR',{maximumFractionDigits:6}) + ' m²</p>';
    sonuc.classList.add('visible');
}

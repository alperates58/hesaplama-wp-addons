function hcDikdortgenCevreHesapla() {
    var en = parseFloat(document.getElementById('hc-dch-en').value);
    var boy = parseFloat(document.getElementById('hc-dch-boy').value);
    var sonuc = document.getElementById('hc-dikdortgen-cevre-hesaplama-result');
    if (isNaN(en) || isNaN(boy) || en <= 0 || boy <= 0) { alert('En ve boy pozitif değer olmalıdır.'); return; }
    sonuc.innerHTML =
        '<p><strong>Formül:</strong> C = 2 × (en + boy)</p>' +
        '<p class="hc-result-value">Çevre = ' + (2*(en+boy)).toLocaleString('tr-TR',{maximumFractionDigits:6}) + ' m</p>' +
        '<p><strong>Alan:</strong> ' + (en*boy).toLocaleString('tr-TR',{maximumFractionDigits:6}) + ' m²</p>';
    sonuc.classList.add('visible');
}

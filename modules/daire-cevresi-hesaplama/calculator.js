function hcDaireCevresiGirisDegistir() {
    var tur = document.getElementById('hc-dce-giris').value;
    document.getElementById('hc-dce-deger-label').textContent = (tur === 'yaricap') ? 'Yarıçap (m)' : 'Çap (m)';
}

function hcDaireCevresiHesapla() {
    var deger = parseFloat(document.getElementById('hc-dce-deger').value);
    var tur = document.getElementById('hc-dce-giris').value;
    var sonuc = document.getElementById('hc-daire-cevresi-hesaplama-result');
    if (isNaN(deger) || deger <= 0) { alert('Lütfen pozitif bir değer girin.'); return; }
    var r = (tur === 'yaricap') ? deger : deger / 2;
    var cevre = 2 * Math.PI * r;
    sonuc.innerHTML =
        '<p><strong>Yarıçap (r):</strong> ' + r.toLocaleString('tr-TR', {maximumFractionDigits: 6}) + ' m</p>' +
        '<p><strong>Formül:</strong> C = 2 × π × r</p>' +
        '<p class="hc-result-value">Çevre = ' + cevre.toLocaleString('tr-TR', {maximumFractionDigits: 6}) + ' m</p>';
    sonuc.classList.add('visible');
}

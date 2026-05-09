function hcDaireAlaniGirisDegistir() {
    var tur = document.getElementById('hc-dal-giris-turu').value;
    document.getElementById('hc-dal-deger-label').textContent = (tur === 'yaricap') ? 'Yarıçap (m)' : 'Çap (m)';
    document.getElementById('hc-dal-deger').placeholder = 'm';
}

function hcDaireAlaniHesapla() {
    var deger = parseFloat(document.getElementById('hc-dal-deger').value);
    var tur = document.getElementById('hc-dal-giris-turu').value;
    var sonuc = document.getElementById('hc-daire-alani-hesaplama-result');
    if (isNaN(deger) || deger <= 0) { alert('Lütfen pozitif bir değer girin.'); return; }
    var r = (tur === 'yaricap') ? deger : deger / 2;
    var alan = Math.PI * r * r;
    sonuc.innerHTML =
        '<p><strong>Yarıçap (r):</strong> ' + r.toLocaleString('tr-TR', {maximumFractionDigits: 6}) + ' m</p>' +
        '<p><strong>Formül:</strong> A = π × r²</p>' +
        '<p class="hc-result-value">Alan = ' + alan.toLocaleString('tr-TR', {maximumFractionDigits: 6}) + ' m²</p>';
    sonuc.classList.add('visible');
}

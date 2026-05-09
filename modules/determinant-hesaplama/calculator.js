function hcDeterminantBoyutGuncelle() {
    var boyut = document.getElementById('hc-det-boyut').value;
    document.getElementById('hc-det-matris2').style.display = (boyut === '2') ? 'block' : 'none';
    document.getElementById('hc-det-matris3').style.display = (boyut === '3') ? 'block' : 'none';
}
function hcDeterminantHesapla() {
    var boyut = document.getElementById('hc-det-boyut').value;
    var sonuc = document.getElementById('hc-determinant-hesaplama-result');
    var det;
    if (boyut === '2') {
        var a = parseFloat(document.getElementById('hc-det-a11').value);
        var b = parseFloat(document.getElementById('hc-det-a12').value);
        var c = parseFloat(document.getElementById('hc-det-a21').value);
        var d = parseFloat(document.getElementById('hc-det-a22').value);
        if ([a,b,c,d].some(isNaN)) { alert('Tüm matris elemanlarını girin.'); return; }
        det = a * d - b * c;
        sonuc.innerHTML =
            '<p><strong>2×2 Matris Determinantı</strong></p>' +
            '<p>|' + a + '  ' + b + '|</p><p>|' + c + '  ' + d + '|</p>' +
            '<p><strong>det = a×d − b×c = ' + a + '×' + d + ' − ' + b + '×' + c + '</strong></p>' +
            '<p class="hc-result-value">det(A) = ' + det.toLocaleString('tr-TR', {maximumFractionDigits:4}) + '</p>';
    } else {
        var ids = ['b11','b12','b13','b21','b22','b23','b31','b32','b33'];
        var v = ids.map(function(id) { return parseFloat(document.getElementById('hc-det-' + id).value); });
        if (v.some(isNaN)) { alert('Tüm 9 matris elemanını girin.'); return; }
        det = v[0]*(v[4]*v[8]-v[5]*v[7]) - v[1]*(v[3]*v[8]-v[5]*v[6]) + v[2]*(v[3]*v[7]-v[4]*v[6]);
        sonuc.innerHTML =
            '<p><strong>3×3 Sarrus Kuralı ile Determinant</strong></p>' +
            '<p class="hc-result-value">det(A) = ' + det.toLocaleString('tr-TR', {maximumFractionDigits:4}) + '</p>' +
            '<p><strong>Tersinir mi?</strong> ' + (det !== 0 ? 'Evet (det ≠ 0)' : 'Hayır (det = 0, tekil matris)') + '</p>';
    }
    sonuc.classList.add('visible');
}

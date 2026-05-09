function hcDaireHesapla() {
    var r = parseFloat(document.getElementById('hc-dh-r').value);
    var d = parseFloat(document.getElementById('hc-dh-d').value);
    var c = parseFloat(document.getElementById('hc-dh-c').value);
    var a = parseFloat(document.getElementById('hc-dh-a').value);
    var sonuc = document.getElementById('hc-daire-hesaplama-result');
    var yaricap;
    if (!isNaN(r) && r > 0) yaricap = r;
    else if (!isNaN(d) && d > 0) yaricap = d / 2;
    else if (!isNaN(c) && c > 0) yaricap = c / (2 * Math.PI);
    else if (!isNaN(a) && a > 0) yaricap = Math.sqrt(a / Math.PI);
    else { alert('Lütfen yarıçap, çap, çevre veya alandan birini girin.'); return; }
    var cap = 2 * yaricap;
    var cevre = 2 * Math.PI * yaricap;
    var alan = Math.PI * yaricap * yaricap;
    sonuc.innerHTML =
        '<p class="hc-result-value">r = ' + yaricap.toLocaleString('tr-TR', {maximumFractionDigits:6}) + ' m</p>' +
        '<p><strong>Çap (d):</strong> ' + cap.toLocaleString('tr-TR', {maximumFractionDigits:6}) + ' m</p>' +
        '<p><strong>Çevre (C):</strong> ' + cevre.toLocaleString('tr-TR', {maximumFractionDigits:6}) + ' m</p>' +
        '<p><strong>Alan (A):</strong> ' + alan.toLocaleString('tr-TR', {maximumFractionDigits:6}) + ' m²</p>';
    sonuc.classList.add('visible');
}

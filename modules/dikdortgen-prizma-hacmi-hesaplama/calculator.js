function hcDikdortgenPrizmaHacmiHesapla() {
    var en = parseFloat(document.getElementById('hc-dph-en').value);
    var boy = parseFloat(document.getElementById('hc-dph-boy').value);
    var y = parseFloat(document.getElementById('hc-dph-yukseklik').value);
    var sonuc = document.getElementById('hc-dikdortgen-prizma-hacmi-hesaplama-result');
    if (isNaN(en)||isNaN(boy)||isNaN(y)||en<=0||boy<=0||y<=0) { alert('En, boy ve yüksekliği pozitif sayı olarak girin.'); return; }
    var hacim = en * boy * y;
    var yuzeyAlani = 2*(en*boy + boy*y + en*y);
    sonuc.innerHTML =
        '<p class="hc-result-value">Hacim = ' + hacim.toLocaleString('tr-TR',{maximumFractionDigits:6}) + ' m³</p>' +
        '<p><strong>Yüzey Alanı:</strong> ' + yuzeyAlani.toLocaleString('tr-TR',{maximumFractionDigits:6}) + ' m²</p>' +
        '<p><strong>Formül:</strong> V = en × boy × yükseklik</p>';
    sonuc.classList.add('visible');
}

function hcDikUcgenAlanHesapla() {
    var a = parseFloat(document.getElementById('hc-dua-a').value);
    var b = parseFloat(document.getElementById('hc-dua-b').value);
    var sonuc = document.getElementById('hc-dik-ucgen-alan-hesaplama-result');
    if (isNaN(a) || isNaN(b) || a <= 0 || b <= 0) { alert('İki dik kenarı pozitif sayı olarak girin.'); return; }
    var alan = 0.5 * a * b;
    var hip = Math.sqrt(a * a + b * b);
    sonuc.innerHTML =
        '<p class="hc-result-value">Alan = ' + alan.toLocaleString('tr-TR', {maximumFractionDigits:6}) + ' m²</p>' +
        '<p><strong>Hipotenüs:</strong> ' + hip.toLocaleString('tr-TR', {maximumFractionDigits:6}) + ' m</p>' +
        '<p><strong>Çevre:</strong> ' + (a + b + hip).toLocaleString('tr-TR', {maximumFractionDigits:6}) + ' m</p>';
    sonuc.classList.add('visible');
}

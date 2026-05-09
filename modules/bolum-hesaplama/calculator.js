function hcBolumHesapla() {
    var bolunen = parseInt(document.getElementById('hc-bol-bolunen').value);
    var bolen = parseInt(document.getElementById('hc-bol-bolen').value);
    var sonuc = document.getElementById('hc-bolum-hesaplama-result');
    if (isNaN(bolunen) || isNaN(bolen)) { alert('Lütfen her iki değeri de girin.'); return; }
    if (bolen === 0) { alert('Bölen sıfır olamaz!'); return; }
    var bolum = Math.trunc(bolunen / bolen);
    var kalan = bolunen - bolum * bolen;
    sonuc.innerHTML =
        '<p><strong>İşlem:</strong> ' + bolunen.toLocaleString('tr-TR') + ' ÷ ' + bolen.toLocaleString('tr-TR') + '</p>' +
        '<p class="hc-result-value">Bölüm: ' + bolum.toLocaleString('tr-TR') + '</p>' +
        '<p><strong>Kalan:</strong> ' + kalan.toLocaleString('tr-TR') + '</p>' +
        '<p><strong>Denklem:</strong> ' + bolunen.toLocaleString('tr-TR') + ' = ' + bolen.toLocaleString('tr-TR') + ' × ' + bolum.toLocaleString('tr-TR') + ' + ' + kalan.toLocaleString('tr-TR') + '</p>';
    sonuc.classList.add('visible');
}

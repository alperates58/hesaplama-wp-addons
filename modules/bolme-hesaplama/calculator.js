function hcBolmeHesapla() {
    var bolunen = parseFloat(document.getElementById('hc-blm-bolunen').value);
    var bolen = parseFloat(document.getElementById('hc-blm-bolen').value);
    var sonuc = document.getElementById('hc-bolme-hesaplama-result');
    if (isNaN(bolunen) || isNaN(bolen)) { alert('Lütfen bölünen ve bölen değerlerini girin.'); return; }
    if (bolen === 0) { alert('Bölen sıfır olamaz!'); return; }
    var tamBolum = Math.trunc(bolunen / bolen);
    var kalan = bolunen % bolen;
    var ondalikli = bolunen / bolen;
    sonuc.innerHTML =
        '<p><strong>İşlem:</strong> ' + bolunen.toLocaleString('tr-TR') + ' ÷ ' + bolen.toLocaleString('tr-TR') + '</p>' +
        '<p class="hc-result-value">' + ondalikli.toLocaleString('tr-TR', {maximumFractionDigits: 10}) + '</p>' +
        '<p><strong>Tam Bölüm:</strong> ' + tamBolum.toLocaleString('tr-TR') + '</p>' +
        '<p><strong>Kalan:</strong> ' + kalan.toLocaleString('tr-TR', {maximumFractionDigits: 10}) + '</p>';
    sonuc.classList.add('visible');
}

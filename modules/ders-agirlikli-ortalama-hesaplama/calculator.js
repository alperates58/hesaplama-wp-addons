function hcDaoDerEkle() {
    var kap = document.getElementById('hc-dao-satirlar');
    var satir = document.createElement('div');
    satir.className = 'hc-dao-satir hc-form-group';
    satir.innerHTML = '<input type="number" class="hc-dao-not" placeholder="Not (0-100)" min="0" max="100" step="0.1" /><input type="number" class="hc-dao-kredi" placeholder="Kredi/Ağırlık" min="0" step="0.5" />';
    kap.appendChild(satir);
}
function hcDersAgirlikliOrtalamaHesapla() {
    var notlar = document.querySelectorAll('.hc-dao-not');
    var krediler = document.querySelectorAll('.hc-dao-kredi');
    var sonuc = document.getElementById('hc-ders-agirlikli-ortalama-hesaplama-result');
    var toplamKrediNot = 0, toplamKredi = 0, gecerliDers = 0;
    for (var i = 0; i < notlar.length; i++) {
        var not = parseFloat(notlar[i].value);
        var kredi = parseFloat(krediler[i].value);
        if (!isNaN(not) && !isNaN(kredi) && kredi > 0) {
            toplamKrediNot += not * kredi;
            toplamKredi += kredi;
            gecerliDers++;
        }
    }
    if (gecerliDers === 0 || toplamKredi === 0) { alert('Lütfen en az bir ders için not ve kredi girin.'); return; }
    var ort = toplamKrediNot / toplamKredi;
    sonuc.innerHTML =
        '<p><strong>Toplam Kredi:</strong> ' + toplamKredi.toLocaleString('tr-TR') + '</p>' +
        '<p><strong>Hesaplanan Ders Sayısı:</strong> ' + gecerliDers + '</p>' +
        '<p class="hc-result-value">Ağırlıklı Ortalama: ' + ort.toLocaleString('tr-TR', {maximumFractionDigits:2}) + '</p>';
    sonuc.classList.add('visible');
}

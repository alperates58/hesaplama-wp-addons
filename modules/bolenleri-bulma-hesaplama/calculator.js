function hcBolenleriHesapla() {
    var sayi = parseInt(document.getElementById('hc-bbb-sayi').value);
    var sonuc = document.getElementById('hc-bolenleri-bulma-hesaplama-result');

    if (isNaN(sayi) || sayi < 1) { alert('Lütfen 1 veya daha büyük bir tam sayı girin.'); return; }
    if (sayi > 1000000) { alert('Hesaplama süresi için en fazla 1.000.000 girin.'); return; }

    var bolenler = [];
    for (var i = 1; i <= Math.sqrt(sayi); i++) {
        if (sayi % i === 0) {
            bolenler.push(i);
            if (i !== sayi / i) bolenler.push(sayi / i);
        }
    }
    bolenler.sort(function(a, b) { return a - b; });

    var asal = bolenler.filter(function(b) {
        if (b < 2) return false;
        for (var i = 2; i <= Math.sqrt(b); i++) if (b % i === 0) return false;
        return true;
    });

    sonuc.innerHTML =
        '<p><strong>' + sayi.toLocaleString('tr-TR') + ' sayısının bölenleri (' + bolenler.length + ' adet):</strong></p>' +
        '<p class="hc-result-value">' + bolenler.join(', ') + '</p>' +
        '<p><strong>Asal bölenler:</strong> ' + (asal.length ? asal.join(', ') : 'Yok') + '</p>' +
        '<p><strong>Bölen sayısı:</strong> ' + bolenler.length + '</p>' +
        '<p><strong>Asal mı?</strong> ' + (sayi > 1 && bolenler.length === 2 ? 'Evet, asal sayıdır.' : 'Hayır.') + '</p>';
    sonuc.classList.add('visible');
}

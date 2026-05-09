function hcCarpanlariHesapla() {
    var sayi = parseInt(document.getElementById('hc-cbh-sayi').value);
    var sonuc = document.getElementById('hc-carpanlari-bulma-hesaplama-result');
    if (isNaN(sayi) || sayi < 2) { alert('Lütfen 2 veya daha büyük bir tam sayı girin.'); return; }
    if (sayi > 10000000) { alert('En fazla 10.000.000 girin.'); return; }
    var n = sayi, carpanlar = [], sayaclar = [];
    for (var p = 2; p * p <= n; p++) {
        if (n % p === 0) {
            carpanlar.push(p); var c = 0;
            while (n % p === 0) { n /= p; c++; }
            sayaclar.push(c);
        }
    }
    if (n > 1) { carpanlar.push(n); sayaclar.push(1); }
    var gosterim = carpanlar.map(function(p, i) {
        return sayaclar[i] > 1 ? p + '<sup>' + sayaclar[i] + '</sup>' : '' + p;
    }).join(' × ');
    sonuc.innerHTML =
        '<p><strong>' + sayi.toLocaleString('tr-TR') + ' = </strong></p>' +
        '<p class="hc-result-value">' + gosterim + '</p>' +
        '<p><strong>Asal çarpanlar:</strong> ' + carpanlar.join(', ') + '</p>';
    sonuc.classList.add('visible');
}

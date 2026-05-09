function hcFaktoryel(n) {
    if (n < 0) return null;
    if (n === 0 || n === 1) return 1;
    var sonuc = 1;
    for (var i = 2; i <= n; i++) sonuc *= i;
    return sonuc;
}

function hcBinomKatsayisiHesapla() {
    var n = parseInt(document.getElementById('hc-bkh-n').value);
    var k = parseInt(document.getElementById('hc-bkh-k').value);
    var sonuc = document.getElementById('hc-binom-katsayisi-hesaplama-result');

    if (isNaN(n) || isNaN(k)) { alert('Lütfen n ve k değerlerini girin.'); return; }
    if (n < 0 || k < 0) { alert('n ve k değerleri negatif olamaz.'); return; }
    if (k > n) { alert('k değeri n değerinden büyük olamaz (k ≤ n).'); return; }

    var ck;
    if (n > 20) {
        var log = 0;
        for (var i = 0; i < k; i++) log += Math.log(n - i) - Math.log(i + 1);
        ck = Math.round(Math.exp(log));
    } else {
        ck = hcFaktoryel(n) / (hcFaktoryel(k) * hcFaktoryel(n - k));
    }

    sonuc.innerHTML =
        '<p><strong>C(' + n + ', ' + k + ') =</strong></p>' +
        '<p class="hc-result-value">' + ck.toLocaleString('tr-TR') + '</p>' +
        '<p><strong>Formül:</strong> ' + n + '! / (' + k + '! × ' + (n - k) + '!)</p>' +
        '<p><strong>Yorum:</strong> ' + n + ' elemanlı kümeden ' + k + ' eleman seçmenin <strong>' + ck.toLocaleString('tr-TR') + '</strong> farklı yolu vardır.</p>';
    sonuc.classList.add('visible');
}

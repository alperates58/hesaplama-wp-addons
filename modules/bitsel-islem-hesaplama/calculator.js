function hcBitselIslemHesapla() {
    var a = parseInt(document.getElementById('hc-bis-a').value);
    var b = parseInt(document.getElementById('hc-bis-b').value);
    var islem = document.getElementById('hc-bis-islem').value;
    var sonuc = document.getElementById('hc-bitsel-islem-hesaplama-result');

    if (isNaN(a)) { alert('Lütfen Sayı A değerini girin.'); return; }
    if (islem !== 'not' && isNaN(b)) { alert('Lütfen Sayı B değerini girin.'); return; }

    var sonucSayi, islemGoster;
    switch (islem) {
        case 'and':  sonucSayi = a & b;  islemGoster = a + ' AND ' + b; break;
        case 'or':   sonucSayi = a | b;  islemGoster = a + ' OR ' + b; break;
        case 'xor':  sonucSayi = a ^ b;  islemGoster = a + ' XOR ' + b; break;
        case 'not':  sonucSayi = ~a;     islemGoster = 'NOT ' + a; break;
        case 'nand': sonucSayi = ~(a & b); islemGoster = a + ' NAND ' + b; break;
        case 'nor':  sonucSayi = ~(a | b); islemGoster = a + ' NOR ' + b; break;
    }

    var aIkili  = (a >>> 0).toString(2).padStart(16, '0');
    var bIkili  = islem !== 'not' ? (b >>> 0).toString(2).padStart(16, '0') : null;
    var rkIkili = (sonucSayi >>> 0).toString(2).padStart(16, '0');

    var html =
        '<p><strong>İşlem:</strong> ' + islemGoster + '</p>' +
        '<p><strong>A (ikili):</strong> <code>' + aIkili + '</code></p>';
    if (bIkili) html += '<p><strong>B (ikili):</strong> <code>' + bIkili + '</code></p>';
    html +=
        '<p class="hc-result-value">Sonuç: ' + sonucSayi.toLocaleString('tr-TR') + '</p>' +
        '<p><strong>Sonuç (ikili):</strong> <code>' + rkIkili + '</code></p>' +
        '<p><strong>Sonuç (onaltılık):</strong> 0x' + (sonucSayi >>> 0).toString(16).toUpperCase() + '</p>';
    sonuc.innerHTML = html;
    sonuc.classList.add('visible');
}

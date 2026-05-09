function hcBirlerTumleyeniHesapla() {
    var giris = document.getElementById('hc-btu-giris').value.trim();
    var mod = document.getElementById('hc-btu-mod').value;
    var bit = parseInt(document.getElementById('hc-btu-bit').value);
    var sonuc = document.getElementById('hc-birler-tumleyeni-hesaplama-result');

    if (!giris) { alert('Lütfen bir sayı girin.'); return; }

    var onluk;
    if (mod === 'binary') {
        if (!/^[01]+$/.test(giris)) { alert('Geçersiz ikili sayı. Yalnızca 0 ve 1 kullanın.'); return; }
        onluk = parseInt(giris, 2);
    } else {
        onluk = parseInt(giris);
        if (isNaN(onluk) || onluk < 0) { alert('Lütfen negatif olmayan bir tam sayı girin.'); return; }
    }

    var maxDeger = Math.pow(2, bit) - 1;
    if (onluk > maxDeger) { alert(bit + ' bit için maksimum değer ' + maxDeger + " 'dir."); return; }

    var ikili = onluk.toString(2).padStart(bit, '0');
    var tumleyen = maxDeger ^ onluk;
    var tumleyenIkili = tumleyen.toString(2).padStart(bit, '0');

    sonuc.innerHTML =
        '<table class="hc-btu-tablo">' +
        '<tr><th>Gösterim</th><th>Özgün</th><th>Birler Tümleyeni</th></tr>' +
        '<tr><td>İkili (' + bit + ' bit)</td><td><code>' + ikili + '</code></td><td><code>' + tumleyenIkili + '</code></td></tr>' +
        '<tr><td>Onluk</td><td>' + onluk.toLocaleString('tr-TR') + '</td><td>' + tumleyen.toLocaleString('tr-TR') + '</td></tr>' +
        '<tr><td>Onaltılık</td><td>0x' + onluk.toString(16).toUpperCase() + '</td><td>0x' + tumleyen.toString(16).toUpperCase() + '</td></tr>' +
        '</table>' +
        '<p><strong>İşlem:</strong> Tüm bitler ters çevrildi (0→1, 1→0)</p>';
    sonuc.classList.add('visible');
}

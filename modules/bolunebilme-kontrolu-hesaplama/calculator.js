function hcBolunebilmeKontrolHesapla() {
    var sayi = parseInt(document.getElementById('hc-bkr-sayi').value);
    var sonuc = document.getElementById('hc-bolunebilme-kontrolu-hesaplama-result');
    if (isNaN(sayi) || sayi <= 0) { alert('Lütfen pozitif bir tam sayı girin.'); return; }

    var kurallar = [
        { bolen: 2, kural: 'Son basamak çift sayıdır (0, 2, 4, 6, 8).', kontrol: sayi % 2 === 0 },
        { bolen: 3, kural: 'Basamaklar toplamı 3\'e bölünür.', kontrol: sayi % 3 === 0 },
        { bolen: 4, kural: 'Son iki basamak 4\'e bölünür.', kontrol: sayi % 4 === 0 },
        { bolen: 5, kural: 'Son basamak 0 veya 5\'tir.', kontrol: sayi % 5 === 0 },
        { bolen: 6, kural: '2 ve 3\'e bölünür.', kontrol: sayi % 6 === 0 },
        { bolen: 7, kural: 'Son basamak 2 katı, kalan basamaklardan çıkarılır; sonuç 7\'ye bölünür.', kontrol: sayi % 7 === 0 },
        { bolen: 8, kural: 'Son üç basamak 8\'e bölünür.', kontrol: sayi % 8 === 0 },
        { bolen: 9, kural: 'Basamaklar toplamı 9\'a bölünür.', kontrol: sayi % 9 === 0 },
        { bolen: 10, kural: 'Son basamak 0\'dır.', kontrol: sayi % 10 === 0 },
        { bolen: 11, kural: 'Çift ve tek konumdaki basamakların farkı 11\'e bölünür.', kontrol: sayi % 11 === 0 }
    ];

    var html = '<p><strong>' + sayi.toLocaleString('tr-TR') + '</strong> için bölünebilme kontrolü:</p><table class="hc-bkr-tablo"><tr><th>Bölen</th><th>Durum</th><th>Kural</th></tr>';
    kurallar.forEach(function(k) {
        html += '<tr class="' + (k.kontrol ? 'hc-bkr-evet' : 'hc-bkr-hayir') + '">' +
            '<td><strong>' + k.bolen + '</strong></td>' +
            '<td>' + (k.kontrol ? '✅ Bölünür' : '❌ Bölünmez') + '</td>' +
            '<td>' + k.kural + '</td></tr>';
    });
    html += '</table>';
    sonuc.innerHTML = html;
    sonuc.classList.add('visible');
}

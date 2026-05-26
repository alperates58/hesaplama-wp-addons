function hcIcraTakipMasrafiHesapla() {
    var tutar = parseFloat(document.getElementById('hc-itm-tutar').value) || 0;
    var avukat = document.getElementById('hc-itm-avukat').value;

    if (tutar <= 0) {
        alert('Lütfen takip tutarını giriniz.');
        return;
    }

    // 2026 Harç ve Masraf Kalemleri
    var basvurmaHarci = 400; // 2026 Maktu Başvurma
    var pesinHarc = tutar * 0.005; // Binde 5
    var vekaletHarcPul = avukat === 'evet' ? 160 : 0; // Vekalet harcı ~80 + Baro pulu ~80
    var postaGideri = 550; // Tebligat ve posta pulu gideri ortalaması

    var toplam = basvurmaHarci + pesinHarc + vekaletHarcPul + postaGideri;

    document.getElementById('hc-itm-res-basvuru').innerText = basvurmaHarci.toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-itm-res-pesin').innerText = Math.round(pesinHarc).toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-itm-res-vekalet').innerText = vekaletHarcPul.toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-itm-res-posta').innerText = postaGideri.toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-itm-res-toplam').innerText = Math.round(toplam).toLocaleString('tr-TR') + ' ₺';

    document.getElementById('hc-itm-result').classList.add('visible');
}
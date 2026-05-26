function hcCekSenetVadeHesapla() {
    var tur = document.getElementById('hc-csv-tur').value;
    var tutar = parseFloat(document.getElementById('hc-csv-tutar').value) || 0;
    var vadeStr = document.getElementById('hc-csv-vade').value;
    var odemeStr = document.getElementById('hc-csv-odeme').value;

    if (tutar <= 0 || !vadeStr || !odemeStr) {
        alert('Lütfen belge tutarını ve tarihleri giriniz.');
        return;
    }

    var vade = new Date(vadeStr);
    var odeme = new Date(odemeStr);

    var diffTime = odeme - vade;
    var diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

    if (diffDays <= 0) {
        alert('Ödeme tarihi, vade/ibraz tarihinden sonraki bir tarih olmalıdır.');
        return;
    }

    // Ticari avans faizi (2026 yılı için %43)
    var avansOran = 0.43;
    var faiz = tutar * avansOran * (diffDays / 360); // Ticari işlerde 360 gün esas alınır
    
    var cekTazminati = 0;
    var cekKomisyonu = 0;

    if (tur === 'cek') {
        cekTazminati = tutar * 0.10; // TTK m.783/3 uyarınca %10 çek tazminatı
        cekKomisyonu = tutar * 0.003; // Binde 3 komisyon
    }

    var toplam = tutar + faiz + cekTazminati + cekKomisyonu;

    document.getElementById('hc-csv-res-asil').innerText = tutar.toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-csv-res-gun').innerText = diffDays + ' Gün';
    document.getElementById('hc-csv-res-faiz').innerText = '+' + Math.round(faiz).toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-csv-res-tazminat').innerText = Math.round(cekTazminati).toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-csv-res-komisyon').innerText = Math.round(cekKomisyonu).toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-csv-res-toplam').innerText = Math.round(toplam).toLocaleString('tr-TR') + ' ₺';

    document.getElementById('hc-csv-result').classList.add('visible');
}
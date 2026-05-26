function hcAlacakFaizTuruGuncelle() {
    var tur = document.getElementById('hc-aft-turu').value;
    var row = document.getElementById('hc-aft-ozel-row');
    if (tur === 'ozel') {
        row.style.display = 'block';
    } else {
        row.style.display = 'none';
    }
}

function hcAlacakAsilFaizHesapla() {
    var asil = parseFloat(document.getElementById('hc-aft-asil').value) || 0;
    var tur = document.getElementById('hc-aft-turu').value;
    var ozelOran = parseFloat(document.getElementById('hc-aft-ozel-oran').value) || 0;
    var baslangicStr = document.getElementById('hc-aft-baslangic').value;
    var bitisStr = document.getElementById('hc-aft-bitis').value;

    if (asil <= 0 || !baslangicStr || !bitisStr) {
        alert('Lütfen asıl alacak tutarını ve tarihleri giriniz.');
        return;
    }

    var baslangic = new Date(baslangicStr);
    var bitis = new Date(bitisStr);

    var diffTime = bitis - baslangic;
    var diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

    if (diffDays <= 0) {
        alert('Hesaplama tarihi başlangıç tarihinden sonraki bir tarih olmalıdır.');
        return;
    }

    var oran = 0;
    if (tur === 'ozel') {
        oran = ozelOran;
    } else {
        oran = parseFloat(tur);
    }

    var faiz = asil * (oran / 100) * (diffDays / 365);
    var toplam = asil + faiz;

    document.getElementById('hc-aft-res-asil').innerText = asil.toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-aft-res-gun').innerText = diffDays + ' Gün';
    document.getElementById('hc-aft-res-oran').innerText = '%' + oran.toFixed(2);
    document.getElementById('hc-aft-res-faiz').innerText = '+' + Math.round(faiz).toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-aft-res-toplam').innerText = Math.round(toplam).toLocaleString('tr-TR') + ' ₺';

    document.getElementById('hc-aft-result').classList.add('visible');
}
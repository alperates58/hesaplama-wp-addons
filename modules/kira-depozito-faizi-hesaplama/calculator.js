function hcDepozitoFaiziHesapla() {
    var tutar = parseFloat(document.getElementById('hc-kdf-tutar').value) || 0;
    var girisStr = document.getElementById('hc-kdf-giris').value;
    var cikisStr = document.getElementById('hc-kdf-cikis').value;
    var faizOrani = parseFloat(document.getElementById('hc-kdf-faiz').value) || 0;

    if (tutar <= 0 || !girisStr || !cikisStr) {
        alert('Lütfen depozito tutarını ve tarihleri giriniz.');
        return;
    }

    var giris = new Date(girisStr);
    var cikis = new Date(cikisStr);

    var diffTime = cikis - giris;
    var diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

    if (diffDays <= 0) {
        alert('Depozito çıkış tarihi giriş tarihinden sonraki bir tarih olmalıdır.');
        return;
    }

    // Basit günlük faiz hesabı: (Anapara * Faiz Oranı * Gün) / 36500
    var brutFaiz = (tutar * faizOrani * diffDays) / 36500;
    
    // %5 Mevduat stopajı düşürülür
    var netFaiz = brutFaiz * 0.95;

    var toplam = tutar + netFaiz;

    document.getElementById('hc-kdf-res-anapara').innerText = tutar.toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-kdf-res-gun').innerText = diffDays + ' Gün';
    document.getElementById('hc-kdf-res-faiz').innerText = '+' + Math.round(netFaiz).toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-kdf-res-toplam').innerText = Math.round(toplam).toLocaleString('tr-TR') + ' ₺';

    document.getElementById('hc-kdf-result').classList.add('visible');
}
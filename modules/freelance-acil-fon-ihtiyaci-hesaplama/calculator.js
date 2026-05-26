function hcFreelanceAcilFonHesapla() {
    var kisisel = parseFloat(document.getElementById('hc-faf-kisisel').value) || 0;
    var sirket = parseFloat(document.getElementById('hc-faf-sirket').value) || 0;
    var katsayi = parseInt(document.getElementById('hc-faf-oran').value) || 6;

    if (kisisel <= 0 && sirket <= 0) {
        alert('Lütfen aylık giderlerinizi giriniz.');
        return;
    }

    var aylikGider = kisisel + sirket;
    var toplamFon = aylikGider * katsayi;

    document.getElementById('hc-faf-res-aylik').innerText = aylikGider.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2}) + ' ₺';
    document.getElementById('hc-faf-res-sure').innerText = katsayi + ' Ay';
    document.getElementById('hc-faf-res-toplam').innerText = toplamFon.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2}) + ' ₺';

    document.getElementById('hc-faf-result').classList.add('visible');
}
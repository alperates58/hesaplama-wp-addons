function hcEvOfisKesintiHesapla() {
    var evAlan = parseFloat(document.getElementById('hc-eog-ev-alan').value) || 0;
    var ofisAlan = parseFloat(document.getElementById('hc-eog-ofis-alan').value) || 0;
    var kira = parseFloat(document.getElementById('hc-eog-kira').value) || 0;
    var fatura = parseFloat(document.getElementById('hc-eog-fatura').value) || 0;

    if (evAlan <= 0 || ofisAlan <= 0 || ofisAlan > evAlan) {
        alert('Lütfen geçerli ev ve ofis alanı giriniz. Ofis alanı ev alanından büyük olamaz.');
        return;
    }

    var oran = ofisAlan / evAlan;
    var dusulebilirKira = kira * oran;
    var dusulebilirFatura = fatura * oran;
    var toplamDusulebilir = dusulebilirKira + dusulebilirFatura;

    document.getElementById('hc-eog-res-oran').innerText = '%' + (oran * 100).toFixed(2);
    document.getElementById('hc-eog-res-kira').innerText = dusulebilirKira.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2}) + ' ₺';
    document.getElementById('hc-eog-res-fatura').innerText = dusulebilirFatura.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2}) + ' ₺';
    document.getElementById('hc-eog-res-toplam').innerText = toplamDusulebilir.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2}) + ' ₺';

    document.getElementById('hc-eog-result').classList.add('visible');
}
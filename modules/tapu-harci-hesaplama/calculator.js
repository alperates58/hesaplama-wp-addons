function hcTapuHarciHesapla() {
    var bedel = parseFloat(document.getElementById('hc-th-bedel').value) || 0;
    var doner = parseFloat(document.getElementById('hc-th-doner').value) || 0;

    if (bedel <= 0) {
        alert('Lütfen gayrimenkul alış/satış bedelini giriniz.');
        return;
    }

    var harcOran = 0.04;
    var aliciOran = 0.02;
    var saticiOran = 0.02;

    var toplamHarc = bedel * harcOran;
    var aliciHarc = bedel * aliciOran;
    var saticiHarc = bedel * saticiOran;

    var aliciToplam = aliciHarc + doner;
    var saticiToplam = saticiHarc;
    var genelToplam = toplamHarc + doner;

    document.getElementById('hc-th-res-toplam-harc').innerText = Math.round(toplamHarc).toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-th-res-alici').innerText = Math.round(aliciToplam).toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-th-res-satici').innerText = Math.round(saticiToplam).toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-th-res-toplam').innerText = Math.round(genelToplam).toLocaleString('tr-TR') + ' ₺';

    document.getElementById('hc-th-result').classList.add('visible');
}
function hcMiningGeriOdemeHesapla() {
    var cihaz = parseFloat(document.getElementById('hc-mgo-cihaz').value) || 0;
    var kazanc = parseFloat(document.getElementById('hc-mgo-kazanc').value) || 0;

    if (cihaz <= 0 || kazanc <= 0) {
        alert('Lütfen geçerli rig maliyeti ve günlük kazanç giriniz.');
        return;
    }

    var toplamGun = cihaz / kazanc;
    var aylar = Math.floor(toplamGun / 30);
    var gunler = Math.round(toplamGun % 30);

    document.getElementById('hc-mgo-res-yatirim').innerText = cihaz.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2});
    document.getElementById('hc-mgo-res-kazanc').innerText = kazanc.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2});
    document.getElementById('hc-mgo-res-gun').innerText = Math.ceil(toplamGun) + ' Gün';
    document.getElementById('hc-mgo-res-ay').innerText = aylar + ' Ay, ' + gunler + ' Gün';

    document.getElementById('hc-mgo-result').classList.add('visible');
}
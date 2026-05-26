function hcBitcoinHalvingHesapla() {
    var mevcutBlok = parseInt(document.getElementById('hc-bht-blok').value) || 0;
    var blokSuresi = parseFloat(document.getElementById('hc-bht-sure').value) || 10;

    if (mevcutBlok <= 0) {
        alert('Lütfen mevcut blok yüksekliğini giriniz.');
        return;
    }

    // Bitcoin halving periyodu her 210,000 blokta birdir.
    var halvingAraligi = 210000;
    var mevcutHalvingDonemi = Math.floor(mevcutBlok / halvingAraligi);
    var sonrakiHalvingBlogu = (mevcutHalvingDonemi + 1) * halvingAraligi;
    
    var kalanBlok = sonrakiHalvingBlogu - mevcutBlok;
    var kalanDakika = kalanBlok * blokSuresi;
    var kalanGun = kalanDakika / (60 * 24);

    var bugun = new Date();
    var tahminDate = new Date(bugun.getTime() + (kalanDakika * 60 * 1000));

    document.getElementById('hc-bht-res-hedef').innerText = sonrakiHalvingBlogu.toLocaleString('tr-TR') + '. Blok';
    document.getElementById('hc-bht-res-kalan-blok').innerText = kalanBlok.toLocaleString('tr-TR');
    document.getElementById('hc-bht-res-kalan-gun').innerText = Math.ceil(kalanGun) + ' Gün';
    document.getElementById('hc-bht-res-tarih').innerText = tahminDate.toLocaleDateString('tr-TR', {day: 'numeric', month: 'long', year: 'numeric'});

    document.getElementById('hc-bht-result').classList.add('visible');
}
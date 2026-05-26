function hcKefirHesapla() {
    var sut = parseFloat(document.getElementById('hc-kef-sut').value) || 0;
    var dane = parseFloat(document.getElementById('hc-kef-grain').value) || 0;
    var temp = parseFloat(document.getElementById('hc-kef-temp').value) || 22;
    var tat = parseFloat(document.getElementById('hc-kef-tat').value) || 1.0;

    if (sut <= 0 || dane <= 0) {
        alert('Lütfen süt ve kefir mayası değerlerini giriniz.');
        return;
    }

    var oran = sut / dane;

    // İdeal oran 1:20 (yani 500ml süte 25g dane). Oran arttıkça süre uzar.
    var bazSure = 24;
    var oranMod = OranGoreSure(oran);
    var sicaklikMod = Math.pow(0.92, temp - 22); // Her derece artışında süre kısalır

    var sure = bazSure * oranMod * sicaklikMod * tat;
    if (sure < 12) sure = 12;
    if (sure > 48) sure = 48;

    var uyari = 'Mayalama esnasında cam kavanoz kullanın. Kefir danelerinin sağlığı için kesinlikle metal kaşık veya metal süzgeç kullanmayınız.';
    if (temp > 28) {
        uyari += ' Sıcaklık çok yüksek, aşırı ekşimeyi önlemek için kefir kıvam aldığında hemen süzün.';
    }

    document.getElementById('hc-kef-res-oran').innerText = '1 : ' + Math.round(oran);
    document.getElementById('hc-kef-res-sure').innerText = sure.toFixed(1) + ' Saat';
    document.getElementById('hc-kef-res-uyari').innerText = uyari;

    document.getElementById('hc-kef-result').classList.add('visible');
}

function OranGoreSure(oran) {
    // 20 standart
    if (oran < 10) return 0.7; // Maya çok, hızlı mayalanır
    if (oran <= 30) return 1.0; // Standart oran aralığı
    if (oran <= 50) return 1.3; // Az maya, yavaş
    return 1.6; // Çok az maya
}
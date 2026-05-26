function hcBalikYogunluguHesapla() {
    var hacim = parseFloat(document.getElementById('hc-aby-hacim').value) || 0;
    var tur = document.getElementById('hc-aby-tur').value;
    var boy = parseFloat(document.getElementById('hc-aby-boy').value) || 0;

    if (hacim <= 0 || boy <= 0) {
        alert('Lütfen akvaryum hacmi ve ortalama balık boyunu giriniz.');
        return;
    }

    var katsayi = 1;
    var katsayiText = '';
    if (tur === 'kucuk') {
        katsayi = 1;
        katsayiText = '1 cm balık boyu / 1 Litre su';
    } else if (tur === 'orta') {
        katsayi = 2;
        katsayiText = '1 cm balık boyu / 2 Litre su';
    } else if (tur === 'buyuk') {
        katsayi = 4;
        katsayiText = '1 cm balık boyu / 4 Litre su';
    }

    var maksToplamBoy = hacim / katsayi;
    var balikSayisi = Math.floor(maksToplamBoy / boy);

    document.getElementById('hc-aby-res-katsayi').innerText = katsayiText;
    document.getElementById('hc-aby-res-toplam-boy').innerText = maksToplamBoy.toFixed(0) + ' cm';
    document.getElementById('hc-aby-res-sayi').innerText = balikSayisi + ' adet';

    document.getElementById('hc-aby-result').classList.add('visible');
}
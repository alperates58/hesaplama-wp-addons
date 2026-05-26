function hcMotoBakimHesapla() {
    var km = parseFloat(document.getElementById('hc-myb-km').value) || 0;
    var periyot = parseFloat(document.getElementById('hc-myb-periyot').value) || 5000;
    var rutin = parseFloat(document.getElementById('hc-myb-yagfiyat').value) || 0;
    var lastik = parseFloat(document.getElementById('hc-myb-lastikfiyat').value) || 0;
    var zincir = parseFloat(document.getElementById('hc-myb-zincirfiyat').value) || 0;
    var balata = parseFloat(document.getElementById('hc-myb-balatafiyat').value) || 0;

    if (km <= 0) {
        alert('Lütfen yıllık sürüş mesafesini giriniz.');
        return;
    }

    // Rutin bakım sayısı
    var bakimSayisi = Math.ceil(km / periyot);
    var yillikRutin = bakimSayisi * rutin;

    // Ortalama ömürler: Lastik = 15.000 km, Zincir = 20.000 km, Balata = 10.000 km
    var yillikLastik = (km / 15000) * lastik;
    var yillikZincir = (km / 20000) * zincir;
    var yillikBalata = (km / 10000) * balata;

    var toplamYillik = yillikRutin + yillikLastik + yillikZincir + yillikBalata;

    document.getElementById('hc-myb-res-rutin').innerText = yillikRutin.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2}) + ' ₺';
    document.getElementById('hc-myb-res-lastik').innerText = yillikLastik.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2}) + ' ₺';
    document.getElementById('hc-myb-res-zincir').innerText = yillikZincir.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2}) + ' ₺';
    document.getElementById('hc-myb-res-balata').innerText = yillikBalata.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2}) + ' ₺';
    document.getElementById('hc-myb-res-toplam').innerText = toplamYillik.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2}) + ' ₺';

    document.getElementById('hc-myb-result').classList.add('visible');
}
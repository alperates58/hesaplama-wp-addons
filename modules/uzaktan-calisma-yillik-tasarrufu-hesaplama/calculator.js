function hcRemoteTasarrufHesapla() {
    var yol = parseFloat(document.getElementById('hc-uct-yol').value) || 0;
    var yemek = parseFloat(document.getElementById('hc-uct-yemek').value) || 0;
    var kahve = parseFloat(document.getElementById('hc-uct-kahve').value) || 0;
    var giysi = parseFloat(document.getElementById('hc-uct-giysi').value) || 0;
    var gun = parseFloat(document.getElementById('hc-uct-gun').value) || 5;
    var ekEv = parseFloat(document.getElementById('hc-uct-ek-ev').value) || 0;

    // Yılda yaklaşık 48 hafta aktif çalışıldığını varsayalım
    var calisilanHafta = 48;
    var yillikGun = gun * calisilanHafta;

    var yillikYol = yol * yillikGun;
    var yillikYemek = (yemek + kahve) * yillikGun;
    var yillikGiysi = giysi * 12;

    var yillikEvMaliyeti = ekEv * 12;
    var bruttasarruf = yillikYol + yillikYemek + yillikGiysi;
    var netTasarruf = bruttasarruf - yillikEvMaliyeti;

    document.getElementById('hc-uct-res-yol').innerText = yillikYol.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2}) + ' ₺';
    document.getElementById('hc-uct-res-yemek').innerText = yillikYemek.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2}) + ' ₺';
    document.getElementById('hc-uct-res-ev').innerText = yillikEvMaliyeti.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2}) + ' ₺';
    document.getElementById('hc-uct-res-toplam').innerText = netTasarruf.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2}) + ' ₺';

    document.getElementById('hc-uct-result').classList.add('visible');
}
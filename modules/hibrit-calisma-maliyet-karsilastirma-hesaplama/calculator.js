function hcHybridMaliyetHesapla() {
    var ofisGun = parseFloat(document.getElementById('hc-hcm-ofis-gun').value);
    var yol = parseFloat(document.getElementById('hc-hcm-yol').value) || 0;
    var yemek = parseFloat(document.getElementById('hc-hcm-yemek').value) || 0;
    var evEk = parseFloat(document.getElementById('hc-hcm-ev-ek').value) || 0;

    if (isNaN(ofisGun) || ofisGun < 0 || ofisGun > 7) {
        alert('Lütfen haftada 0 ile 7 arasında geçerli bir ofis günü giriniz.');
        return;
    }

    var evGun = 5 - ofisGun;
    if (evGun < 0) evGun = 0;

    var aylikOfisGun = 20; // 4 hafta x 5 gün
    var aylikHibritOfisGun = ofisGun * 4;
    var aylikHibritEvGun = evGun * 4;

    // Tam Zamanlı Ofis
    var ofisYolMaliyeti = yol * aylikOfisGun;
    var ofisYemekMaliyeti = yemek * aylikOfisGun;
    var ofisToplam = ofisYolMaliyeti + ofisYemekMaliyeti;

    // Hibrit Düzen
    var hibritYolMaliyeti = yol * aylikHibritOfisGun;
    var hibritYemekMaliyeti = yemek * aylikHibritOfisGun;
    var hibritEvFaturaMaliyeti = evEk * aylikHibritEvGun;
    var hibritToplam = hibritYolMaliyeti + hibritYemekMaliyeti + hibritEvFaturaMaliyeti;

    var netTasarruf = ofisToplam - hibritToplam;

    document.getElementById('hc-hcm-res-yol-ofis').innerText = ofisYolMaliyeti.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2}) + ' ₺';
    document.getElementById('hc-hcm-res-yol-hibrit').innerText = hibritYolMaliyeti.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2}) + ' ₺';
    document.getElementById('hc-hcm-res-yemek-ofis').innerText = ofisYemekMaliyeti.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2}) + ' ₺';
    document.getElementById('hc-hcm-res-yemek-hibrit').innerText = hibritYemekMaliyeti.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2}) + ' ₺';
    document.getElementById('hc-hcm-res-fatura-hibrit').innerText = hibritEvFaturaMaliyeti.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2}) + ' ₺';
    
    document.getElementById('hc-hcm-res-toplam-ofis').innerText = ofisToplam.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2}) + ' ₺';
    document.getElementById('hc-hcm-res-toplam-hibrit').innerText = hibritToplam.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2}) + ' ₺';
    
    var tasarrufEl = document.getElementById('hc-hcm-res-tasarruf');
    tasarrufEl.innerText = (netTasarruf >= 0 ? '' : '-') + Math.abs(netTasarruf).toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2}) + ' ₺';
    tasarrufEl.style.color = netTasarruf >= 0 ? 'var(--hc-front-green)' : 'var(--hc-front-red)';

    document.getElementById('hc-hcm-result').classList.add('visible');
}
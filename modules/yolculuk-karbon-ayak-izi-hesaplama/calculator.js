function hcCarbonHesapla() {
    var mesafe = parseFloat(document.getElementById('hc-yka-mesafe').value) || 0;
    var arac = document.getElementById('hc-yka-arac').value;

    if (mesafe <= 0) {
        alert('Lütfen seyahat mesafesini giriniz.');
        return;
    }

    // Karbon katsayıları (gram CO2 / km)
    var katsayi = 180; // benzinli araç
    if (arac === 'dizel') katsayi = 160;
    else if (arac === 'elektrik') katsayi = 50;
    else if (arac === 'otobus') katsayi = 35;
    else if (arac === 'ucak') katsayi = 240;

    var co2Kg = (mesafe * katsayi) / 1000;
    
    // 1 olgun çam ağacı yılda ortalama 22 kg CO2 absorbe eder
    var agacSayisi = co2Kg / 22;

    document.getElementById('hc-yka-res-co2').innerText = co2Kg.toFixed(1) + ' kg CO₂';
    document.getElementById('hc-yka-res-agac').innerText = Math.ceil(agacSayisi) + ' Ağaç (Karbon nötr olmak için gereken dikim)';

    document.getElementById('hc-yka-result').classList.add('visible');
}
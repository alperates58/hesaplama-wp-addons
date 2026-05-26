function hcYalitimTasarrufHesapla() {
    var fatura = parseFloat(document.getElementById('hc-yth-maliyet').value) || 0;
    var bina = parseFloat(document.getElementById('hc-yth-bina').value) || 1.0;
    var kalinlik = parseFloat(document.getElementById('hc-yth-kalinlik').value) || 0.5;
    var malzeme = parseFloat(document.getElementById('hc-yth-malzeme').value) || 1.0;

    if (fatura <= 0) {
        alert('Lütfen ısınma/soğutma giderinizi giriniz.');
        return;
    }

    var tasarrufOrani = kalinlik * malzeme * bina;
    if (tasarrufOrani > 0.8) tasarrufOrani = 0.8; // Maksimum %80 tasarruf limiti

    var yillikTasarruf = fatura * tasarrufOrani;
    var onYillik = yillikTasarruf * 10;
    
    // Ortalama karbon ayak izi azaltımı: 1 ₺ tasarruf başına ~0.08 kg CO2 emisyonu engellenir.
    var co2Azaltim = yillikTasarruf * 0.08;

    document.getElementById('hc-yth-res-oran').innerText = '%' + Math.round(tasarrufOrani * 100);
    document.getElementById('hc-yth-res-yillik').innerText = yillikTasarruf.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2}) + ' ₺';
    document.getElementById('hc-yth-res-on-yil').innerText = onYillik.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2}) + ' ₺';
    document.getElementById('hc-yth-res-co2').innerText = Math.round(co2Azaltim).toLocaleString('tr-TR') + ' kg CO₂';

    document.getElementById('hc-yth-result').classList.add('visible');
}
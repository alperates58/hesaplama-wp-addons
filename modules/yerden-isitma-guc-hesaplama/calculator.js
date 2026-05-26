function hcYerdenIsitmaHesapla() {
    var alan = parseFloat(document.getElementById('hc-yig-alan').value) || 0;
    var aralik = parseFloat(document.getElementById('hc-yig-aralik').value) || 15;
    var zemin = parseFloat(document.getElementById('hc-yig-zemin').value) || 1.0;

    if (alan <= 0) {
        alert('Lütfen geçerli bir zemin alanı giriniz.');
        return;
    }

    // Modülasyon aralığına göre watt/m2 katsayıları
    var bazWatt = 80;
    if (aralik === 10) bazWatt = 110;
    if (aralik === 20) bazWatt = 60;

    var birimGuc = bazWatt * zemin;
    var toplamGuc = alan * birimGuc;

    // Metrekareye giden ortalama boru miktarı (10cm = 10m/m2, 15cm = 6.7m/m2, 20cm = 5m/m2)
    var boruMiktarı = 100 / aralik;
    var toplamBoru = alan * boruMiktarı * 1.1; // %10 bağlantı payı eklenir

    // Tek devrede maksimum boru uzunluğu genelde 90-100 metredir.
    var devreSayisi = Math.ceil(toplamBoru / 85);

    document.getElementById('hc-yig-res-birim').innerText = Math.round(birimGuc) + ' W/m²';
    document.getElementById('hc-yig-res-toplam').innerText = Math.round(toplamGuc).toLocaleString('tr-TR') + ' Watt (' + (toplamGuc/1000).toFixed(2) + ' kW)';
    document.getElementById('hc-yig-res-boru').innerText = Math.round(toplamBoru) + ' metre';
    document.getElementById('hc-yig-res-devre').innerText = devreSayisi + ' Devre (Kolektör Ağzı)';

    document.getElementById('hc-yig-result').classList.add('visible');
}
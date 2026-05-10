function hcCakePriceHesapla() {
    const material = parseFloat(document.getElementById('hc-cp-material').value);
    const laborTime = parseFloat(document.getElementById('hc-cp-labor').value);
    const hourlyRate = parseFloat(document.getElementById('hc-cp-hourly').value);

    if (isNaN(material) || isNaN(laborTime) || isNaN(hourlyRate)) {
        alert('Lütfen tüm alanları doldurunuz.');
        return;
    }

    // Toplam Maliyet = Malzeme + (Süre * Saatlik Ücret)
    const directCost = material + (laborTime * hourlyRate);
    // Genel giderler ve kar payı için katsayı (Genelde %30-%50 eklenir)
    const totalPrice = directCost * 1.4;

    document.getElementById('hc-cp-val').innerText = totalPrice.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-cp-info').innerText = `Direkt maliyet (malzeme+işçilik): ${directCost.toLocaleString('tr-TR')} ₺. Satış fiyatına %40 genel gider ve kar marjı eklenmiştir.`;
    
    document.getElementById('hc-cake-price-result').classList.add('visible');
}

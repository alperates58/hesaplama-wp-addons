function hcArabaBisikletKarsilastir() {
    const dist = parseFloat(document.getElementById('hc-comp-distance').value);
    const carType = document.getElementById('hc-comp-car-type').value;

    if (isNaN(dist) || dist <= 0) {
        alert('Lütfen geçerli bir mesafe giriniz.');
        return;
    }

    // 2026 Emisyon Faktörleri (g CO2/km)
    // Kaynak: EPA/EEA 2026 Projeksiyonları
    const factors = {
        petrol: 190,
        diesel: 175,
        hybrid: 110,
        ev: 85 // TR 2026 şebekesi ile (0.2 kWh/km * 425g/kWh ortalama)
    };

    // Bisiklet emisyonu (Gıda tüketimi kaynaklı metabolik CO2 - LCA)
    // Ortalama bir beslenme düzeni ile km başına ~15g CO2
    const bikeFactor = 15;

    const carTotal = (factors[carType] * dist) / 1000; // kg
    const bikeTotal = (bikeFactor * dist) / 1000; // kg
    const savings = carTotal - bikeTotal;

    document.getElementById('hc-res-car-em').innerText = carTotal.toLocaleString('tr-TR', {maximumFractionDigits: 3}) + ' kg';
    document.getElementById('hc-res-bike-em').innerText = bikeTotal.toLocaleString('tr-TR', {maximumFractionDigits: 3}) + ' kg';
    document.getElementById('hc-res-savings').innerText = savings.toLocaleString('tr-TR', {maximumFractionDigits: 3}) + ' kg';

    // Ağaç eşdeğeri (1 ağaç = 25kg/yıl)
    const treeEquiv = savings / (25 / 365); // Günlük tasarruf bazlı değil, yıllık bazlı düşünürsek 
    // Ama kullanıcı bir seferlik mesafe girdi. 
    // Daha mantıklı: 25kg'lık yıllık emilimin ne kadarlık bir kısmını bir sürüşte tasarruf ettik?
    const treeText = `Bu tasarruf yaklaşık ${ (savings / 25).toLocaleString('tr-TR', {maximumFractionDigits: 2}) } ağacın 1 yılda emdiği CO2'ye eşdeğerdir.`;
    document.getElementById('hc-res-tree-equiv').innerText = treeText;

    // Görsel bar ayarı
    const max = Math.max(carTotal, bikeTotal);
    document.getElementById('hc-bar-car').style.width = (carTotal / max * 100) + '%';
    document.getElementById('hc-bar-bike').style.width = (bikeTotal / max * 100) + '%';

    document.getElementById('hc-araba-bisiklet-result').classList.add('visible');
}

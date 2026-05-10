function hcCoffeeWaterRatioHesapla() {
    const coffee = parseFloat(document.getElementById('hc-cw-coffee').value);
    const water = parseFloat(document.getElementById('hc-cw-water').value);

    if (isNaN(coffee) || isNaN(water) || coffee <= 0) {
        alert('Lütfen kahve ve su miktarlarını giriniz.');
        return;
    }

    const ratio = water / coffee;
    // Kahve çekirdekleri ağırlığının yaklaşık 2 katı kadar su emer.
    const expectedYield = water - (coffee * 2);

    document.getElementById('hc-cw-val').innerText = '1 : ' + ratio.toLocaleString('tr-TR', { maximumFractionDigits: 1 });
    document.getElementById('hc-cw-desc').innerText = `Tahmini elde edilecek kahve: ${Math.max(0, expectedYield).toLocaleString('tr-TR')} ml. (Kahvenin su emme payı düşülmüştür.)`;
    
    document.getElementById('hc-coffee-water-ratio-result').classList.add('visible');
}

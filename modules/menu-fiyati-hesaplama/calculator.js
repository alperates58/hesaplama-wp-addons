function hcMenuPriceHesapla() {
    const cost = parseFloat(document.getElementById('hc-price-cost').value);
    const margin = parseFloat(document.getElementById('hc-price-margin').value);

    if (isNaN(cost) || isNaN(margin) || margin <= 0) {
        alert('Lütfen değerleri giriniz.');
        return;
    }

    // Satış Fiyatı = Maliyet / (Hedef Oran / 100)
    const price = cost / (margin / 100);
    const profit = price - cost;

    document.getElementById('hc-price-val').innerText = price.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-price-info').innerText = `Brüt Kar: ${profit.toLocaleString('tr-TR', {maximumFractionDigits:2})} ₺. Bu fiyat KDV hariç maliyet üzerinden hesaplanmalıdır.`;
    
    document.getElementById('hc-menu-price-result').classList.add('visible');
}

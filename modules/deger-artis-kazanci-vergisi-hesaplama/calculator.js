function hcDakHesapla() {
    const buyPrice = parseFloat(document.getElementById('hc-dak-purchase-price').value);
    const sellPrice = parseFloat(document.getElementById('hc-dak-sale-price').value);
    const years = parseInt(document.getElementById('hc-dak-years').value);
    const inflation = parseFloat(document.getElementById('hc-dak-index').value) / 100 || 0;

    if (isNaN(buyPrice) || isNaN(sellPrice) || buyPrice <= 0 || sellPrice <= 0) {
        alert('Lütfen alış ve satış fiyatlarını girin.');
        return;
    }

    const noteElem = document.getElementById('hc-dak-note');
    
    if (years >= 5) {
        document.getElementById('hc-dak-res-indexed').innerText = '0 ₺';
        document.getElementById('hc-dak-res-profit').innerText = '0 ₺';
        document.getElementById('hc-dak-res-tax').innerText = '0 ₺';
        noteElem.innerText = "Konut 5 yıldan fazla elde tutulduğu için değer artış kazancı vergisinden muaftır.";
        document.getElementById('hc-dak-result').classList.add('visible');
        return;
    }

    const indexedBuyPrice = buyPrice * (1 + inflation);
    let profit = sellPrice - indexedBuyPrice;

    // 2026 İstisna Tutarı (Tahmini 150.000 TL)
    const exemption = 150000;
    let taxableProfit = Math.max(0, profit - exemption);

    // Gelir Vergisi Dilimleri (2026 Tahmini)
    let tax = 0;
    if (taxableProfit > 0) {
        if (taxableProfit <= 190000) tax = taxableProfit * 0.15;
        else if (taxableProfit <= 400000) tax = (190000 * 0.15) + (taxableProfit - 190000) * 0.20;
        else tax = (190000 * 0.15) + (210000 * 0.20) + (taxableProfit - 400000) * 0.27;
    }

    document.getElementById('hc-dak-res-indexed').innerText = indexedBuyPrice.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-dak-res-profit').innerText = taxableProfit.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-dak-res-tax').innerText = tax.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    noteElem.innerText = "Hesaplama 2026 yılı tahmini vergi dilimleri ve " + exemption.toLocaleString('tr-TR') + " ₺ istisna tutarı baz alınarak yapılmıştır.";

    document.getElementById('hc-dak-result').classList.add('visible');
}

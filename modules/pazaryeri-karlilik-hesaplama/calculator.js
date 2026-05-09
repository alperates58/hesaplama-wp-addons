function hcKarlilikHesapla() {
    const buyPrice = parseFloat(document.getElementById('hc-kar-buy').value) || 0;
    const sellPrice = parseFloat(document.getElementById('hc-kar-sell').value) || 0;
    const komRate = parseFloat(document.getElementById('hc-kar-rate').value) || 0;
    const shipping = parseFloat(document.getElementById('hc-kar-shipping').value) || 0;
    const vatRate = parseFloat(document.getElementById('hc-kar-vat').value) / 100;

    if (sellPrice <= 0 || buyPrice <= 0) {
        alert('Lütfen alış ve satış fiyatlarını giriniz.');
        return;
    }

    const marketplaceFee = (sellPrice * komRate) / 100;
    
    // VAT Calculation (Simplified: VAT on margin)
    // In TR, you pay VAT on (Sell - Buy) if you have invoices. 
    // Or more precisely: (SellPrice / (1+rate)) * rate - (BuyPrice / (1+rate)) * rate
    const vatOnSell = (sellPrice / (1 + vatRate)) * vatRate;
    const vatOnBuy = (buyPrice / (1 + vatRate)) * vatRate;
    const netVat = Math.max(0, vatOnSell - vatOnBuy);

    const totalExp = buyPrice + marketplaceFee + shipping + netVat;
    const profit = sellPrice - totalExp;
    const margin = (profit / sellPrice) * 100;

    document.getElementById('hc-kar-res-fee').innerText = marketplaceFee.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-kar-res-vat').innerText = netVat.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-kar-res-margin').innerText = '%' + margin.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    document.getElementById('hc-kar-res-profit').innerText = profit.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    if (profit < 0) {
        document.getElementById('hc-kar-res-profit').style.color = "#c0392b";
    } else {
        document.getElementById('hc-kar-res-profit').style.color = "#27ae60";
    }

    document.getElementById('hc-karlilik-result').classList.add('visible');
}

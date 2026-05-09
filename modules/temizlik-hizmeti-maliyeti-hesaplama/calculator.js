function hcCleaningCostHesapla() {
    const houseType = parseInt(document.getElementById('hc-clean-house').value);
    
    // 2026 Baz Fiyatlar (Procyon/Tahmin)
    const basePrices = {
        1: 1200,
        2: 1500,
        3: 1800,
        4: 2500,
        5: 4000
    };

    let total = basePrices[houseType];

    if (document.getElementById('hc-clean-window').checked) total += 250;
    if (document.getElementById('hc-clean-balcony').checked) total += 150;
    if (document.getElementById('hc-clean-oven').checked) total += 100;

    document.getElementById('hc-res-clean-total').innerText = total.toLocaleString('tr-TR', {style: 'currency', currency: 'TRY'});
    
    document.getElementById('hc-cleaning-cost-result').classList.add('visible');
}

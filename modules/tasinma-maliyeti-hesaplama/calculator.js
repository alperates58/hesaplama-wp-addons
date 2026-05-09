function hcMovingCostHesapla() {
    const house = parseInt(document.getElementById('hc-move-house').value);
    const dist = parseFloat(document.getElementById('hc-move-dist').value) || 0;
    const floor = parseInt(document.getElementById('hc-move-floor').value) || 0;
    const lift = document.getElementById('hc-move-lift').checked;

    // 2026 Baz Fiyatlar
    const basePrices = { 1: 8000, 2: 12000, 3: 16000, 4: 25000 };
    
    let total = basePrices[house];
    
    // Yol maliyeti (km başı 50 TL)
    total += dist * 50;
    
    // Kat farkı (kat başı 500 TL)
    total += floor * 500;
    
    // Asansör
    if (lift) total += 1500;

    document.getElementById('hc-res-move-total').innerText = total.toLocaleString('tr-TR', {style: 'currency', currency: 'TRY'});
    
    document.getElementById('hc-moving-cost-result').classList.add('visible');
}

function hcRenoBudgetHesapla() {
    const paintArea = parseFloat(document.getElementById('hc-reno-paint').value) || 0;
    const floorArea = parseFloat(document.getElementById('hc-reno-floor').value) || 0;
    const kitchen = document.getElementById('hc-reno-kitchen').checked;
    const bath = document.getElementById('hc-reno-bath').checked;

    // 2026 Birim Fiyatlar
    const paintPerM2 = 120; // İşçilik dahil
    const floorPerM2 = 650; // Malzeme + İşçilik
    
    let total = (paintArea * paintPerM2) + (floorArea * floorPerM2);
    
    if (kitchen) total += 75000;
    if (bath) total += 40000;

    document.getElementById('hc-res-reno-total').innerText = total.toLocaleString('tr-TR', {style: 'currency', currency: 'TRY'});
    
    document.getElementById('hc-reno-budget-result').classList.add('visible');
}

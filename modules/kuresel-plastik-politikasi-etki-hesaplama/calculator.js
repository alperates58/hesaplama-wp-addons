function hcKüreselPlastikPolitikasıEtkiHesapla() {
    const pop = parseFloat(document.getElementById('hc-pp-pop').value) * 1000000;
    const reduction = parseFloat(document.getElementById('hc-pp-reduction').value) / 100;

    // Yıllık kişi başı plastik atık ortalaması ~35 kg
    const totalPlastic = pop * 35;
    const avoidedPlastic = totalPlastic * reduction;
    
    // 1 ton plastik üretimi ~6 ton CO2 salınımı yapar.
    const avoidedCo2 = (avoidedPlastic / 1000) * 6;

    document.getElementById('hc-pp-stats').innerHTML = `
        ♻️ <strong>Engellenen Plastik Atık:</strong> ${(avoidedPlastic / 1000000).toFixed(2)} Milyon Ton/Yıl<br>
        🌍 <strong>Engellenen Karbon Salınımı:</strong> ${(avoidedCo2 / 1000000).toFixed(2)} Milyon Ton CO₂e<br>
        🌊 <strong>Denizlere Karışması Engellenen:</strong> ${(avoidedPlastic * 0.05 / 1000).toFixed(0)} Bin Ton (Tahmini)
    `;
    document.getElementById('hc-pp-result').classList.add('visible');
}

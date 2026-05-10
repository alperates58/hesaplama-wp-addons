function hcOlimpiyatOyunlarıSürdürülebilirlikEtkisiHesapla() {
    const fans = parseFloat(document.getElementById('hc-ol-fans').value);
    const travel = parseFloat(document.getElementById('hc-ol-travel').value);

    if (!fans) return;

    // Seyahat emisyonu (Ortalama 0.15 kg/km)
    const travelCo2 = fans * travel * 0.15;
    
    // Konaklama & Yemek (Kişi başı günlük ~20 kg CO2, 10 gün varsayımı)
    const stayCo2 = fans * 20 * 10;
    
    const totalTon = (travelCo2 + stayCo2) / 1000;

    document.getElementById('hc-ol-stats').innerHTML = `
        ✈️ <strong>Seyahat Emisyonu:</strong> ${(travelCo2/1000000).toFixed(2)} Milyon Ton CO₂e<br>
        🏨 <strong>Konaklama/Atık Emisyonu:</strong> ${(stayCo2/1000000).toFixed(2)} Milyon Ton CO₂e<br>
        🏆 <strong>Toplam Organizasyon Etkisi:</strong> ${totalTon.toLocaleString('tr-TR')} Ton CO₂e
    `;
    document.getElementById('hc-ol-result').classList.add('visible');
}

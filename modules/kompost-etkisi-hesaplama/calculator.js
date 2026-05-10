function hcKompostEtkisiHesapla() {
    const weight = parseFloat(document.getElementById('hc-ct-weight').value);

    if (!weight) return;

    // 1 kg organik atığın çöplüğe gitmesi yerine kompost yapılması:
    // ~0.5 kg CO2e tasarrufu (metan engelleme dahil)
    // Atığın %30-40'ı gübreye dönüşür.
    const annualCo2 = weight * 52 * 0.5;
    const annualFertilizer = weight * 52 * 0.35;

    document.getElementById('hc-ct-stats').innerHTML = `
        🌍 <strong>Yıllık CO₂ Tasarrufu:</strong> ${annualCo2.toFixed(1)} kg<br>
        🌱 <strong>Yıllık Organik Gübre Kazanımı:</strong> ${annualFertilizer.toFixed(1)} kg<br>
        🗑️ <strong>Çöpten Kurtarılan Hacim:</strong> ${Math.round(weight * 52)} kg/yıl
    `;
    document.getElementById('hc-ct-result').classList.add('visible');
}

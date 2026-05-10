function hcKarbonDengelemeHesapla() {
    const footprint = parseFloat(document.getElementById('hc-os-footprint').value);

    if (!footprint) return;

    // 1 ağaç yılda yaklaşık 20 kg CO2 emer. (1 ton için 50 ağaç)
    // 1 ton karbon dengeleme sertifikası maliyeti ~15-25 USD (2026 Tahmini: 1000 TL)
    const treeCount = Math.ceil((footprint * 1000) / 20);
    const cost = footprint * 1000;

    document.getElementById('hc-os-stats').innerHTML = `
        🌱 <strong>Gerekli Ağaç Sayısı:</strong> ${treeCount} adet<br>
        💰 <strong>Tahmini Sertifika Maliyeti:</strong> ${cost.toLocaleString('tr-TR')} ₺<br>
        <p style="font-size:0.85em; color:#666; margin-top:10px;">*Ağaçların olgunlaşma süresi ve sertifika piyasası değişkenlik gösterebilir.</p>
    `;
    document.getElementById('hc-os-result').classList.add('visible');
}

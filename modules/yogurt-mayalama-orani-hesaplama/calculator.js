function hcYogurtHesapla() {
    const milk = parseFloat(document.getElementById('hc-yr-milk').value);
    if (!milk || milk <= 0) return;

    const starterSpoons = milk * 1.5; // 1.5 Tbsp per liter
    const fermentationTime = "4 - 6 Saat";

    const resList = document.getElementById('hc-yr-res-list');
    resList.innerHTML = `
        <div class="hc-result-item"><span>Gereken Maya:</span> <strong>${starterSpoons.toLocaleString('tr-TR', { maximumFractionDigits: 1 })} Yemek Kaşığı</strong></div>
        <div class="hc-result-item"><span>Mayalama Süresi:</span> <strong>${fermentationTime}</strong></div>
        <div class="hc-result-item"><span>Hedef Sıcaklık:</span> <strong>42 - 45 °C</strong></div>
    `;

    document.getElementById('hc-yogurt-ratio-result').classList.add('visible');
}

function hcKahveHesapla() {
    const cups = parseInt(document.getElementById('hc-tc-cups').value);
    const sugarPerCup = parseFloat(document.getElementById('hc-tc-sugar').value);

    if (!cups || cups <= 0) return;

    const coffeeG = cups * 8; // Avg 8g per cup
    const waterMl = cups * 70; // Avg 70ml per cup
    const totalSugar = cups * sugarPerCup;

    const resList = document.getElementById('hc-tc-res-list');
    resList.innerHTML = `
        <div class="hc-result-item"><span>Kahve Miktarı:</span> <strong>${coffeeG} g (~${cups * 2} Tatlı K.)</strong></div>
        <div class="hc-result-item"><span>Su Miktarı:</span> <strong>${waterMl} ml (${cups} Fincan)</strong></div>
        <div class="hc-result-item"><span>Toplam Şeker:</span> <strong>${totalSugar.toLocaleString('tr-TR')} Adet/Küp</strong></div>
    `;

    document.getElementById('hc-turkish-coffee-result').classList.add('visible');
}

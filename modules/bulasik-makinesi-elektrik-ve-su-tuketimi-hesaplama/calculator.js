function hcBulaşıkMakinesiElektrikVeSuTüketimiHesapla() {
    const prog = document.getElementById('hc-dm-program').value.split('|');
    const count = parseFloat(document.getElementById('hc-dm-count').value);

    if (!count) return;

    const kwhPerCycle = parseFloat(prog[0]);
    const waterPerCycle = parseFloat(prog[1]);

    const monthlyKwh = kwhPerCycle * count * 4.3;
    const monthlyWater = waterPerCycle * count * 4.3;

    // 2026: Elektrik 3.25 TL, Su 0.02 TL/L
    const totalCost = (monthlyKwh * 3.25) + (monthlyWater * 0.02);

    document.getElementById('hc-dm-val').innerText = totalCost.toLocaleString('tr-TR', { style: 'currency', currency: 'TRY' });
    document.getElementById('hc-dm-details').innerHTML = `
        Aylık Enerji: ${monthlyKwh.toFixed(1)} kWh<br>
        Aylık Su: ${Math.round(monthlyWater)} Litre
    `;
    document.getElementById('hc-dm-result').classList.add('visible');
}

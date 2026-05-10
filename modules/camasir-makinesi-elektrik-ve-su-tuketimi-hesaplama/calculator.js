function hcÇamaşırMakinesiElektrikVeSuTüketimiHesapla() {
    const prog = document.getElementById('hc-wm-program').value.split('|');
    const count = parseFloat(document.getElementById('hc-wm-count').value);

    if (!count) return;

    const kwhPerWash = parseFloat(prog[0]);
    const waterPerWash = parseFloat(prog[1]);

    // 2026 Fiyatları: Elektrik 3.25 TL/kWh, Su ~20 TL/m3 (0.02 TL/Litre)
    const monthlyKwh = kwhPerWash * count * 4.3;
    const monthlyWater = waterPerWash * count * 4.3;

    const totalCost = (monthlyKwh * 3.25) + (monthlyWater * 0.02);

    document.getElementById('hc-wm-val').innerText = totalCost.toLocaleString('tr-TR', { style: 'currency', currency: 'TRY' });
    document.getElementById('hc-wm-details').innerHTML = `
        Aylık Enerji: ${monthlyKwh.toFixed(1)} kWh<br>
        Aylık Su: ${Math.round(monthlyWater)} Litre
    `;
    document.getElementById('hc-wm-result').classList.add('visible');
}

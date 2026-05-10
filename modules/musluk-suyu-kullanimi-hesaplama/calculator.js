function hcMuslukSuyuKullanımıHesapla() {
    const rate = parseFloat(document.getElementById('hc-tw-type').value);
    const duration = parseFloat(document.getElementById('hc-tw-duration').value);

    if (!duration) return;

    const totalLiters = rate * duration;
    
    // 2026 Su birim fiyatı tahmini: 25 TL / m3 (0.025 TL / Litre)
    const cost = totalLiters * 0.025;

    document.getElementById('hc-tw-val').innerText = Math.round(totalLiters).toLocaleString('tr-TR') + ' Litre';
    document.getElementById('hc-tw-cost').innerText = `Tahmini Maliyet: ${cost.toLocaleString('tr-TR', { style: 'currency', currency: 'TRY' })}`;
    document.getElementById('hc-tw-result').classList.add('visible');
}

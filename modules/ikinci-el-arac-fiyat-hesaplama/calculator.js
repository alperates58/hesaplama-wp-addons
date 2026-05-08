function hcUpHesapla() {
    const newPrice = parseFloat(document.getElementById('hc-up-new-price').value);
    const age = parseInt(document.getElementById('hc-up-age').value);
    const km = parseFloat(document.getElementById('hc-up-km').value);
    const condition = parseFloat(document.getElementById('hc-up-condition').value);

    if (isNaN(newPrice) || isNaN(age) || isNaN(km)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    // Depreciation
    let baseValue = newPrice;
    for (let i = 0; i < age; i++) {
        if (i === 0) baseValue *= 0.85; // 15% drop
        else baseValue *= 0.90; // 10% drop
    }

    // KM Penalty (Average 15.000 km per year)
    const avgKm = age * 15000;
    const diffKm = km - avgKm;
    if (diffKm > 0) {
        const kmPenalty = (diffKm / 10000) * 0.01; // 1% per 10k extra km
        baseValue *= (1 - kmPenalty);
    } else {
        const kmBonus = (Math.abs(diffKm) / 10000) * 0.005; // 0.5% bonus per 10k less km
        baseValue *= (1 + kmBonus);
    }

    const finalValue = baseValue * condition;

    document.getElementById('hc-up-val').innerText = finalValue.toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + " ₺";
    document.getElementById('hc-up-result').classList.add('visible');
}

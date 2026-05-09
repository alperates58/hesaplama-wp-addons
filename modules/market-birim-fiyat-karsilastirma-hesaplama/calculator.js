function hcUnitCompareHesapla() {
    const ap = parseFloat(document.getElementById('hc-ca-price').value) || 0;
    const aq = parseFloat(document.getElementById('hc-ca-qty').value) || 0;
    const bp = parseFloat(document.getElementById('hc-cb-price').value) || 0;
    const bq = parseFloat(document.getElementById('hc-cb-qty').value) || 0;

    if (aq <= 0 || bq <= 0) return;

    const unitA = ap / aq;
    const unitB = bp / bq;

    document.getElementById('hc-res-ca-unit').innerText = (unitA * 100).toFixed(4) + ' TL / 100 Birim';
    document.getElementById('hc-res-cb-unit').innerText = (unitB * 100).toFixed(4) + ' TL / 100 Birim';

    const badge = document.getElementById('hc-res-compare-winner');
    if (unitA < unitB) {
        badge.innerText = 'Ürün A Daha Avantajlı!';
        badge.style.background = '#27ae60';
    } else if (unitB < unitA) {
        badge.innerText = 'Ürün B Daha Avantajlı!';
        badge.style.background = '#27ae60';
    } else {
        badge.innerText = 'İkisi de Aynı Fiyat';
        badge.style.background = '#2980b9';
    }

    document.getElementById('hc-unit-compare-result').classList.add('visible');
}

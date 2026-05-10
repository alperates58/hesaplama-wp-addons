function hcHeaterCalcHesapla() {
    const vol = parseFloat(document.getElementById('hc-ht-vol').value);
    const deltaT = parseFloat(document.getElementById('hc-ht-temp').value);

    if (!vol || !deltaT) {
        alert('Lütfen hacim ve sıcaklık farkını giriniz.');
        return;
    }

    // Formula: Q = V * DeltaT * K
    // K is insulation factor (1.5 approx average)
    const Q = vol * deltaT * 1.5;
    const kW = Q / 860; // 1 kW = 860 kcal/h

    document.getElementById('hc-ht-res-val').innerText = Math.round(Q).toLocaleString('tr-TR');
    document.getElementById('hc-ht-res-kw').innerText = `Eşdeğer Güç: ${kW.toFixed(2)} kW`;

    document.getElementById('hc-heater-result').classList.add('visible');
}

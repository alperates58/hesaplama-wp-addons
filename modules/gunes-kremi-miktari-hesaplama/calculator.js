function hcGüneşKremiMiktarıHesapla() {
    const h = parseFloat(document.getElementById('hc-sk-height').value);
    const w = parseFloat(document.getElementById('hc-sk-weight').value);
    const checks = document.querySelectorAll('.hc-sk-area:checked');

    if (!h || !w || checks.length === 0) return;

    // Vücut yüzey alanı (DuBois formülü): BSA = 0.007184 * W^0.425 * H^0.725
    const bsa = 0.007184 * Math.pow(w, 0.425) * Math.pow(h, 0.725); // m2
    const bsaCm2 = bsa * 10000;

    let areaRatio = 0;
    checks.forEach(c => areaRatio += parseFloat(c.value));

    // Gereken klor (saf) = 2 mg / cm2
    const totalMg = bsaCm2 * areaRatio * 2;
    const totalMl = totalMg / 1000; // Yaklaşık yoğunluk 1g/ml

    document.getElementById('hc-sk-val').innerText = totalMl.toFixed(1) + ' ml';
    document.getElementById('hc-sk-result').classList.add('visible');
}

function hcWeldingCalcHesapla() {
    const L = parseFloat(document.getElementById('hc-wc-len').value);
    const a = parseFloat(document.getElementById('hc-wc-leg').value);
    const factor = parseFloat(document.getElementById('hc-wc-type').value);

    if (!L || !a) {
        alert('Lütfen tüm ölçüleri giriniz.');
        return;
    }

    // Weight approx = a^2 * L * density * factor
    // a in mm, L in m. Result in kg.
    // Factor for fillet weld is approx 0.8
    const totalWeight = (a * a * L * 0.00785 * factor) * 1.3; // 1.3 includes spatter/waste

    const resVal = document.getElementById('hc-wc-res-val');
    resVal.innerText = totalWeight.toFixed(2).toLocaleString('tr-TR');

    document.getElementById('hc-welding-result').classList.add('visible');
}

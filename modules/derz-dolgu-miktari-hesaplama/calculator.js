function hcGroutCalcHesapla() {
    const area = parseFloat(document.getElementById('hc-gc-area').value);
    const tw = parseFloat(document.getElementById('hc-gc-tw').value);
    const th = parseFloat(document.getElementById('hc-gc-th').value);
    const td = parseFloat(document.getElementById('hc-gc-td').value);
    const gw = parseFloat(document.getElementById('hc-gc-gw').value);

    if (!area || !tw || !th || !td || !gw) {
        alert('Lütfen tüm ölçüleri giriniz.');
        return;
    }

    // Formula: (A+B)/(AxB) x C x D x 1.5 = kg/m2
    // A: tile length (mm), B: tile width (mm), C: tile thickness (mm), D: grout width (mm)
    const A = tw * 10;
    const B = th * 10;
    const C = td;
    const D = gw;

    const consumptionPerSqM = ((A + B) / (A * B)) * C * D * 1.6; // 1.6 is density approx
    const totalWeight = area * consumptionPerSqM;

    const resVal = document.getElementById('hc-gc-res-val');
    resVal.innerText = totalWeight.toFixed(2).toLocaleString('tr-TR');

    document.getElementById('hc-grout-calc-result').classList.add('visible');
}

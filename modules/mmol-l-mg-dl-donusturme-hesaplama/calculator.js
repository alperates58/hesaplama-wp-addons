function hcBirimDönüştürmeHesapla() {
    const substance = document.getElementById('hc-uc-substance').value;
    const val = parseFloat(document.getElementById('hc-uc-val').value);
    const type = document.getElementById('hc-uc-type').value;

    if (!val) return;

    // Katsayılar: mg/dL = mmol/L * katsayi
    const factors = {
        glucose: 18.018,
        cholesterol: 38.67,
        triglyceride: 88.57,
        urea: 6.006
    };

    const factor = factors[substance];
    let res = 0, unit = "";

    if (type === 'mmol_to_mg') {
        res = val * factor;
        unit = " mg/dL";
    } else {
        res = val / factor;
        unit = " mmol/L";
    }

    document.getElementById('hc-uc-res').innerText = res.toFixed(2) + unit;
    document.getElementById('hc-uc-result').classList.add('visible');
}

function hcAbsiHesapla() {
    const wc = parseFloat(document.getElementById('hc-absi-waist').value);
    const height = parseFloat(document.getElementById('hc-absi-height').value);
    const weight = parseFloat(document.getElementById('hc-absi-weight').value);

    if (!wc || !height || !weight) return;

    const bmi = weight / (height * height);
    // Formula: ABSI = WC / (BMI^(2/3) * height^(1/2))
    const absi = wc / (Math.pow(bmi, 2/3) * Math.pow(height, 1/2));

    document.getElementById('hc-absi-res-val').innerText = absi.toFixed(4).toLocaleString('tr-TR');
    document.getElementById('hc-absi-result').classList.add('visible');
}

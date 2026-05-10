function hcAjbwHesapla() {
    const gender = document.getElementById('hc-ajbw-gender').value;
    const height = parseFloat(document.getElementById('hc-ajbw-height').value);
    const actual = parseFloat(document.getElementById('hc-ajbw-actual').value);

    if (!height || !actual) return;

    // Ideal Body Weight (Devine)
    const heightInches = height / 2.54;
    const over5Feet = heightInches - 60;
    let ibw = 0;
    if (gender === 'male') ibw = 50 + (2.3 * over5Feet);
    else ibw = 45.5 + (2.3 * over5Feet);

    // Adjusted Body Weight
    const ajbw = ibw + 0.4 * (actual - ibw);

    document.getElementById('hc-ajbw-res-val').innerText = ajbw.toFixed(1).toLocaleString('tr-TR');
    document.getElementById('hc-ajbw-result').classList.add('visible');
}

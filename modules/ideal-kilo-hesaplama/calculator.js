function hcIdealWeightHesapla() {
    const gender = document.querySelector('input[name="hc-iw-gender"]:checked').value;
    const height = parseFloat(document.getElementById('hc-iw-height').value);

    if (isNaN(height) || height < 120) {
        alert('Lütfen geçerli bir boy giriniz.');
        return;
    }

    const heightInches = (height / 2.54);
    const over5Feet = heightInches - 60;
    
    let idealWeight = 0;
    // Robinson Formula
    if (gender === 'male') {
        idealWeight = 52 + (1.9 * over5Feet);
    } else {
        idealWeight = 49 + (1.7 * over5Feet);
    }

    document.getElementById('hc-iw-res-val').innerText = idealWeight.toFixed(1).toLocaleString('tr-TR');
    document.getElementById('hc-ideal-weight-result').classList.add('visible');
}

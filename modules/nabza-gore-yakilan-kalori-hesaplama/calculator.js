function hcHRCaloriesHesapla() {
    const gender = document.getElementById('hc-hr-gender').value;
    const age = parseFloat(document.getElementById('hc-hr-age').value);
    const weight = parseFloat(document.getElementById('hc-hr-weight').value);
    const bpm = parseFloat(document.getElementById('hc-hr-bpm').value);
    const duration = parseFloat(document.getElementById('hc-hr-duration').value);

    if (!age || !weight || !bpm || !duration) {
        alert('Lütfen tüm alanları doldurunuz.');
        return;
    }

    let calories = 0;

    if (gender === 'male') {
        // Male: [(-55.0969 + (0.6309 x HR) + (0.1988 x W) + (0.2017 x A)) / 4.184] x T
        calories = ((-55.0969 + (0.6309 * bpm) + (0.1988 * weight) + (0.2017 * age)) / 4.184) * duration;
    } else {
        // Female: [(-20.4022 + (0.4472 x HR) - (0.1263 x W) + (0.074 x A)) / 4.184] x T
        calories = ((-20.4022 + (0.4472 * bpm) - (0.1263 * weight) + (0.074 * age)) / 4.184) * duration;
    }

    if (calories < 0) calories = 0;

    document.getElementById('hc-hr-res-val').innerText = calories.toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + ' kcal';
    document.getElementById('hc-hr-calories-result').classList.add('visible');
}

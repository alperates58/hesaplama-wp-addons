function hcIkizKiloHesapla() {
    const h = parseFloat(document.getElementById('hc-tp-height').value) / 100;
    const w = parseFloat(document.getElementById('hc-tp-weight').value);

    if (isNaN(h) || isNaN(w)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const bmi = w / (h * h);
    let target = "";

    if (bmi < 18.5) {
        target = "En az 22 - 28 kg";
    } else if (bmi < 25) {
        target = "17 - 25 kg";
    } else if (bmi < 30) {
        target = "14 - 23 kg";
    } else {
        target = "11 - 19 kg";
    }

    document.getElementById('hc-tp-value').innerText = target;
    document.getElementById('hc-twin-preg-weight-result').classList.add('visible');
}

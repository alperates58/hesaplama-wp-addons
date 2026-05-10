function hcFcToggleHip() {
    const gender = document.querySelector('input[name="hc-fc-gender"]:checked').value;
    document.getElementById('hc-fc-hip-group').style.display = (gender === 'female') ? 'block' : 'none';
}

function hcFatCalcHesapla() {
    const gender = document.querySelector('input[name="hc-fc-gender"]:checked').value;
    const height = parseFloat(document.getElementById('hc-fc-height').value);
    const neck = parseFloat(document.getElementById('hc-fc-neck').value);
    const waist = parseFloat(document.getElementById('hc-fc-waist').value);
    const hip = parseFloat(document.getElementById('hc-fc-hip').value) || 0;

    if (!height || !neck || !waist || (gender === 'female' && !hip)) {
        alert('Lütfen tüm ölçümleri giriniz.');
        return;
    }

    let fatPercent = 0;
    if (gender === 'male') {
        // Navy Formula for Men: 495 / (1.0324 - 0.19077 * log10(waist - neck) + 0.15456 * log10(height)) - 450
        fatPercent = 495 / (1.0324 - 0.19077 * Math.log10(waist - neck) + 0.15456 * Math.log10(height)) - 450;
    } else {
        // Navy Formula for Women: 495 / (1.29579 - 0.35004 * log10(waist + hip - neck) + 0.22100 * log10(height)) - 450
        fatPercent = 495 / (1.29579 - 0.35004 * Math.log10(waist + hip - neck) + 0.22100 * Math.log10(height)) - 450;
    }

    const resVal = document.getElementById('hc-fc-res-val');
    const resDesc = document.getElementById('hc-fc-res-desc');

    resVal.innerText = fatPercent.toFixed(1).toLocaleString('tr-TR');

    if (gender === 'male') {
        if (fatPercent < 6) resDesc.innerText = 'Esansiyel Yağ';
        else if (fatPercent < 14) resDesc.innerText = 'Sporcu';
        else if (fatPercent < 18) resDesc.innerText = 'Fit';
        else if (fatPercent < 25) resDesc.innerText = 'Ortalama';
        else resDesc.innerText = 'Obezite Riski';
    } else {
        if (fatPercent < 14) resDesc.innerText = 'Esansiyel Yağ';
        else if (fatPercent < 21) resDesc.innerText = 'Sporcu';
        else if (fatPercent < 25) resDesc.innerText = 'Fit';
        else if (fatPercent < 32) resDesc.innerText = 'Ortalama';
        else resDesc.innerText = 'Obezite Riski';
    }

    document.getElementById('hc-fat-calc-result').classList.add('visible');
}

function hcToggleBfHip() {
    const gender = document.querySelector('input[name="hc-bf-gender"]:checked').value;
    document.getElementById('hc-bf-hip-box').style.display = (gender === 'female') ? 'block' : 'none';
}

function hcBfHesapla() {
    const gender = document.querySelector('input[name="hc-bf-gender"]:checked').value;
    const boy = parseFloat(document.getElementById('hc-bf-boy').value);
    const neck = parseFloat(document.getElementById('hc-bf-neck').value);
    const waist = parseFloat(document.getElementById('hc-bf-waist').value);
    const hip = parseFloat(document.getElementById('hc-bf-hip').value) || 0;

    if (isNaN(boy) || isNaN(neck) || isNaN(waist)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    let bf = 0;
    // Navy Formula (using cm)
    if (gender === 'male') {
        // 495 / (1.0324 - 0.19077 * log10(waist - neck) + 0.15456 * log10(height)) - 450
        bf = 495 / (1.0324 - 0.19077 * Math.log10(waist - neck) + 0.15456 * Math.log10(boy)) - 450;
    } else {
        if (isNaN(hip) || hip <= 0) { alert('Lütfen kalça ölçüsünü giriniz.'); return; }
        // 495 / (1.29579 - 0.35004 * log10(waist + hip - neck) + 0.22100 * log10(height)) - 450
        bf = 495 / (1.29579 - 0.35004 * Math.log10(waist + hip - neck) + 0.221 * Math.log10(boy)) - 450;
    }

    document.getElementById('hc-res-bf-val').innerText = bf.toLocaleString('tr-TR', { maximumFractionDigits: 1 });

    let info = '';
    if (gender === 'male') {
        if (bf < 6) info = 'Esansiyel Yağ';
        else if (bf < 14) info = 'Atletik';
        else if (bf < 18) info = 'Fit';
        else if (bf < 25) info = 'Normal';
        else info = 'Obezite Riski';
    } else {
        if (bf < 14) info = 'Esansiyel Yağ';
        else if (bf < 21) info = 'Atletik';
        else if (bf < 25) info = 'Fit';
        else if (bf < 32) info = 'Normal';
        else info = 'Obezite Riski';
    }

    document.getElementById('hc-res-bf-info').innerText = info;
    document.getElementById('hc-bf-result').classList.add('visible');
}

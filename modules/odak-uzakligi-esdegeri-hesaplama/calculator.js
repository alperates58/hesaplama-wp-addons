function hcOdakUzakligiEsdegeriGuncelle() {
    var sensor = document.getElementById('hc-eqf-sensor').value;
    var customGroup = document.getElementById('hc-eqf-custom-group');
    if (sensor === 'custom') {
        customGroup.style.display = 'block';
    } else {
        customGroup.style.display = 'none';
    }
}

function hcOdakUzakligiEsdegeriHesapla() {
    var focal = parseFloat(document.getElementById('hc-eqf-focal').value);
    var sensorVal = document.getElementById('hc-eqf-sensor').value;
    var crop = 1.0;
    
    if (sensorVal === 'custom') {
        crop = parseFloat(document.getElementById('hc-eqf-crop').value);
    } else {
        crop = parseFloat(sensorVal);
    }
    
    if (isNaN(focal) || isNaN(crop) || focal <= 0 || crop <= 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }
    
    var eqFocal = focal * crop;
    
    document.getElementById('hc-eqf-factor-val').innerText = crop.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + 'x';
    document.getElementById('hc-eqf-result-val').innerText = Math.round(eqFocal).toLocaleString('tr-TR') + ' mm';
    
    document.getElementById('hc-odak-uzakligi-esdegeri-hesaplama-result').classList.add('visible');
}

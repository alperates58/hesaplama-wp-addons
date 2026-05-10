function hcThermCalibHesapla() {
    const reading = parseFloat(document.getElementById('hc-tc-reading').value);

    if (isNaN(reading)) {
        alert('Lütfen ölçülen değeri giriniz.');
        return;
    }

    const error = reading - 0; // Buzlu su ideal 0°C'dir

    document.getElementById('hc-tc-val').innerText = (error > 0 ? '+' : '') + error.toFixed(1) + ' °C';
    
    let info = '';
    if (Math.abs(error) <= 1) info = 'Termometreniz hassas ve güvenilirdir.';
    else info = 'Termometrenizde belirgin sapma var. Ayarlanabiliyorsa sıfırlayın veya ölçümlerde bu farkı dikkate alın.';

    document.getElementById('hc-tc-info').innerText = info;
    document.getElementById('hc-therm-calib-result').classList.add('visible');
}

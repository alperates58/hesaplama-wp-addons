function hcAccHesapla() {
    const hp = parseFloat(document.getElementById('hc-acc-hp').value);
    const kg = parseFloat(document.getElementById('hc-acc-kg').value);
    const drive = parseFloat(document.getElementById('hc-acc-drive').value);

    if (isNaN(hp) || isNaN(kg) || hp === 0) {
        alert('Lütfen tüm değerleri girin.');
        return;
    }

    // Heuristic Power-to-Weight to 0-100 conversion
    // t = (kg/hp) * 0.9 * driveFactor
    let time = (kg / hp) * 0.85 * drive;
    
    // Limits
    if (time < 2.0) time = 2.0; 

    document.getElementById('hc-acc-val').innerText = time.toFixed(1) + " saniye";
    document.getElementById('hc-acc-result').classList.add('visible');
}

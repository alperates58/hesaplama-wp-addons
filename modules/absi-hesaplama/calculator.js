function hcAbsiHesapla() {
    const boyCm = parseFloat(document.getElementById('hc-absi-boy').value);
    const boyM = boyCm / 100;
    const kilo = parseFloat(document.getElementById('hc-absi-kilo').value);
    const belCm = parseFloat(document.getElementById('hc-absi-bel').value);
    const belM = belCm / 100;

    if (isNaN(boyM) || isNaN(kilo) || isNaN(belM) || boyM <= 0) {
        alert('Lütfen tüm değerleri doğru giriniz.');
        return;
    }

    const bmi = kilo / (boyM * boyM);
    
    // ABSI = Waist / (BMI^(2/3) * Height^(1/2))
    const absi = belM / (Math.pow(bmi, 2/3) * Math.pow(boyM, 1/2));

    document.getElementById('hc-res-absi-val').innerText = absi.toLocaleString('tr-TR', { 
        minimumFractionDigits: 5,
        maximumFractionDigits: 5 
    });

    document.getElementById('hc-absi-result').classList.add('visible');
}

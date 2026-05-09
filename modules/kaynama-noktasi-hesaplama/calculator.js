function hcKNIHesapla() {
    const altitude = parseFloat(document.getElementById('hc-kni-alt').value);

    if (isNaN(altitude)) {
        alert('Lütfen rakım değerini giriniz.');
        return;
    }

    // Boiling point of water decreases by about 1°C for every 300 meters
    // T = 100 - (altitude / 300)
    const bp = 100 - (altitude / 284); // 284 is more accurate for lower altitudes

    document.getElementById('hc-kni-val').innerText = bp.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' °C';
    document.getElementById('hc-kni-result').classList.add('visible');
}

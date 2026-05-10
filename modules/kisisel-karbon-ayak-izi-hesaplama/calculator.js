function hcKişiselKarbonAyakİziHesapla() {
    const house = parseFloat(document.getElementById('hc-pc-house').value) || 1;
    const carKm = parseFloat(document.getElementById('hc-pc-car').value) || 0;
    const flights = parseFloat(document.getElementById('hc-pc-flights').value) || 0;
    const dietFactor = parseFloat(document.getElementById('hc-pc-meat').value);

    // Evsel enerji ortalaması (Türkiye): ~2 ton / hane
    const houseCo2 = (2000 / house);
    const carCo2 = carKm * 0.17;
    const flightCo2 = flights * 250; // Kısa mesafe uçuş ~250kg
    const dietCo2 = dietFactor * 1000;

    const total = houseCo2 + carCo2 + flightCo2 + dietCo2;

    document.getElementById('hc-pc-val').innerText = (total / 1000).toFixed(2) + ' Ton CO₂e';
    document.getElementById('hc-pc-result').classList.add('visible');
}

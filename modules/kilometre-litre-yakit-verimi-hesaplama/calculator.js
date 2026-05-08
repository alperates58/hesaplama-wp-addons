function hcKmlHesapla() {
    const dist = parseFloat(document.getElementById('hc-kml-dist').value);
    const fuel = parseFloat(document.getElementById('hc-kml-fuel').value);

    if (isNaN(dist) || isNaN(fuel) || fuel === 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    const kml = dist / fuel;
    const l100 = 100 / kml;

    document.getElementById('hc-kml-val').innerText = kml.toFixed(2) + " km/L";
    document.getElementById('hc-kml-conv').innerText = "Bu değer " + l100.toFixed(1) + " L/100km tüketimine eşittir.";

    document.getElementById('hc-kml-result').classList.add('visible');
}

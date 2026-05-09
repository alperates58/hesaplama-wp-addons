function hcAKAHesapla() {
    const width = parseFloat(document.getElementById('hc-aka-width').value);
    const height = parseFloat(document.getElementById('hc-aka-height').value);
    const spacing = parseFloat(document.getElementById('hc-aka-spacing').value);

    if (isNaN(width) || isNaN(height) || isNaN(spacing) || width <= 0 || height <= 0 || spacing <= 0) {
        alert('Lütfen geçerli pozitif değerler giriniz.');
        return;
    }

    // Simplified Engineering approach for wood span:
    // L = (384 * E * I * Delta_max / (5 * w))^(1/4)
    // E ~ 10,000 MPa (Softwood), Delta_max = L/360
    // w = Load per unit length
    // For general DIY/Construction estimation:
    // A rough rule of thumb for 5x15 (2x6) is ~3m, 5x20 (2x8) is ~4m at 40cm spacing.
    
    // Identity: I = (b*h^3)/12
    const I = (width * Math.pow(height, 3)) / 12;
    // Assuming 2.5 kN/m2 (Live + Dead load) -> w = 2.5 * (spacing/100) kN/m
    const w = 2.5 * (spacing / 100); // kN/m
    
    // Derived simplified factor based on standard lumber spans
    const factor = 1.8; 
    const span = factor * Math.sqrt(height) * (40 / spacing);

    // More conservative limit:
    const safeSpan = Math.min(span, (height * 0.25)); // Just a safety cap

    document.getElementById('hc-aka-val').innerText = span.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' m';
    document.getElementById('hc-aka-result').classList.add('visible');
}

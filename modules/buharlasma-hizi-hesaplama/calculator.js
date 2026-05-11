function hcBuharlasmaHesapla() {
    const T = parseFloat(document.getElementById('hc-bh-temp').value);
    const H = parseFloat(document.getElementById('hc-bh-hum').value) / 100;
    const v = parseFloat(document.getElementById('hc-bh-wind').value);
    const A = parseFloat(document.getElementById('hc-bh-alan').value);

    if (isNaN(T) || isNaN(H) || isNaN(v) || isNaN(A)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    // es (Saturation Vapor Pressure) kPa using Tetens formula
    const es = 0.61078 * Math.exp((17.27 * T) / (T + 237.3));
    const ea = es * H;

    // Simplified Carrier Equation for kg/m2.h
    // E = (0.015 + 0.015 * v) * (es - ea) in mmHg unit mostly, but let's adjust for kPa
    // Conversion: 1 kPa = 7.5006 mmHg
    const deltaP_mmHg = (es - ea) * 7.5006;
    const E = (0.015 + 0.015 * v) * deltaP_mmHg; // kg/m2.h

    const toplamE = E * A;

    document.getElementById('hc-bh-res-kgh').innerText = toplamE.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' kg/saat';
    document.getElementById('hc-bh-res-lh').innerText = toplamE.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' Litre/saat';
    
    document.getElementById('hc-bh-result').classList.add('visible');
}

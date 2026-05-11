function hcPistonHizHesapla() {
    const stroke_mm = parseFloat(document.getElementById('hc-ph-stroke').value);
    const rpm = parseFloat(document.getElementById('hc-ph-rpm').value);

    if (isNaN(stroke_mm) || isNaN(rpm) || rpm <= 0 || stroke_mm <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    // v = (2 * Stroke * RPM) / 60
    // Stroke [m] = stroke_mm / 1000
    const stroke_m = stroke_mm / 1000;
    const v = (2 * stroke_m * rpm) / 60;

    document.getElementById('hc-ph-res-total').innerText = v.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    document.getElementById('hc-ph-result').classList.add('visible');
}

function hcGsHesapla() {
    const rpm = parseFloat(document.getElementById('hc-gs-rpm').value);
    const ratio = parseFloat(document.getElementById('hc-gs-ratio').value);
    const final = parseFloat(document.getElementById('hc-gs-final').value);
    const dia = parseFloat(document.getElementById('hc-gs-tire').value);

    if (isNaN(rpm) || ratio === 0 || final === 0) {
        alert('Lütfen geçerli oranlar girin.');
        return;
    }

    const circ = dia * Math.PI; // mm
    // Speed (km/h) = (RPM * Circ_mm * 60) / (Ratio * Final * 1,000,000)
    const speed = (rpm * circ * 60) / (ratio * final * 1000000);

    document.getElementById('hc-gs-val').innerText = speed.toFixed(1) + " km/h";
    document.getElementById('hc-gs-result').classList.add('visible');
}

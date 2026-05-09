function hcMshHesapla() {
    const hp = parseFloat(document.getElementById('hc-msh-hp').value);
    const cd = parseFloat(document.getElementById('hc-msh-cd').value);
    const area = parseFloat(document.getElementById('hc-msh-area').value);

    if (isNaN(hp) || isNaN(cd) || isNaN(area)) {
        alert('Lütfen tüm değerleri girin.');
        return;
    }

    const rho = 1.225; // Air density
    const powerWatts = hp * 745.7 * 0.85; // 85% efficiency
    
    // v = ( (2 * P) / (rho * Cd * A) ) ^ (1/3)
    const velocityMs = Math.pow((2 * powerWatts) / (rho * cd * area), 1/3);
    const velocityKmh = velocityMs * 3.6;

    document.getElementById('hc-msh-val').innerText = Math.round(velocityKmh) + " km/h";
    document.getElementById('hc-msh-result').classList.add('visible');
}

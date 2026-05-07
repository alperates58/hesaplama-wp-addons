function hcGazMolarKutleHesapla() {
    const mass = parseFloat(document.getElementById('hc-gas-mass').value);
    const press = parseFloat(document.getElementById('hc-gas-press').value);
    const vol = parseFloat(document.getElementById('hc-gas-vol').value);
    const tempC = parseFloat(document.getElementById('hc-gas-temp').value);

    if (isNaN(mass) || isNaN(press) || isNaN(vol) || isNaN(tempC) || mass <= 0 || press <= 0 || vol <= 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    const R = 0.082057; // L·atm/(mol·K)
    const tempK = tempC + 273.15; // Kelvin

    // MA = (m * R * T) / (P * V)
    const ma = (mass * R * tempK) / (press * vol);

    document.getElementById('hc-res-gas-ma-val').innerText = ma.toLocaleString('tr-TR', { 
        minimumFractionDigits: 2, 
        maximumFractionDigits: 2 
    });

    document.getElementById('hc-gas-result').classList.add('visible');
    document.getElementById('hc-gas-result').scrollIntoView({ behavior: 'smooth', block: 'nearest' });
}

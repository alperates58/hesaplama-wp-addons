function hcCozmeSuresiHesapla() {
    const thk = parseFloat(document.getElementById('hc-cs-thk').value);
    const methodFactor = parseFloat(document.getElementById('hc-cs-method').value);

    if (isNaN(thk) || thk <= 0) {
        alert('Lütfen geçerli bir kalınlık girin.');
        return;
    }

    // Empirical formula: t (saat) = Factor * (Thickness^1.5) / 10
    // This is a rough estimation for educational purposes.
    const tHr = methodFactor * Math.pow(thk, 1.2) / 5;

    const hr = Math.floor(tHr);
    const min = Math.round((tHr - hr) * 60);

    document.getElementById('hc-cs-res-val').innerText = hr + ' saat ' + min + ' dk';
    
    document.getElementById('hc-cs-result').classList.add('visible');
}

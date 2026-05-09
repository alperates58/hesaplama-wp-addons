function hcDYHesapla() {
    const hKm = parseFloat(document.getElementById('hc-dy-alt').value);

    if (isNaN(hKm) || hKm < 0) {
        alert('Lütfen geçerli bir irtifa giriniz.');
        return;
    }

    const GM = 3.986004418e14; // Earth's gravitational parameter
    const R = 6371000; // Earth's radius in meters
    const h = hKm * 1000;
    const r = R + h;

    const v = Math.sqrt(GM / r);
    const period = (2 * Math.PI * r) / v;

    document.getElementById('hc-dy-speed').innerText = (v * 3.6).toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + ' km/s';
    
    const minutes = Math.floor(period / 60);
    const seconds = Math.round(period % 60);
    document.getElementById('hc-dy-period').innerText = minutes + ' dk ' + seconds + ' sn';
    
    document.getElementById('hc-dy-result').classList.add('visible');
}

function hcENHesapla() {
    const p = parseFloat(document.getElementById('hc-en-p').value);
    const t = parseFloat(document.getElementById('hc-en-t').value);

    if (isNaN(p) || isNaN(t) || p < 0 || t < 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    // E = P * t (Watt * hours)
    const wh = p * t;
    const kwh = wh / 1000;
    
    // Joule = Watt * seconds
    const joule = p * (t * 3600);

    document.getElementById('hc-en-kwh').innerText = kwh.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' kWh';
    document.getElementById('hc-en-joule').innerText = joule.toExponential(4) + ' J';
    
    document.getElementById('hc-en-result').classList.add('visible');
}

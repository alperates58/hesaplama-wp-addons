function hcPacemakerLifeHesapla() {
    const capMah = parseFloat(document.getElementById('hc-pl-cap').value);
    const currentUa = parseFloat(document.getElementById('hc-pl-current').value);

    if (isNaN(capMah) || isNaN(currentUa) || currentUa <= 0) {
        alert('Lütfen geçerli kapasite ve akım değerleri girin.');
        return;
    }

    // Convert mAh to uAh: mAh * 1000
    const capUah = capMah * 1000;
    
    // Life (Hours) = Capacity (uAh) / Current (uA)
    const lifeHours = capUah / currentUa;
    
    // Life (Years) = Hours / (24 * 365)
    const lifeYears = lifeHours / 8760;

    document.getElementById('hc-pl-res-val').innerText = lifeYears.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' Yıl';
    
    document.getElementById('hc-pl-result').classList.add('visible');
}

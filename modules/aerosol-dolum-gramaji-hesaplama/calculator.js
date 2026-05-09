function hcAerosolHesapla() {
    const vol = parseFloat(document.getElementById('hc-ad-vol').value);
    const density = parseFloat(document.getElementById('hc-ad-density').value);
    const fillPct = parseFloat(document.getElementById('hc-ad-fill-pct').value);
    const gasPct = parseFloat(document.getElementById('hc-ad-gas-pct').value);

    if (isNaN(vol) || isNaN(density) || isNaN(fillPct) || isNaN(gasPct)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    // Konsantre hacmi
    const concVol = vol * (fillPct / 100);
    // Konsantre ağırlığı
    const concMass = concVol * density;
    // Gaz ağırlığı (genellikle toplam hacmin bir yüzdesi olarak hesaplanır veya sabit gramajdır)
    // Uygulamada gaz oranı genellikle toplam ağırlık içindeki yüzdedir veya hacimseldir.
    // Burada hacimsel dolum üzerinden basitleştirilmiş bir model kullanalım:
    const gasMass = (vol * (gasPct / 100)) * 0.55; // LPG/İtici gaz yoğunluğu yaklaşık 0.55 g/ml

    const totalMass = concMass + gasMass;

    document.getElementById('hc-ad-conc-val').innerText = concMass.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' g';
    document.getElementById('hc-ad-gas-val').innerText = gasMass.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' g';
    document.getElementById('hc-ad-total-val').innerText = totalMass.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' g';
    
    document.getElementById('hc-ad-result').classList.add('visible');
}

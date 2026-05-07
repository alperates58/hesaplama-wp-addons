function hcSwitchEcoTab(btn, panelId) {
    document.querySelectorAll('.hc-eco-tab').forEach(b => b.classList.remove('active'));
    document.querySelectorAll('.hc-eco-panel').forEach(p => p.classList.remove('active'));
    
    btn.classList.add('active');
    document.getElementById('hc-eco-' + panelId).classList.add('active');
}

function hcEcoHesapla() {
    const elec = parseFloat(document.getElementById('hc-eco-elec').value) || 0;
    const gas = parseFloat(document.getElementById('hc-eco-gas').value) || 0;
    const fuel = parseFloat(document.getElementById('hc-eco-fuel').value) || 0;
    const flight = parseFloat(document.getElementById('hc-eco-flight').value) || 0;
    const diet = document.getElementById('hc-eco-diet').value;

    // Yıllık emisyon hesaplama (kg CO2)
    // Katsayılar yaklaşık değerlerdir (TR ortalaması baz alınmıştır)
    let totalKg = 0;

    // Ev Enerjisi (Aylık -> Yıllık)
    totalKg += elec * 12 * 0.45;  // 0.45 kg/kWh
    totalKg += gas * 12 * 2.0;    // 2.0 kg/m3

    // Ulaşım (Aylık -> Yıllık)
    totalKg += fuel * 12 * 2.45;  // Ortalama benzin/dizel 2.45 kg/L
    totalKg += flight * 150;      // Ortalama saatlik uçuş 150kg CO2

    // Yaşam Tarzı (Yıllık ek yükler)
    const dietFactors = {
        'heavy': 2500,
        'medium': 1500,
        'low': 800,
        'veg': 400
    };
    totalKg += dietFactors[diet];

    const tonnes = totalKg / 1000;
    // Ortalama bir ağaç yılda 22kg CO2 emer
    const trees = Math.ceil(totalKg / 22);

    document.getElementById('hc-res-co2-val').innerText = tonnes.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    document.getElementById('hc-res-trees').innerText = trees.toLocaleString('tr-TR');

    document.getElementById('hc-eco-result').classList.add('visible');
    document.getElementById('hc-eco-result').scrollIntoView({ behavior: 'smooth', block: 'nearest' });
}

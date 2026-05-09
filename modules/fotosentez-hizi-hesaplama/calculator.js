function hcFotosentezHesapla() {
    const light = parseFloat(document.getElementById('hc-photo-light').value);
    const co2 = parseFloat(document.getElementById('hc-photo-co2').value);
    const temp = parseFloat(document.getElementById('hc-photo-temp').value);

    if (isNaN(light) || isNaN(co2) || isNaN(temp) || light < 0 || co2 < 0) {
        alert('Lütfen geçerli pozitif değerler giriniz.');
        return;
    }

    // Simplified saturation model
    const lightEffect = light / (light + 200); // K_light = 200
    const co2Effect = co2 / (co2 + 300); // K_co2 = 300
    
    // Temperature effect (Bell curve centered at 25C)
    const tempEffect = Math.max(0, 1 - Math.pow((temp - 25) / 20, 2));

    const relativeRate = lightEffect * co2Effect * tempEffect * 100;

    document.getElementById('hc-photo-val').innerText = '%' + relativeRate.toLocaleString('tr-TR', { maximumFractionDigits: 1 });
    
    let note = "";
    if (relativeRate < 20) note = "Düşük fotosentez hızı. Sınırlayıcı faktörleri kontrol edin.";
    else if (relativeRate < 60) note = "Orta seviye fotosentez hızı.";
    else note = "Yüksek fotosentez verimi.";

    document.getElementById('hc-photo-note').innerText = note;
    document.getElementById('hc-photo-result').classList.add('visible');
}

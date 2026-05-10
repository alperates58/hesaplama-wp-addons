function hcSporSırasındaSuİhtiyacıHesapla() {
    const weight = parseFloat(document.getElementById('hc-water-weight').value);
    const duration = parseFloat(document.getElementById('hc-water-dur').value);
    const factor = parseFloat(document.getElementById('hc-water-intensity').value);

    if (!weight || !duration) return;

    // Basit bir model: Saatlik 500ml-1500ml arası terleme
    const totalLitres = (duration / 60) * factor;

    document.getElementById('hc-water-val').innerText = totalLitres.toFixed(2) + ' Litre';
    
    let tips = `<strong>Tüketim Rehberi:</strong><br>`;
    tips += `- Antrenman öncesi: 400-600 ml<br>`;
    tips += `- Antrenman sırasında: Her 15-20 dakikada 150-250 ml<br>`;
    tips += `- Antrenman sonrası: Kaybedilen her 1 kg için 1.5 litre su.`;

    document.getElementById('hc-water-tips').innerHTML = tips;
    document.getElementById('hc-water-result').classList.add('visible');
}

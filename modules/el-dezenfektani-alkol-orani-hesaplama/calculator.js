function hcEDHesapla() {
    const v2 = parseFloat(document.getElementById('hc-ed-v2').value);
    const c2 = parseFloat(document.getElementById('hc-ed-c2').value);
    const c1 = parseFloat(document.getElementById('hc-ed-c1').value);

    if (isNaN(v2) || isNaN(c2) || isNaN(c1)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    if (c1 <= c2) {
        alert('Eldeki alkol oranı istenen orandan büyük olmalıdır.');
        return;
    }

    // V1 = (V2 * C2) / C1
    const v1 = (v2 * c2) / c1;
    const vWater = v2 - v1;

    document.getElementById('hc-ed-alkol').innerText = v1.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' ml';
    document.getElementById('hc-ed-su').innerText = vWater.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' ml';
    
    document.getElementById('hc-ed-result').classList.add('visible');
}

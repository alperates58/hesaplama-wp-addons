function hcCakePanSizeHesapla() {
    const shape = document.getElementById('hc-pan-shape').value;
    const height = parseFloat(document.getElementById('hc-pan-height').value);
    
    let volumeCm3 = 0;

    if (shape === 'circle') {
        const diam = parseFloat(document.getElementById('hc-pan-diam').value);
        if (isNaN(diam) || isNaN(height)) { alert('Eksik bilgi girdiniz.'); return; }
        volumeCm3 = Math.PI * Math.pow(diam / 2, 2) * height;
    } else {
        const w = parseFloat(document.getElementById('hc-pan-width').value);
        const l = parseFloat(document.getElementById('hc-pan-length').value);
        if (isNaN(w) || isNaN(l) || isNaN(height)) { alert('Eksik bilgi girdiniz.'); return; }
        volumeCm3 = w * l * height;
    }

    const volumeLitre = volumeCm3 / 1000;
    // Ortalama bir porsiyon kek ~150-200ml hacim kaplar
    const servings = volumeCm3 / 180;

    document.getElementById('hc-pan-volume').innerText = volumeLitre.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' Litre';
    document.getElementById('hc-pan-servings').innerText = `Tahmini ${Math.floor(servings)} - ${Math.ceil(servings)} kişilik porsiyon için uygundur.`;
    
    document.getElementById('hc-cake-pan-size-result').classList.add('visible');
}

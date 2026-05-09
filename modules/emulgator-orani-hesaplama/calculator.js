function hcEOHesapla() {
    const target = parseFloat(document.getElementById('hc-eo-target').value);
    const h1 = parseFloat(document.getElementById('hc-eo-h1').value);
    const h2 = parseFloat(document.getElementById('hc-eo-h2').value);

    if (isNaN(target) || isNaN(h1) || isNaN(h2)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    if (h1 === h2) {
        alert('HLB değerleri farklı olmalıdır.');
        return;
    }

    // %A = (HLB_target - HLB_B) / (HLB_A - HLB_B) * 100
    const perc1 = ((target - h2) / (h1 - h2)) * 100;
    const perc2 = 100 - perc1;

    if (perc1 < 0 || perc1 > 100) {
        alert('Hedef HLB, seçilen emülgatörlerin HLB değerleri arasında olmalıdır.');
        return;
    }

    document.getElementById('hc-eo-res1').innerText = '%' + perc1.toLocaleString('tr-TR', { maximumFractionDigits: 1 });
    document.getElementById('hc-eo-res2').innerText = '%' + perc2.toLocaleString('tr-TR', { maximumFractionDigits: 1 });
    
    document.getElementById('hc-eo-result').classList.add('visible');
}

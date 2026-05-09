function hcALCHesapla() {
    const area = parseFloat(document.getElementById('hc-alc-area').value);
    const waste = parseFloat(document.getElementById('hc-alc-waste').value) || 0;

    if (isNaN(area) || area <= 0) {
        alert('Lütfen geçerli bir alan giriniz.');
        return;
    }

    const totalArea = area * (1 + waste / 100);
    
    // Standard board is 1.2m * 2.5m = 3m2
    const boards = Math.ceil(totalArea / 3);
    
    // Profiles estimation: Roughly 3.5m of profiles per m2 of drywall
    const profiles = area * 3.5;

    document.getElementById('hc-alc-boards').innerText = boards.toLocaleString('tr-TR') + ' Adet';
    document.getElementById('hc-alc-profiles').innerText = profiles.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' m';
    
    document.getElementById('hc-alc-result').classList.add('visible');
}

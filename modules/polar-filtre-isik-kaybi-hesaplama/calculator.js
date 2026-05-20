function hcPolarFiltreIsikKaybiHesapla() {
    var filterType = document.getElementById('hc-polar-filtre-type').value;
    var originalAperture = parseFloat(document.getElementById('hc-polar-original-aperture').value);

    if (isNaN(originalAperture) || originalAperture <= 0) {
        alert('Lütfen geçerli bir diyafram giriniz.');
        return;
    }

    var transmission;
    switch(filterType) {
        case 'linear':
            transmission = 0.40; // 60% kaybı = 40% geçirme
            break;
        case 'circular':
            transmission = 0.73; // ~27% kaybı = 73% geçirme (ortalama)
            break;
        case 'hd':
            transmission = 0.85; // 15% kaybı = 85% geçirme
            break;
        default:
            transmission = 0.73;
    }

    // dB kaybı = 10 * log10(transmission)
    var lossDb = -10 * Math.log10(transmission);

    // Stops kaybı = log2(1 / transmission)
    var lossStops = Math.log2(1 / transmission);

    // Eşdeğer f/stop = orijinal f × sqrt(1/transmission)
    var equivalentF = originalAperture * Math.sqrt(1 / transmission);

    var transmissionStr = (transmission * 100).toLocaleString('tr-TR', { minimumFractionDigits: 0, maximumFractionDigits: 0 }) + '%';
    var lossDbStr = lossDb.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' dB';
    var lossStopsStr = lossStops.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    var equivalentFStr = 'f/' + equivalentF.toLocaleString('tr-TR', { minimumFractionDigits: 1, maximumFractionDigits: 1 });

    document.getElementById('hc-polar-transmission-val').innerText = transmissionStr;
    document.getElementById('hc-polar-loss-db-val').innerText = lossDbStr;
    document.getElementById('hc-polar-loss-stops-val').innerText = lossStopsStr;
    document.getElementById('hc-polar-equivalent-f-val').innerText = equivalentFStr;

    document.getElementById('hc-polar-filtre-isik-kaybi-hesaplama-result').classList.add('visible');
}

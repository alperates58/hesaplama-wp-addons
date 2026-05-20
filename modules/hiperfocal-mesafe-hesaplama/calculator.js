function hcHiperfocalCoCGuncelle() {
    var sensor = document.getElementById('hc-hfd-sensor').value;
    var customGroup = document.getElementById('hc-hfd-custom-coc-group');
    if (sensor === 'custom') {
        customGroup.style.display = 'block';
    } else {
        customGroup.style.display = 'none';
    }
}

function hcHiperfocalHesapla() {
    var sensorVal = document.getElementById('hc-hfd-sensor').value;
    var coc = 0.020;
    
    if (sensorVal === 'custom') {
        coc = parseFloat(document.getElementById('hc-hfd-custom-coc').value);
    } else {
        coc = parseFloat(sensorVal);
    }
    
    var f = parseFloat(document.getElementById('hc-hfd-focal').value); // mm
    var N = parseFloat(document.getElementById('hc-hfd-aperture').value); // f/stop
    
    if (isNaN(coc) || isNaN(f) || isNaN(N) || coc <= 0 || f <= 0 || N <= 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }
    
    // H approx = f^2 / (N * c) -> mm cinsinden
    var hApproxMm = Math.pow(f, 2) / (N * coc);
    // H exact = f^2 / (N * c) + f -> mm cinsinden
    var hExactMm = hApproxMm + f;
    
    // Metreye çevir
    var hApproxM = hApproxMm / 1000;
    var hExactM = hExactMm / 1000;
    var nearM = hExactM / 2; // H / 2
    
    document.getElementById('hc-hfd-coc-val').innerText = coc.toLocaleString('tr-TR', { minimumFractionDigits: 3, maximumFractionDigits: 3 }) + ' mm';
    document.getElementById('hc-hfd-approx-val').innerText = hApproxM.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' m';
    document.getElementById('hc-hfd-exact-val').innerText = hExactM.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' m';
    document.getElementById('hc-hfd-near-val').innerText = nearM.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' m';
    
    document.getElementById('hc-hiperfocal-mesafe-hesaplama-result').classList.add('visible');
}

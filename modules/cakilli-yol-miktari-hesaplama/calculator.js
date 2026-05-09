function hcCYMHesapla() {
    const l = parseFloat(document.getElementById('hc-cym-length').value);
    const w = parseFloat(document.getElementById('hc-cym-width').value);
    const d = parseFloat(document.getElementById('hc-cym-depth').value);

    if (isNaN(l) || isNaN(w) || isNaN(d) || l <= 0 || w <= 0 || d <= 0) {
        alert('Lütfen geçerli pozitif değerler giriniz.');
        return;
    }

    const volume = l * w * (d / 100);
    const weight = volume * 1.6;

    document.getElementById('hc-cym-weight').innerText = weight.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' Ton';
    document.getElementById('hc-cym-vol').innerText = volume.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' m³';
    
    document.getElementById('hc-cym-result').classList.add('visible');
}

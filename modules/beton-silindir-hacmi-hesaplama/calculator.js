function hcBSHHesapla() {
    const diam = parseFloat(document.getElementById('hc-bsh-diam').value);
    const height = parseFloat(document.getElementById('hc-bsh-height').value);
    const count = parseInt(document.getElementById('hc-bsh-count').value) || 1;

    if (isNaN(diam) || isNaN(height) || diam <= 0 || height <= 0) {
        alert('Lütfen geçerli pozitif değerler giriniz.');
        return;
    }

    const radius = diam / 200; // m
    const volume = Math.PI * Math.pow(radius, 2) * height * count;

    document.getElementById('hc-bsh-val').innerText = volume.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' m³';
    document.getElementById('hc-bsh-result').classList.add('visible');
}

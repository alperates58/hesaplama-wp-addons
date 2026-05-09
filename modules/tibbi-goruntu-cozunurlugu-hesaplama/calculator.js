function hcMedicalResHesapla() {
    const fov = parseFloat(document.getElementById('hc-mr-fov').value) || 0;
    const matrix = parseInt(document.getElementById('hc-mr-matrix').value) || 1;

    const pixelSize = fov / matrix;

    document.getElementById('hc-res-mr-val').innerText = pixelSize.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' mm';
    document.getElementById('hc-medical-res-result').classList.add('visible');
}

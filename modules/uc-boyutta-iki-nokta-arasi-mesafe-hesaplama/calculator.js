function hc3dDistHesapla() {
    const x1 = parseFloat(document.getElementById('hc-3d-x1').value) || 0;
    const y1 = parseFloat(document.getElementById('hc-3d-y1').value) || 0;
    const z1 = parseFloat(document.getElementById('hc-3d-z1').value) || 0;
    const x2 = parseFloat(document.getElementById('hc-3d-x2').value) || 0;
    const y2 = parseFloat(document.getElementById('hc-3d-y2').value) || 0;
    const z2 = parseFloat(document.getElementById('hc-3d-z2').value) || 0;

    // d = sqrt((x2-x1)^2 + (y2-y1)^2 + (z2-z1)^2)
    const dist = Math.sqrt(Math.pow(x2 - x1, 2) + Math.pow(y2 - y1, 2) + Math.pow(z2 - z1, 2));

    document.getElementById('hc-3d-res-val').innerText = dist.toLocaleString('tr-TR', { maximumFractionDigits: 4 });
    document.getElementById('hc-3d-dist-result').classList.add('visible');
}

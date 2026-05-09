function hcDEPHesapla() {
    const x1 = parseFloat(document.getElementById('hc-dep-x1').value || 0);
    const y1 = parseFloat(document.getElementById('hc-dep-y1').value || 0);
    const x2 = parseFloat(document.getElementById('hc-dep-x2').value || 0);
    const y2 = parseFloat(document.getElementById('hc-dep-y2').value || 0);

    // Delta r = sqrt( (x2-x1)^2 + (y2-y1)^2 )
    const dist = Math.sqrt(Math.pow(x2 - x1, 2) + Math.pow(y2 - y1, 2));

    document.getElementById('hc-dep-val').innerText = dist.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' m';
    document.getElementById('hc-dep-result').classList.add('visible');
}

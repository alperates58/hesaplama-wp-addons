function hcBKMToggle() {
    const shape = document.getElementById('hc-bkm-shape').value;
    document.getElementById('hc-bkm-rect').style.display = shape === 'rect' ? 'block' : 'none';
    document.getElementById('hc-bkm-circle').style.display = shape === 'circle' ? 'block' : 'none';
}

function hcBKMHesapla() {
    const shape = document.getElementById('hc-bkm-shape').value;
    const h = parseFloat(document.getElementById('hc-bkm-h').value);
    const count = parseInt(document.getElementById('hc-bkm-count').value) || 1;
    let area = 0;

    if (shape === 'rect') {
        const a = parseFloat(document.getElementById('hc-bkm-a').value);
        const b = parseFloat(document.getElementById('hc-bkm-b').value);
        if (isNaN(a) || isNaN(b)) { alert('Lütfen kesit ölçülerini giriniz.'); return; }
        area = (a / 100) * (b / 100);
    } else {
        const d = parseFloat(document.getElementById('hc-bkm-d').value);
        if (isNaN(d)) { alert('Lütfen çapı giriniz.'); return; }
        area = Math.PI * Math.pow(d / 200, 2);
    }

    if (isNaN(h) || h <= 0) {
        alert('Lütfen yüksekliği giriniz.');
        return;
    }

    const totalVolume = area * h * count;

    document.getElementById('hc-bkm-val').innerText = totalVolume.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' m³';
    document.getElementById('hc-bkm-result').classList.add('visible');
}

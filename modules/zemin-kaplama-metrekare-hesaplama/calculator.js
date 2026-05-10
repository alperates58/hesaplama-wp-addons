function hcFloorAreaHesapla() {
    const w = parseFloat(document.getElementById('hc-fa-width').value);
    const l = parseFloat(document.getElementById('hc-fa-length').value);
    const boxArea = parseFloat(document.getElementById('hc-fa-box').value);

    if (!w || !l) {
        alert('Lütfen oda ölçülerini giriniz.');
        return;
    }

    const netArea = w * l;
    const totalArea = netArea * 1.1; // 10% waste

    document.getElementById('hc-fa-res-area').innerText = totalArea.toFixed(2).toLocaleString('tr-TR');

    if (boxArea > 0) {
        const boxes = Math.ceil(totalArea / boxArea);
        document.getElementById('hc-fa-res-box').innerText = boxes;
    } else {
        document.getElementById('hc-fa-res-box').innerText = "-";
    }

    document.getElementById('hc-floor-area-result').classList.add('visible');
}

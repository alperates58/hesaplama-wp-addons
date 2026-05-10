function hcTileCalcHesapla() {
    const area = parseFloat(document.getElementById('hc-tc-area').value);
    const tileW = parseFloat(document.getElementById('hc-tc-tile-w').value);
    const tileH = parseFloat(document.getElementById('hc-tc-tile-h').value);
    const boxArea = parseFloat(document.getElementById('hc-tc-box').value || 0);

    if (!area || !tileW || !tileH) {
        alert('Lütfen alan ve fayans boyutlarını giriniz.');
        return;
    }

    const tileAreaSqM = (tileW * tileH) / 10000;
    const netPcs = area / tileAreaSqM;
    const totalPcs = Math.ceil(netPcs * 1.1); // 10% waste

    document.getElementById('hc-tc-res-pcs').innerText = totalPcs.toLocaleString('tr-TR');

    if (boxArea > 0) {
        const boxes = Math.ceil((area * 1.1) / boxArea);
        document.getElementById('hc-tc-res-box').innerText = boxes;
    } else {
        document.getElementById('hc-tc-res-box').innerText = "-";
    }

    document.getElementById('hc-tile-calc-result').classList.add('visible');
}

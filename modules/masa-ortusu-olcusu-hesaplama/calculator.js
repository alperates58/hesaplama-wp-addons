function hcTableclothSizeHesapla() {
    const w = parseFloat(document.getElementById('hc-table-w').value) || 0;
    const l = parseFloat(document.getElementById('hc-table-l').value) || 0;
    const drop = parseFloat(document.getElementById('hc-table-drop').value) || 25;

    if (w <= 0 || l <= 0) return;

    const clothW = w + (drop * 2);
    const clothL = l + (drop * 2);

    document.getElementById('hc-res-tc-size').innerText = Math.round(clothW) + ' x ' + Math.round(clothL) + ' cm';
    document.getElementById('hc-tablecloth-size-result').classList.add('visible');
}

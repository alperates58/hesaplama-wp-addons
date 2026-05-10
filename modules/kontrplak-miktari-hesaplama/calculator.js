function hcPlywoodCalcHesapla() {
    const area = parseFloat(document.getElementById('hc-pl-area').value);
    const sizeVal = document.getElementById('hc-pl-size').value;

    if (!area) {
        alert('Lütfen alanı giriniz.');
        return;
    }

    let sheetArea = 0;
    if (sizeVal === 'custom') {
        const w = parseFloat(document.getElementById('hc-pl-w').value);
        const h = parseFloat(document.getElementById('hc-pl-h').value);
        if (!w || !h) { alert('Lütfen levha boyutlarını giriniz.'); return; }
        sheetArea = (w * h) / 10000;
    } else {
        sheetArea = parseFloat(sizeVal);
    }

    const sheets = Math.ceil((area / sheetArea) * 1.1); // 10% waste

    const resVal = document.getElementById('hc-pl-res-val');
    resVal.innerText = sheets;

    document.getElementById('hc-plywood-result').classList.add('visible');
}

function hcPaverCalcHesapla() {
    const area = parseFloat(document.getElementById('hc-pc-area').value);
    const type = document.getElementById('hc-pc-type').value;

    if (!area) {
        alert('Lütfen alanı giriniz.');
        return;
    }

    let pcsPerSqM = 0;
    if (type === '50') pcsPerSqM = 50;
    else if (type === '36') pcsPerSqM = 100;
    else {
        const w = parseFloat(document.getElementById('hc-pc-w').value);
        const h = parseFloat(document.getElementById('hc-pc-h').value);
        if (!w || !h) { alert('Lütfen taş boyutlarını giriniz.'); return; }
        pcsPerSqM = 10000 / (w * h);
    }

    const totalPcs = Math.ceil(area * pcsPerSqM * 1.05); // 5% waste

    const resVal = document.getElementById('hc-pc-res-val');
    resVal.innerText = totalPcs.toLocaleString('tr-TR');

    document.getElementById('hc-paver-result').classList.add('visible');
}

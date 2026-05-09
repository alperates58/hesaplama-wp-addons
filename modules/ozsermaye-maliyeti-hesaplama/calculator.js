function hcCOEHesapla() {
    const rf = (parseFloat(document.getElementById('hc-coe-rf').value) || 0) / 100;
    const beta = parseFloat(document.getElementById('hc-coe-beta').value) || 0;
    const mrp = (parseFloat(document.getElementById('hc-coe-mrp').value) || 0) / 100;

    // CAPM: Re = Rf + Beta * MRP
    const re = rf + (beta * mrp);

    document.getElementById('hc-coe-res-val').innerText = '%' + (re * 100).toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

    document.getElementById('hc-coe-result').classList.add('visible');
}

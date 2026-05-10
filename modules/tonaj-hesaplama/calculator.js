function hcTonnageCalcHesapla() {
    const vol = parseFloat(document.getElementById('hc-tn-vol').value);
    const densityVal = document.getElementById('hc-tn-density').value;

    if (!vol) {
        alert('Lütfen hacmi giriniz.');
        return;
    }

    let density = 0;
    if (densityVal === 'custom') {
        density = parseFloat(document.getElementById('hc-tn-custom-d').value);
        if (!density) { alert('Lütfen yoğunluk giriniz.'); return; }
    } else {
        density = parseFloat(densityVal);
    }

    const tonnage = vol * density;

    const resVal = document.getElementById('hc-tn-res-val');
    resVal.innerText = tonnage.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

    document.getElementById('hc-tonnage-result').classList.add('visible');
}

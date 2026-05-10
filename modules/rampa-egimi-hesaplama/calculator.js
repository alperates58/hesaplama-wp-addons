function hcRampCalcHesapla() {
    const rise = parseFloat(document.getElementById('hc-rc-rise').value);
    const type = document.getElementById('hc-rc-type').value;

    if (!rise) {
        alert('Lütfen yükseklik farkını giriniz.');
        return;
    }

    let percentage = 0;
    if (type === 'custom') {
        percentage = parseFloat(document.getElementById('hc-rc-custom-p').value);
        if (!percentage) { alert('Lütfen eğim yüzdesini giriniz.'); return; }
    } else {
        percentage = parseFloat(type);
    }

    // Run = Rise / (Percentage / 100)
    const run = rise / (percentage / 100);

    const resVal = document.getElementById('hc-rc-res-val');
    resVal.innerText = run.toFixed(2).toLocaleString('tr-TR');

    document.getElementById('hc-ramp-result').classList.add('visible');
}

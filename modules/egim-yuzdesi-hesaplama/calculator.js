function hcEgimYuzdesiHesapla() {
    const rise = parseFloat(document.getElementById('hc-ey-rise').value);
    const run = parseFloat(document.getElementById('hc-ey-run').value);

    if (!rise || !run) {
        alert('Lütfen tüm değerleri giriniz.');
        return;
    }

    const percentage = (rise / run) * 100;

    document.getElementById('hc-ey-res-val').innerText = `% ${percentage.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}`;
    document.getElementById('hc-egim-yuzde-result').classList.add('visible');
}

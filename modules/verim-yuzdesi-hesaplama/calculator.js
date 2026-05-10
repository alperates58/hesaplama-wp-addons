function hcEffPctHesapla() {
    const real = parseFloat(document.getElementById('hc-ep-real').value);
    const theo = parseFloat(document.getElementById('hc-ep-theo').value);

    if (isNaN(real) || isNaN(theo) || theo === 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    const pct = (real / theo) * 100;

    document.getElementById('hc-ep-res-val').innerText = `% ${pct.toLocaleString('tr-TR', { maximumFractionDigits: 2 })}`;
    document.getElementById('hc-verim-yuzdesi-result').classList.add('visible');
}

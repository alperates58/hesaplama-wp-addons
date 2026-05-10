function hcTolPctHesapla() {
    const nominal = parseFloat(document.getElementById('hc-tp-nominal').value);
    const tol = parseFloat(document.getElementById('hc-tp-tol').value);

    if (isNaN(nominal) || isNaN(tol) || nominal === 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    const pct = (Math.abs(tol) / Math.abs(nominal)) * 100;

    document.getElementById('hc-tp-res-val').innerText = `% ${pct.toLocaleString('tr-TR', { maximumFractionDigits: 2 })}`;
    document.getElementById('hc-tolerans-yuzdesi-result').classList.add('visible');
}

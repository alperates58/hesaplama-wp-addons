function hcPctGenHesapla() {
    const x = parseFloat(document.getElementById('hc-pg-x').value);
    const y = parseFloat(document.getElementById('hc-pg-y').value);

    if (isNaN(x) || isNaN(y) || y === 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    const res = (x / y) * 100;

    document.getElementById('hc-pg-res-val').innerText = `% ${res.toLocaleString('tr-TR', { maximumFractionDigits: 2 })}`;
    document.getElementById('hc-yuzde-gen-result').classList.add('visible');
}

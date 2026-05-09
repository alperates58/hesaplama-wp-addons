function hcELISAHesapla() {
    const m = parseFloat(document.getElementById('hc-elisa-m').value);
    const b = parseFloat(document.getElementById('hc-elisa-b').value);
    const y = parseFloat(document.getElementById('hc-elisa-abs').value);

    if (isNaN(m) || isNaN(b) || isNaN(y) || m === 0) {
        alert('Lütfen geçerli değerler giriniz (Eğim 0 olamaz).');
        return;
    }

    // x = (y - b) / m
    const x = (y - b) / m;

    document.getElementById('hc-elisa-val').innerText = x.toLocaleString('tr-TR', { maximumFractionDigits: 4 });
    document.getElementById('hc-elisa-result').classList.add('visible');
}

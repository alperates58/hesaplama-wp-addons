function hcDHHesapla() {
    const f = parseFloat(document.getElementById('hc-dh-freq').value);
    const lambda = parseFloat(document.getElementById('hc-dh-lambda').value);

    if (isNaN(f) || isNaN(lambda) || f < 0 || lambda < 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    const v = f * lambda;

    document.getElementById('hc-dh-val').innerText = v.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' m/s';
    document.getElementById('hc-dh-result').classList.add('visible');
}

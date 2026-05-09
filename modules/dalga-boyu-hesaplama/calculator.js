function hcDBHesapla() {
    const v = parseFloat(document.getElementById('hc-db-speed').value);
    const f = parseFloat(document.getElementById('hc-db-freq').value);

    if (isNaN(v) || isNaN(f) || f <= 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    const lambda = v / f;

    document.getElementById('hc-db-val').innerText = lambda.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' m';
    document.getElementById('hc-db-result').classList.add('visible');
}

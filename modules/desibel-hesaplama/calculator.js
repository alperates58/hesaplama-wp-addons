function hcDesibelHesapla() {
    const type = document.getElementById('hc-db-calc-type').value;
    const v1 = parseFloat(document.getElementById('hc-db-val1').value);
    const ref = parseFloat(document.getElementById('hc-db-ref').value);

    if (isNaN(v1) || isNaN(ref) || v1 <= 0 || ref <= 0) {
        alert('Lütfen geçerli pozitif değerler giriniz.');
        return;
    }

    const multiplier = type === 'power' ? 10 : 20;
    const db = multiplier * Math.log10(v1 / ref);

    document.getElementById('hc-db-val').innerText = db.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' dB';
    document.getElementById('hc-db-result').classList.add('visible');
}

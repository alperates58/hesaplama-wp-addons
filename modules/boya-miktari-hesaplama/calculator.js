function hcBoyaHesapla() {
    const area = parseFloat(document.getElementById('hc-boy-area').value);
    const coats = parseInt(document.getElementById('hc-boy-coats').value) || 1;
    const coverage = parseFloat(document.getElementById('hc-boy-coverage').value);

    if (isNaN(area) || isNaN(coverage) || area <= 0 || coverage <= 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    const totalLiters = (area / coverage) * coats;

    document.getElementById('hc-boy-val').innerText = totalLiters.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' Litre';
    document.getElementById('hc-boy-result').classList.add('visible');
}

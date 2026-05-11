function hcEfektifFaizOraniHesapla() {
    const nominal = parseFloat(document.getElementById('hc-efo-nominal').value);
    const n = parseInt(document.getElementById('hc-efo-period').value);

    if (isNaN(nominal)) {
        alert('Lütfen geçerli bir nominal faiz oranı girin.');
        return;
    }

    const r = nominal / 100;
    // EAR = (1 + r/n)^n - 1
    const ear = Math.pow((1 + r / n), n) - 1;
    const effectiveRate = ear * 100;

    document.getElementById('hc-efo-value').innerText = '%' + effectiveRate.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 4 });
    document.getElementById('hc-efo-result').classList.add('visible');
}

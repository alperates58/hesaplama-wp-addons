function hcDNALigasyonHesapla() {
    const vAmount = parseFloat(document.getElementById('hc-lig-v-amount').value);
    const vSize = parseFloat(document.getElementById('hc-lig-v-size').value);
    const iSize = parseFloat(document.getElementById('hc-lig-i-size').value);
    const ratio = parseFloat(document.getElementById('hc-lig-ratio').value);

    if (isNaN(vAmount) || isNaN(vSize) || isNaN(iSize) || vAmount <= 0 || vSize <= 0 || iSize <= 0) {
        alert('Lütfen geçerli pozitif değerler giriniz.');
        return;
    }

    // Insert (ng) = (Ratio * ng Vector * size Insert) / size Vector
    const iAmount = (ratio * vAmount * iSize) / vSize;

    document.getElementById('hc-lig-val').innerText = iAmount.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' ng';
    document.getElementById('hc-lig-note').innerText = `${ratio}:1 molar oran için ${iAmount.toLocaleString('tr-TR')} ng insert DNA kullanılmalıdır.`;
    document.getElementById('hc-lig-result').classList.add('visible');
}

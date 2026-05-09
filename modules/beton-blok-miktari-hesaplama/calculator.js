function hcBBMHesapla() {
    const areaSqM = parseFloat(document.getElementById('hc-bbm-area').value);
    const blockSizeSqCm = parseFloat(document.getElementById('hc-bbm-size').value);
    const waste = parseFloat(document.getElementById('hc-bbm-waste').value) || 0;

    if (isNaN(areaSqM) || areaSqM <= 0) {
        alert('Lütfen geçerli bir alan giriniz.');
        return;
    }

    const areaSqCm = areaSqM * 10000;
    const baseCount = areaSqCm / blockSizeSqCm;
    const totalCount = Math.ceil(baseCount * (1 + waste / 100));

    document.getElementById('hc-bbm-val').innerText = totalCount.toLocaleString('tr-TR') + ' Adet';
    document.getElementById('hc-bbm-result').classList.add('visible');
}

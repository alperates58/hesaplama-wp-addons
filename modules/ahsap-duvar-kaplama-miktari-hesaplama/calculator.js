function hcADKHesapla() {
    const area = parseFloat(document.getElementById('hc-adk-area').value);
    const widthCm = parseFloat(document.getElementById('hc-adk-width').value);
    const waste = parseFloat(document.getElementById('hc-adk-waste').value);

    if (isNaN(area) || isNaN(widthCm) || area <= 0 || widthCm <= 0) {
        alert('Lütfen geçerli pozitif değerler giriniz.');
        return;
    }

    const totalAreaWithWaste = area * (1 + waste / 100);
    const linearMeters = (totalAreaWithWaste * 100) / widthCm;

    document.getElementById('hc-adk-val').innerText = linearMeters.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' Metretül';
    document.getElementById('hc-adk-note').innerText = `Fire dahil kaplanacak alan: ${totalAreaWithWaste.toLocaleString('tr-TR', { maximumFractionDigits: 2 })} m²`;
    document.getElementById('hc-adk-result').classList.add('visible');
}

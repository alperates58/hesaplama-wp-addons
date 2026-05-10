function hcWallAreaHesapla() {
    const width = parseFloat(document.getElementById('hc-wa-width').value);
    const height = parseFloat(document.getElementById('hc-wa-height').value);
    const deduct = parseFloat(document.getElementById('hc-wa-deduct').value || 0);

    if (!width || !height) {
        alert('Lütfen duvar uzunluğunu ve yüksekliğini giriniz.');
        return;
    }

    const totalArea = width * height;
    const netArea = Math.max(0, totalArea - deduct);

    const resVal = document.getElementById('hc-wa-res-val');
    resVal.innerText = netArea.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

    document.getElementById('hc-wall-area-result').classList.add('visible');
}

function hcKekKalibiDonustur() {
    const oldShape = document.getElementById('hc-pan-old-shape').value;
    const oldSize = parseFloat(document.getElementById('hc-pan-old-size').value);
    const newShape = document.getElementById('hc-pan-new-shape').value;
    const newSize = parseFloat(document.getElementById('hc-pan-new-size').value);

    if (!oldSize || !newSize) {
        alert('Lütfen kalıp boyutlarını giriniz.');
        return;
    }

    const getArea = (shape, size) => {
        if (shape === 'circle') {
            return Math.PI * Math.pow(size / 2, 2);
        } else {
            return Math.pow(size, 2);
        }
    };

    const oldArea = getArea(oldShape, oldSize);
    const newArea = getArea(newShape, newSize);

    const factor = newArea / oldArea;

    const resultDiv = document.getElementById('hc-cake-pan-result');
    document.getElementById('hc-pan-res-val').innerText = 'x ' + factor.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    
    document.getElementById('hc-pan-res-note').innerText = `Tüm malzemeleri ${factor.toFixed(2)} ile çarparak yeni kalıbınıza uygun hale getirebilirsiniz. (Örn: 2 yumurta ise ~${Math.round(2 * factor)} yumurta)`;
    
    resultDiv.classList.add('visible');
}

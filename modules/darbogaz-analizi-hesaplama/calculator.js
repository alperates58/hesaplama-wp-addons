function hcBottleneckHesapla() {
    const inputs = document.querySelectorAll('.hc-da-input');
    let minCap = Infinity;
    let bottleneckIndex = -1;
    let validCount = 0;

    inputs.forEach((input, index) => {
        const val = parseFloat(input.value);
        if (!isNaN(val) && val > 0) {
            validCount++;
            if (val < minCap) {
                minCap = val;
                bottleneckIndex = index + 1;
            }
        }
    });

    if (validCount < 2) {
        alert('Lütfen en az iki istasyon kapasitesi girin.');
        return;
    }

    document.getElementById('hc-da-res-cap').innerText = minCap.toLocaleString('tr-TR') + ' Adet/saat';
    document.getElementById('hc-da-res-info').innerText = 'Darboğaz: İstasyon ' + bottleneckIndex;
    
    document.getElementById('hc-da-result').classList.add('visible');
}

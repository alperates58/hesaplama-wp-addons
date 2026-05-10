function hcInchToMHesapla() {
    const inch = parseFloat(document.getElementById('hc-im-inch').value);

    if (isNaN(inch)) {
        alert('Lütfen bir değer giriniz.');
        return;
    }

    // 1 inch = 0.0254 meters
    const m = inch * 0.0254;

    document.getElementById('hc-im-res-val').innerText = m.toLocaleString('tr-TR', { minimumFractionDigits: 4, maximumFractionDigits: 4 });
    document.getElementById('hc-inch-m-result').classList.add('visible');
}

function hcInchToCmHesapla() {
    const inch = parseFloat(document.getElementById('hc-ic-inch').value);

    if (isNaN(inch)) {
        alert('Lütfen bir değer giriniz.');
        return;
    }

    // 1 inch = 2.54 cm
    const cm = inch * 2.54;

    document.getElementById('hc-ic-res-val').innerText = cm.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    document.getElementById('hc-inch-cm-result').classList.add('visible');
}

function hcArrowLenHesapla() {
    const span = parseFloat(document.getElementById('hc-al-span').value);

    if (!span) {
        alert('Lütfen kol açıklığınızı giriniz.');
        return;
    }

    // Formula: (Arm Span in inches / 2.5) + 1 inch = Draw Length
    // In cm: ((span / 2.54) / 2.5 + 1) * 2.54
    const drawLenCm = ((span / 2.54) / 2.5 + 1) * 2.54;

    const resVal = document.getElementById('hc-al-res-val');
    resVal.innerText = drawLenCm.toFixed(1).toLocaleString('tr-TR');

    document.getElementById('hc-arrow-len-result').classList.add('visible');
}

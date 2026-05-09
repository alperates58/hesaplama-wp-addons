function hcBilesikKesirHesapla() {
    const whole = parseInt(document.getElementById('hc-if-whole').value) || 0;
    const num = parseInt(document.getElementById('hc-if-num').value) || 0;
    const den = parseInt(document.getElementById('hc-if-den').value);

    if (isNaN(den) || den === 0) {
        alert('Lütfen geçerli bir payda girin.');
        return;
    }

    // Improper numerator = (whole * den) + num
    const improperNum = (whole * den) + num;

    document.getElementById('hc-res-if-val').innerText = `${improperNum} / ${den}`;

    document.getElementById('hc-if-result').classList.add('visible');
}

function hcBeltLenHesapla() {
    const d = parseFloat(document.getElementById('hc-bl-d').value);
    const sd = parseFloat(document.getElementById('hc-bl-sd').value);
    const c = parseFloat(document.getElementById('hc-bl-c').value);

    if (isNaN(d) || isNaN(sd) || isNaN(c) || c <= 0) {
        alert('Lütfen geçerli çap ve mesafe değerleri girin.');
        return;
    }

    // Formula: L = 2C + 1.57(D+d) + (D-d)^2/(4C)
    const len = (2 * c) + (1.5708 * (d + sd)) + (Math.pow(d - sd, 2) / (4 * c));

    document.getElementById('hc-bl-res-val').innerText = Math.round(len).toLocaleString('tr-TR') + ' mm';
    document.getElementById('hc-bl-res-mt').innerText = (len / 1000).toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' metre';
    
    document.getElementById('hc-bl-result').classList.add('visible');
}

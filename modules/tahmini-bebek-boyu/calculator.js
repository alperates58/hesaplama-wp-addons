function hcBoyHesapla() {
    const fl = parseFloat(document.getElementById('hc-bl-fl').value);

    if (isNaN(fl) || fl <= 0) {
        alert('Lütfen geçerli bir FL değeri girin.');
        return;
    }

    // Formula: Total Length = FL * 7
    const totalMm = fl * 7;
    const totalCm = totalMm / 10;

    document.getElementById('hc-bl-val').innerText = totalCm.toFixed(1).toLocaleString('tr-TR') + " cm";
    document.getElementById('hc-baby-length-result').classList.add('visible');
}

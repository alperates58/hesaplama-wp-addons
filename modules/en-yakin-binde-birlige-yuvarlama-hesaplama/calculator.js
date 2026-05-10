function hcRound3Hesapla() {
    const num = parseFloat(document.getElementById('hc-r3-num').value);

    if (isNaN(num)) {
        alert('Lütfen geçerli bir sayı giriniz.');
        return;
    }

    const result = Math.round(num * 1000) / 1000;

    document.getElementById('hc-r3-res-val').innerText = result.toLocaleString('tr-TR', { minimumFractionDigits: 3, maximumFractionDigits: 3 });
    document.getElementById('hc-round-3-result').classList.add('visible');
}

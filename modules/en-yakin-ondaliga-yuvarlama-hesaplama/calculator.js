function hcRound1Hesapla() {
    const num = parseFloat(document.getElementById('hc-r1-num').value);

    if (isNaN(num)) {
        alert('Lütfen geçerli bir sayı giriniz.');
        return;
    }

    const result = Math.round(num * 10) / 10;

    document.getElementById('hc-r1-res-val').innerText = result.toLocaleString('tr-TR', { minimumFractionDigits: 1, maximumFractionDigits: 1 });
    document.getElementById('hc-round-1-result').classList.add('visible');
}

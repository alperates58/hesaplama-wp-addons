function hcRound2Hesapla() {
    const num = parseFloat(document.getElementById('hc-r2-num').value);

    if (isNaN(num)) {
        alert('Lütfen geçerli bir sayı giriniz.');
        return;
    }

    const result = Math.round(num * 100) / 100;

    document.getElementById('hc-r2-res-val').innerText = result.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    document.getElementById('hc-round-2-result').classList.add('visible');
}

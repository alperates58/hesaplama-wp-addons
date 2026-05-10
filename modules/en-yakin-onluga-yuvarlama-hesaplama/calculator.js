function hcRound10Hesapla() {
    const num = parseFloat(document.getElementById('hc-r10-num').value);

    if (isNaN(num)) {
        alert('Lütfen geçerli bir sayı giriniz.');
        return;
    }

    const result = Math.round(num / 10) * 10;

    document.getElementById('hc-r10-res-val').innerText = result.toLocaleString('tr-TR');
    document.getElementById('hc-round-10-result').classList.add('visible');
}

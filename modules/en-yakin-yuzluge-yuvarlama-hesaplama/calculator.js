function hcRound100Hesapla() {
    const num = parseFloat(document.getElementById('hc-r100-num').value);

    if (isNaN(num)) {
        alert('Lütfen geçerli bir sayı giriniz.');
        return;
    }

    const result = Math.round(num / 100) * 100;

    document.getElementById('hc-r100-res-val').innerText = result.toLocaleString('tr-TR');
    document.getElementById('hc-round-100-result').classList.add('visible');
}

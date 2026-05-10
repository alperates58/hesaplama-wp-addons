function hcRound1000Hesapla() {
    const num = parseFloat(document.getElementById('hc-r1000-num').value);

    if (isNaN(num)) {
        alert('Lütfen geçerli bir sayı giriniz.');
        return;
    }

    const result = Math.round(num / 1000) * 1000;

    document.getElementById('hc-r1000-res-val').innerText = result.toLocaleString('tr-TR');
    document.getElementById('hc-round-1000-result').classList.add('visible');
}

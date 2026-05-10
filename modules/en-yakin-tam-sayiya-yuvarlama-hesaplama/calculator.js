function hcRoundIntHesapla() {
    const num = parseFloat(document.getElementById('hc-ri-num').value);

    if (isNaN(num)) {
        alert('Lütfen geçerli bir sayı giriniz.');
        return;
    }

    const result = Math.round(num);

    document.getElementById('hc-ri-res-val').innerText = result.toLocaleString('tr-TR');
    document.getElementById('hc-round-int-result').classList.add('visible');
}

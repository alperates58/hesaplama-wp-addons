function hcRemHesapla() {
    const total = parseFloat(document.getElementById('hc-rem-total').value);
    if (isNaN(total) || total <= 0) {
        alert('Lütfen geçerli bir toplam uyku süresi giriniz.');
        return;
    }

    const remMin = total * 60 * 0.20;
    const remMax = total * 60 * 0.25;

    document.getElementById('hc-rem-res-val').innerText = Math.round(remMin) + ' - ' + Math.round(remMax);
    document.getElementById('hc-rem-calc-result').classList.add('visible');
}

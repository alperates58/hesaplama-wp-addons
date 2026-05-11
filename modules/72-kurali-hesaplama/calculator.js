function hc72KuraliHesapla() {
    const rate = parseFloat(document.getElementById('hc-72-rate').value);

    if (isNaN(rate) || rate <= 0) {
        alert('Lütfen geçerli bir getiri oranı girin.');
        return;
    }

    const years = 72 / rate;

    document.getElementById('hc-72-res-total').innerText = years.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' Yıl';
    document.getElementById('hc-72-result').classList.add('visible');
}

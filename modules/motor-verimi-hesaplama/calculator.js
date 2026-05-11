function hcMotorVerimHesapla() {
    const pin = parseFloat(document.getElementById('hc-mv-in').value);
    const pout = parseFloat(document.getElementById('hc-mv-out').value);

    if (isNaN(pin) || isNaN(pout) || pin <= 0) {
        alert('Lütfen geçerli giriş ve çıkış gücü değerlerini girin.');
        return;
    }

    const efficiency = (pout / pin) * 100;

    document.getElementById('hc-mv-res-total').innerText = efficiency.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    document.getElementById('hc-mv-result').classList.add('visible');
}

function hcKriptoStopLossHesapla() {
    var giris = parseFloat(document.getElementById('hc-ksl-giris').value) || 0;
    var stop = parseFloat(document.getElementById('hc-ksl-stop').value) || 0;
    var yatirim = parseFloat(document.getElementById('hc-ksl-yatirim').value) || 0;

    if (giris <= 0 || stop <= 0 || yatirim <= 0) {
        alert('Lütfen tüm değerleri geçerli olarak giriniz.');
        return;
    }

    if (stop >= giris) {
        alert('Stop loss fiyatı giriş fiyatından küçük olmalıdır.');
        return;
    }

    var oran = ((giris - stop) / giris) * 100;
    var zarar = yatirim * (oran / 100);
    var kalan = yatirim - zarar;

    document.getElementById('hc-ksl-res-oran').innerText = '-%' + oran.toFixed(2);
    document.getElementById('hc-ksl-res-zarar').innerText = '-' + zarar.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2});
    document.getElementById('hc-ksl-res-kalan').innerText = kalan.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2});

    document.getElementById('hc-ksl-result').classList.add('visible');
}
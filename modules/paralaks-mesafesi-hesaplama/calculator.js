function hcPlUnitChange() {
    const unit = document.getElementById('hc-pl-unit').value;
    const input = document.getElementById('hc-pl-angle');
    if (unit === 'arcsec') {
        input.value = '0.768';
    } else {
        input.value = '768';
    }
}

function hcParalaksMesafesiHesapla() {
    const angleVal = parseFloat(document.getElementById('hc-pl-angle').value);
    const unit = document.getElementById('hc-pl-unit').value;

    if (isNaN(angleVal) || angleVal <= 0) {
        alert('Lütfen geçerli ve pozitif bir paralaks açısı giriniz.');
        return;
    }

    // Yay saniyesine (arcseconds) dönüştürelim
    let p = angleVal;
    if (unit === 'mas') {
        p = angleVal / 1000;
    }

    // d = 1 / p (parsek)
    const pc = 1 / p;

    // 1 parsek = 3.26156 ışık yılı
    const ly = pc * 3.26156;

    // 1 parsek = 206265 astronomik birim (AU)
    const au = pc * 206265;

    // 1 parsek = 3.0857e16 metre
    const meters = pc * 3.0857e16;

    document.getElementById('hc-pl-pc-val').innerText = pc.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' pc';
    document.getElementById('hc-pl-ly-val').innerText = ly.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' ly (Işık Yılı)';
    document.getElementById('hc-pl-au-val').innerText = au.toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + ' AU';
    document.getElementById('hc-pl-m-val').innerHTML = meters.toExponential(4).replace('e+', ' &times; 10^') + ' m';

    document.getElementById('hc-paralaks-mesafesi-result').classList.add('visible');
}

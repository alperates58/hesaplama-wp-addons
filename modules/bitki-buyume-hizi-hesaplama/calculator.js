function hcBitkiBuyumeHesapla() {
    const h1 = parseFloat(document.getElementById('hc-pg-h1').value);
    const h2 = parseFloat(document.getElementById('hc-pg-h2').value);
    const days = parseFloat(document.getElementById('hc-pg-days').value);

    if (isNaN(h1) || isNaN(h2) || isNaN(days) || h1 < 0 || h2 < h1 || days <= 0) {
        alert('Lütfen geçerli değerler giriniz (Son boy ilk boydan büyük olmalıdır).');
        return;
    }

    const growthRate = (h2 - h1) / days;
    
    document.getElementById('hc-pg-val').innerText = growthRate.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' cm/gün';
    document.getElementById('hc-pg-note').innerText = `Bitki ${days} günde toplam ${(h2 - h1).toLocaleString('tr-TR')} cm uzamıştır.`;
    document.getElementById('hc-pg-result').classList.add('visible');
}

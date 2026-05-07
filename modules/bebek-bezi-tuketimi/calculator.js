function hcBebekBeziHesapla() {
    const ay = parseInt(document.getElementById('hc-bbt-ay').value);
    const fiyat = parseFloat(document.getElementById('hc-bbt-fiyat').value);

    if (isNaN(ay)) {
        alert('Lütfen bebeğinizin yaşını (ay) giriniz.');
        return;
    }

    let gunluk = 8;
    if (ay <= 1) gunluk = 11;
    else if (ay <= 3) gunluk = 9;
    else if (ay <= 6) gunluk = 7;
    else if (ay <= 12) gunluk = 6;
    else if (ay <= 24) gunluk = 5;
    else gunluk = 4;

    const aylik = gunluk * 30.44;
    const yillik = gunluk * 365.25;

    document.getElementById('hc-res-bbt-gun').innerText = gunluk + ' Adet';
    document.getElementById('hc-res-bbt-ay').innerText = Math.round(aylik) + ' Adet';

    if (!isNaN(fiyat) && fiyat > 0) {
        document.getElementById('hc-res-bbt-m-ay').innerText = (aylik * fiyat).toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + ' ₺';
        document.getElementById('hc-res-bbt-m-yil').innerText = (yillik * fiyat).toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + ' ₺';
        document.getElementById('hc-bbt-maliyet-group').style.display = 'block';
    } else {
        document.getElementById('hc-bbt-maliyet-group').style.display = 'none';
    }

    document.getElementById('hc-bebek-bezi-tuketimi-result').classList.add('visible');
}

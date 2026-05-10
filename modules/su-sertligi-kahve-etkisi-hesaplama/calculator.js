function hcWaterHardnessCoffeeHesapla() {
    const ppm = parseFloat(document.getElementById('hc-wh-val').value);

    if (isNaN(ppm) || ppm < 0) {
        alert('Lütfen sertlik değerini giriniz.');
        return;
    }

    let result = '';
    let info = '';

    if (ppm < 50) {
        result = 'Çok Yumuşak';
        info = 'Aroma çözünürlüğü düşük kalabilir, kahve "yassı" hissedilebilir.';
    } else if (ppm <= 150) {
        result = 'İdeal (SCA Standartları)';
        info = 'Kahve demlemek için en ideal aralık. Aroma dengesi mükemmeldir.';
    } else if (ppm <= 300) {
        result = 'Sert';
        info = 'Aroma çözünürlüğü çok yüksektir, acı tatlar baskın gelebilir.';
    } else {
        result = 'Çok Sert';
        info = 'Demleme için önerilmez. Mineraller aroma kanallarını tıkayabilir.';
    }

    document.getElementById('hc-wh-res').innerText = result;
    document.getElementById('hc-wh-info').innerText = info;
    
    document.getElementById('hc-hardness-coffee-result').classList.add('visible');
}

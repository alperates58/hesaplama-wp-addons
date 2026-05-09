function hcCocukTansiyonHesapla() {
    const yas = parseInt(document.getElementById('hc-ct-yas').value);
    const sis = parseInt(document.getElementById('hc-ct-sis').value);
    const diy = parseInt(document.getElementById('hc-ct-diy').value);

    if (isNaN(yas) || isNaN(sis) || isNaN(diy)) {
        alert('Lütfen tüm alanları doldurunuz.');
        return;
    }

    // Simplified 95th percentile thresholds for children (Approximate)
    // Age 1-3: 105/65
    // Age 4-6: 110/70
    // Age 7-9: 115/75
    // Age 10-12: 120/80
    // Age 13-17: 130/85
    
    let sisLimit = 120;
    let diyLimit = 80;

    if (yas <= 3) { sisLimit = 105; diyLimit = 65; }
    else if (yas <= 6) { sisLimit = 110; diyLimit = 70; }
    else if (yas <= 9) { sisLimit = 115; diyLimit = 75; }
    else if (yas <= 12) { sisLimit = 120; diyLimit = 80; }
    else { sisLimit = 130; diyLimit = 85; }

    const yorumBox = document.getElementById('hc-ct-res-yorum');
    let metin = '';
    let bg = '';
    let color = '';

    if (sis > sisLimit || diy > diyLimit) {
        metin = '<strong>Yüksek Tansiyon Riski!</strong><br>Girilen değerler yaş grubuna göre normalin üzerinde görünüyor. Lütfen bir çocuk doktoruna danışın.';
        bg = 'rgba(192, 54, 44, 0.1)';
        color = 'var(--hc-front-red)';
    } else if (sis > (sisLimit - 5) || diy > (diyLimit - 5)) {
        metin = '<strong>Sınırda Değer.</strong><br>Tansiyon değerleri normalin üst sınırına yakın. Takip edilmesi önerilir.';
        bg = 'rgba(201, 137, 5, 0.1)';
        color = 'var(--hc-front-gold)';
    } else {
        metin = '<strong>Normal Tansiyon.</strong><br>Tansiyon değerleri bu yaş grubu için normal aralıktadır.';
        bg = 'rgba(15, 138, 95, 0.1)';
        color = 'var(--hc-front-green)';
    }

    yorumBox.innerHTML = metin;
    yorumBox.style.background = bg;
    yorumBox.style.color = color;

    document.getElementById('hc-cocuk-tansiyon-result').classList.add('visible');
}

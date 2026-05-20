function hcWifiSinyalGucuMesafeHesapla() {
    var d = parseFloat(document.getElementById('hc-wifi-mesafe').value);
    var f = parseFloat(document.getElementById('hc-wifi-frekans').value); // MHz (2400, 5000, 6000)
    var tx = parseFloat(document.getElementById('hc-wifi-tx').value);

    var alcipan = parseInt(document.getElementById('hc-wifi-eng-alcipan').value) || 0;
    var beton = parseInt(document.getElementById('hc-wifi-eng-beton').value) || 0;
    var cam = parseInt(document.getElementById('hc-wifi-eng-cam').value) || 0;
    var metal = parseInt(document.getElementById('hc-wifi-eng-metal').value) || 0;

    if (isNaN(d) || d <= 0 || isNaN(tx)) {
        alert('Lütfen geçerli mesafe ve çıkış gücü girin.');
        return;
    }
    if (alcipan < 0 || beton < 0 || cam < 0 || metal < 0) {
        alert('Engel adetleri negatif olamaz.');
        return;
    }

    // FSPL = 20 * log10(d) + 20 * log10(f) - 27.55
    var fspl = (20 * Math.log10(d)) + (20 * Math.log10(f)) - 27.55;

    // Frekansa göre tuğla/beton duvar sönümleme kaybı (dB)
    var betonKayipBirimi = 12;
    if (f === 2400) betonKayipBirimi = 8;
    else if (f === 6000) betonKayipBirimi = 15;

    // Toplam engel kayıpları
    var engelKaybi = (alcipan * 3.5) + (beton * betonKayipBirimi) + (cam * 3) + (metal * 18);

    // RSSI = Tx (Çıkış Gücü) - FSPL - Engel Kaybı
    var rssi = tx - fspl - engelKaybi;

    var fmtSayi = function(val) {
        return val.toLocaleString('tr-TR', { minimumFractionDigits: 1, maximumFractionDigits: 1 }) + ' dB';
    };

    document.getElementById('hc-wifi-res-fspl').textContent = fmtSayi(fspl) + ' (Havadaki yayılma kaybı)';
    document.getElementById('hc-wifi-res-engel-kayip').textContent = fmtSayi(engelKaybi);
    
    var rssiEl = document.getElementById('hc-wifi-res-rssi');
    rssiEl.textContent = Math.round(rssi) + ' dBm';

    var yorum = '';
    var renk = '';

    if (rssi >= -50) {
        yorum = 'Mükemmel (%90 - %100 Güç): Modeme çok yakınsınız. Maksimum veri aktarım hızı ve en düşük gecikme.';
        renk = 'var(--hc-front-green)';
    } else if (rssi < -50 && rssi >= -67) {
        yorum = 'Çok İyi (%75 - %90 Güç): Akıcı 4K akış, hızlı dosya transferi ve stabil online oyun deneyimi için mükemmel sinyal.';
        renk = 'var(--hc-front-green)';
    } else if (rssi < -67 && rssi >= -75) {
        yorum = 'Orta Seviye (%50 - %75 Güç): Web gezintisi ve e-postalar için yeterli, ancak video izlerken ara sıra yükleme bekletebilir.';
        renk = 'var(--hc-front-blue)';
    } else if (rssi < -75 && rssi >= -85) {
        yorum = 'Zayıf / Kararsız (%20 - %50 Güç): Sık sık bağlantı kopması yaşanabilir, hız aşırı düşüktür. Sinyal güçlendirici veya yakınlaşma gerekir.';
        renk = 'var(--hc-front-orange)';
    } else {
        yorum = 'Kullanılamaz (< %20 Güç): Sinyal neredeyse tamamen yok. Sürekli kopma veya hiç bağlanamama durumu.';
        renk = 'var(--hc-front-red)';
    }

    rssiEl.style.color = (rssi < -75) ? 'var(--hc-front-red)' : ((rssi < -67) ? 'var(--hc-front-orange)' : 'var(--hc-front-green)');
    
    var yorumEl = document.getElementById('hc-wifi-res-yorum');
    yorumEl.textContent = yorum;
    yorumEl.style.color = renk;

    document.getElementById('hc-wifi-signal-result').classList.add('visible');
}

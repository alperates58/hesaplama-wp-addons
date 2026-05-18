function hcSinyalGurultuTuruDegisti() {
    var type = document.getElementById('hc-sgo-type').value;
    var sigLabel = document.getElementById('hc-sgo-sig-label');
    var noiseLabel = document.getElementById('hc-sgo-noise-label');

    if (type === 'power') {
        sigLabel.innerText = 'Sinyal Seviyesi (Güç - Watt)';
        noiseLabel.innerText = 'Gürültü Seviyesi (Güç - Watt)';
    } else {
        sigLabel.innerText = 'Sinyal Seviyesi (Gerilim - Volt)';
        noiseLabel.innerText = 'Gürültü Seviyesi (Gerilim - Volt)';
    }
}

function hcSinyalGurultuHesapla() {
    var type = document.getElementById('hc-sgo-type').value;
    var sig = parseFloat(document.getElementById('hc-sgo-sig').value);
    var noise = parseFloat(document.getElementById('hc-sgo-noise').value);

    if (isNaN(sig) || sig <= 0) {
        alert('Lütfen geçerli bir sinyal seviyesi girin.');
        return;
    }
    if (isNaN(noise) || noise <= 0) {
        alert('Lütfen geçerli bir gürültü seviyesi girin.');
        return;
    }

    var ratio = sig / noise;
    var db = 0;

    if (type === 'power') {
        // SNR_dB = 10 * log10(Ps / Pn)
        db = 10 * Math.log10(ratio);
    } else {
        // SNR_dB = 20 * log10(Vs / Vn)
        db = 20 * Math.log10(ratio);
    }

    document.getElementById('hc-sgo-res-ratio').innerText = ratio.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' : 1';
    document.getElementById('hc-sgo-res-db').innerText = db.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' dB';

    var rating = '';
    if (db >= 40) {
        rating = 'Mükemmel kalite! Neredeyse hiç gürültü yok.';
    } else if (db >= 30) {
        rating = 'Çok iyi kalite. Temiz bir sinyal.';
    } else if (db >= 20) {
        rating = 'İyi/Kabul edilebilir kalite. Hafif bir arka plan gürültüsü duyulabilir veya görülebilir.';
    } else if (db >= 10) {
        rating = 'Zayıf kalite. Yoğun gürültü içeriyor.';
    } else {
        rating = 'Çok kötü kalite! Gürültü, sinyal seviyesine çok yakın veya daha baskın.';
    }

    var desc = 'Sinyalinizin gürültüye oranı lineer olarak ' + ratio.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' katıdır. Logaritmik (desibel) karşılığı ' + db.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' dB olarak hesaplanmıştır. ' + rating;
    document.getElementById('hc-sgo-desc').innerText = desc;

    document.getElementById('hc-sinyal-gurultu-orani-hesaplama-result').classList.add('visible');
}

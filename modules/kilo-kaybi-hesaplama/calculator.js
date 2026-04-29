var HC_KKH_KCAL_KG = 7700;

function hcKkhFormat(sayi, basamak) {
    return sayi.toLocaleString('tr-TR', {
        minimumFractionDigits: basamak,
        maximumFractionDigits: basamak
    });
}

function hcKkhTamFormat(sayi) {
    return Math.round(sayi).toLocaleString('tr-TR');
}

function hcKkhTarihFormatla(gunSayisi) {
    var tarih = new Date();
    tarih.setDate(tarih.getDate() + Math.ceil(gunSayisi));

    return tarih.toLocaleDateString('tr-TR', {
        day: 'numeric',
        month: 'long',
        year: 'numeric'
    });
}

function hcKkhSeviyeBul(gunlukAcik, haftalikKayip) {
    if (gunlukAcik < 250) {
        return {
            ad: 'Yavaş',
            yorum: 'Kalori açığı düşük. Daha yavaş fakat sürdürülebilir bir ilerleme beklenir.'
        };
    }

    if (gunlukAcik <= 750 && haftalikKayip <= 0.75) {
        return {
            ad: 'Dengeli',
            yorum: 'Plan makul ve sürdürülebilir bir kilo kaybı temposuna yakın görünüyor.'
        };
    }

    if (gunlukAcik <= 1000 && haftalikKayip <= 1) {
        return {
            ad: 'Hızlı',
            yorum: 'Kilo kaybı temposu hızlıdır. Açlık, performans düşüşü ve kas kaybı riskine dikkat edin.'
        };
    }

    return {
        ad: 'Çok hızlı',
        yorum: 'Plan oldukça agresif görünüyor. Daha güvenli hedef için kalori açığını azaltmanız önerilir.'
    };
}

function hcKiloKaybiHesapla() {
    var mevcut = parseFloat(document.getElementById('hc-kkh-mevcut').value);
    var hedef = parseFloat(document.getElementById('hc-kkh-hedef').value);
    var koruma = parseFloat(document.getElementById('hc-kkh-koruma').value);
    var alim = parseFloat(document.getElementById('hc-kkh-alim').value);

    if (isNaN(mevcut) || isNaN(hedef) || isNaN(koruma) || isNaN(alim)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    if (mevcut < 30 || mevcut > 300 || hedef < 30 || hedef > 300) {
        alert('Lütfen mevcut kilo ve hedef kilo için gerçekçi kg değerleri girin.');
        return;
    }

    if (hedef >= mevcut) {
        alert('Hedef kilo, mevcut kilodan düşük olmalıdır.');
        return;
    }

    if (koruma < 1000 || koruma > 6000 || alim < 800 || alim > 6000) {
        alert('Lütfen kalori değerlerini kcal/gün olarak gerçekçi aralıkta girin.');
        return;
    }

    var gunlukAcik = koruma - alim;
    if (gunlukAcik <= 0) {
        alert('Kilo kaybı için planlanan kalori alımı, koruma kalorisinden düşük olmalıdır.');
        return;
    }

    var toplamKayip = mevcut - hedef;
    var toplamAcik = toplamKayip * HC_KKH_KCAL_KG;
    var gunSayisi = toplamAcik / gunlukAcik;
    var haftaSayisi = gunSayisi / 7;
    var haftalikKayip = (gunlukAcik * 7) / HC_KKH_KCAL_KG;
    var seviye = hcKkhSeviyeBul(gunlukAcik, haftalikKayip);

    document.getElementById('hc-kkh-badge').textContent = hcKkhFormat(toplamKayip, 1);
    document.getElementById('hc-kkh-sure').textContent = hcKkhFormat(haftaSayisi, 1) + ' hafta';
    document.getElementById('hc-kkh-ozet').textContent = 'Hedef kiloya ulaşmak için yaklaşık süre.';
    document.getElementById('hc-kkh-acik').textContent = hcKkhTamFormat(gunlukAcik) + ' kcal/gün';
    document.getElementById('hc-kkh-haftalik').textContent = hcKkhFormat(haftalikKayip, 2) + ' kg/hafta';
    document.getElementById('hc-kkh-toplam').textContent = hcKkhFormat(toplamKayip, 1) + ' kg';
    document.getElementById('hc-kkh-toplam-acik').textContent = hcKkhTamFormat(toplamAcik) + ' kcal';
    document.getElementById('hc-kkh-tarih').textContent = hcKkhTarihFormatla(gunSayisi);
    document.getElementById('hc-kkh-seviye').textContent = seviye.ad;
    document.getElementById('hc-kkh-yorum').textContent = seviye.yorum + ' Hesaplama 1 kg kayıp için yaklaşık 7.700 kcal enerji açığı varsayımıyla yapılır.';

    var uyari = '';
    if (alim < 1200) {
        uyari = 'Planlanan günlük kalori alımı çok düşük görünüyor. Çok düşük kalorili planlar sağlık uzmanı takibi gerektirebilir.';
    } else if (haftalikKayip > 1) {
        uyari = 'Haftalık tahmini kayıp 1 kg üzerindedir. Daha sürdürülebilir bir hedef için günlük açığı azaltmayı değerlendirin.';
    } else {
        uyari = 'Gerçek kilo kaybı su dengesi, metabolik uyum, egzersiz ve takip doğruluğuna göre değişebilir.';
    }

    document.getElementById('hc-kkh-uyari').textContent = uyari;
    document.getElementById('hc-kkh-result').classList.add('visible');
}

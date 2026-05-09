function hcTrhFormat(deger) {
    return deger.toLocaleString('tr-TR', {
        minimumFractionDigits: 1,
        maximumFractionDigits: 1
    });
}

function hcTrhSiniflandir(buyuk, kucuk) {
    if (buyuk > 23.99796 || kucuk > 15.99864) {
        return {
            kategori: 'Hipertansif kriz aralığı',
            rozet: 'Acil',
            risk: 'Çok yüksek',
            adim: 'Acil değerlendirme',
            renk: 'kriz',
            yorum: 'Ölçüm çok yüksek aralıkta. Bu değer tekrar ediyorsa veya belirti varsa gecikmeden acil tıbbi yardım alın.'
        };
    }

    if (buyuk >= 18.66508 || kucuk >= 11.99898) {
        return {
            kategori: 'Evre 2 hipertansiyon aralığı',
            rozet: 'Evre 2',
            risk: 'Yüksek',
            adim: 'Doktor görüşmesi',
            renk: 'evre-2',
            yorum: 'Ölçüm yüksek aralıkta. Evde doğru teknikle tekrar ölçüm yapın ve sonuçları doktorunuzla değerlendirin.'
        };
    }

    if ((buyuk >= 17.33186 && buyuk < 18.66508) || (kucuk >= 10.66576 && kucuk < 11.99898)) {
        return {
            kategori: 'Evre 1 hipertansiyon aralığı',
            rozet: 'Evre 1',
            risk: 'Orta',
            adim: 'Takip ve danışma',
            renk: 'evre-1',
            yorum: 'Ölçüm sınırın üzerinde. Düzenli ölçüm takibi, yaşam tarzı düzenlemesi ve kişisel risklere göre doktor değerlendirmesi önerilir.'
        };
    }

    if (buyuk >= 15.99864 && buyuk < 17.33186 && kucuk < 10.66576) {
        return {
            kategori: 'Yükselmiş tansiyon aralığı',
            rozet: 'Yüksek',
            risk: 'Hafif artmış',
            adim: 'Düzenli takip',
            renk: 'yukselmis',
            yorum: 'Büyük tansiyon normalin üzerinde görünüyor. Ölçümlerinizi takip etmek ve tuz, hareket, kilo, uyku gibi etkenleri gözden geçirmek faydalı olur.'
        };
    }

    return {
        kategori: 'Normal tansiyon aralığı',
        rozet: 'Normal',
        risk: 'Düşük',
        adim: 'Rutin takip',
        renk: 'normal',
        yorum: 'Ölçüm normal aralıkta görünüyor. Yine de tansiyon, doğru teknikle ve dinlenmiş halde yapılan birden fazla ölçümle değerlendirilmelidir.'
    };
}

function hcTrhEkRiskMetni(yas, ekRisk, sonuc) {
    var metin = sonuc.yorum;

    if (yas >= 65 && sonuc.renk !== 'normal') {
        metin += ' 65 yaş ve üzerindeki kişilerde takip planı için doktor görüşü özellikle önemlidir.';
    }

    if (ekRisk === 'var' && sonuc.renk !== 'normal') {
        metin += ' Ek kalp-damar, böbrek veya diyabet riski olduğu için bu ölçümü ertelemeyip sağlık profesyoneliyle paylaşın.';
    }

    return metin;
}

function hcTansiyonRiskHesapla() {
    var buyuk = parseFloat(document.getElementById('hc-trh-buyuk').value);
    var kucuk = parseFloat(document.getElementById('hc-trh-kucuk').value);
    var yas = parseInt(document.getElementById('hc-trh-yas').value, 10);
    var ekRisk = document.getElementById('hc-trh-risk').value;
    var sonuc;
    var result;
    var renkler = [
        'hc-tansiyon-risk-hesaplama-normal',
        'hc-tansiyon-risk-hesaplama-yukselmis',
        'hc-tansiyon-risk-hesaplama-evre-1',
        'hc-tansiyon-risk-hesaplama-evre-2',
        'hc-tansiyon-risk-hesaplama-kriz'
    ];

    if (isNaN(buyuk) || isNaN(kucuk) || isNaN(yas)) {
        alert('Lütfen büyük tansiyon, küçük tansiyon ve yaş alanlarını doldurun.');
        return;
    }

    if (buyuk < 8 || buyuk > 35) {
        alert('Lütfen büyük tansiyon için 8-35 kPa arasında bir değer girin.');
        return;
    }

    if (kucuk < 5 || kucuk > 25) {
        alert('Lütfen küçük tansiyon için 5-25 kPa arasında bir değer girin.');
        return;
    }

    if (kucuk >= buyuk) {
        alert('Küçük tansiyon, büyük tansiyondan düşük olmalıdır.');
        return;
    }

    if (yas < 18 || yas > 120) {
        alert('Lütfen yaş için 18-120 arasında bir değer girin.');
        return;
    }

    sonuc = hcTrhSiniflandir(buyuk, kucuk);
    result = document.getElementById('hc-trh-result');

    renkler.forEach(function(sinif) {
        result.classList.remove(sinif);
    });

    result.classList.add('hc-tansiyon-risk-hesaplama-' + sonuc.renk);

    document.getElementById('hc-trh-badge').textContent = sonuc.rozet;
    document.getElementById('hc-trh-kategori').textContent = sonuc.kategori;
    document.getElementById('hc-trh-olcum').textContent = 'Ölçüm: ' + hcTrhFormat(buyuk) + '/' + hcTrhFormat(kucuk) + ' kPa';
    document.getElementById('hc-trh-buyuk-sonuc').textContent = hcTrhFormat(buyuk) + ' kPa';
    document.getElementById('hc-trh-kucuk-sonuc').textContent = hcTrhFormat(kucuk) + ' kPa';
    document.getElementById('hc-trh-risk-duzeyi').textContent = sonuc.risk;
    document.getElementById('hc-trh-adim').textContent = sonuc.adim;
    document.getElementById('hc-trh-yorum').textContent = hcTrhEkRiskMetni(yas, ekRisk, sonuc);
    result.classList.add('visible');
}

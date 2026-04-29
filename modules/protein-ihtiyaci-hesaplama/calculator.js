function hcPihFormat(sayi, basamak) {
    return sayi.toLocaleString('tr-TR', {
        minimumFractionDigits: basamak,
        maximumFractionDigits: basamak
    });
}

function hcPihHedefBilgisi(hedef) {
    if (hedef === 'aktif') {
        return {
            alt: 1.4,
            ust: 1.6,
            ad: 'Düzenli egzersiz',
            yorum: 'Düzenli egzersiz yapan kişilerde ihtiyaç temel düzeyin üzerine çıkabilir.'
        };
    }

    if (hedef === 'kas') {
        return {
            alt: 1.6,
            ust: 2.0,
            ad: 'Kas kazanımı / yoğun egzersiz',
            yorum: 'Yoğun direnç egzersizi veya kas kazanımı hedefinde protein aralığı daha yüksek tutulabilir.'
        };
    }

    if (hedef === 'kilo-kaybi') {
        return {
            alt: 1.6,
            ust: 2.0,
            ad: 'Kilo kaybında kas koruma',
            yorum: 'Enerji açığı döneminde yeterli protein, kas kütlesini koruma hedefini destekleyebilir.'
        };
    }

    return {
        alt: 0.8,
        ust: 0.8,
        ad: 'Temel ihtiyaç',
        yorum: 'Temel ihtiyaç, sağlıklı ve düşük aktiviteli yetişkinler için alt referans düzey olarak düşünülür.'
    };
}

function hcPihDurumUyarisi(durum) {
    if (durum === 'bobrek') {
        return ' Böbrek hastalığı veya protein kısıtlaması varsa bu hesaplayıcı yerine doktorunuzun belirlediği miktarı izleyin.';
    }

    if (durum === 'gebelik') {
        return ' Gebelik veya emzirme döneminde ihtiyaç kişisel duruma göre değişebilir; diyetisyen veya doktor değerlendirmesi önemlidir.';
    }

    return '';
}

function hcProteinIhtiyaciHesapla() {
    var kilo = parseFloat(document.getElementById('hc-pih-kilo').value);
    var hedef = document.getElementById('hc-pih-hedef').value;
    var ogun = parseInt(document.getElementById('hc-pih-ogun').value, 10);
    var durum = document.getElementById('hc-pih-durum').value;
    var bilgi;
    var altGram;
    var ustGram;
    var ortaGram;
    var ogunAlt;
    var ogunUst;

    if (isNaN(kilo) || isNaN(ogun)) {
        alert('Lütfen kilo ve günlük öğün sayısı alanlarını doldurun.');
        return;
    }

    if (kilo < 30 || kilo > 250) {
        alert('Lütfen kilo için 30-250 kg arasında gerçekçi bir değer girin.');
        return;
    }

    if (ogun < 2 || ogun > 6) {
        alert('Lütfen öğün sayısını 2-6 arasında girin.');
        return;
    }

    bilgi = hcPihHedefBilgisi(hedef);
    altGram = kilo * bilgi.alt;
    ustGram = kilo * bilgi.ust;
    ortaGram = (altGram + ustGram) / 2;
    ogunAlt = altGram / ogun;
    ogunUst = ustGram / ogun;

    document.getElementById('hc-pih-ana-sonuc').textContent = hcPihFormat(ortaGram, 0) + ' g/gün';
    document.getElementById('hc-pih-ozet').textContent = bilgi.ad + ' için tahmini günlük protein hedefi.';
    document.getElementById('hc-pih-alt').textContent = hcPihFormat(altGram, 0) + ' g/gün';
    document.getElementById('hc-pih-ust').textContent = hcPihFormat(ustGram, 0) + ' g/gün';
    document.getElementById('hc-pih-katsayi').textContent = bilgi.alt === bilgi.ust ? hcPihFormat(bilgi.alt, 1) + ' g/kg/gün' : hcPihFormat(bilgi.alt, 1) + '-' + hcPihFormat(bilgi.ust, 1) + ' g/kg/gün';
    document.getElementById('hc-pih-ogun-sonuc').textContent = bilgi.alt === bilgi.ust ? hcPihFormat(ogunAlt, 0) + ' g/öğün' : hcPihFormat(ogunAlt, 0) + '-' + hcPihFormat(ogunUst, 0) + ' g/öğün';
    document.getElementById('hc-pih-yorum').textContent = bilgi.yorum + ' Hesaplama vücut ağırlığına göre yapılır ve günlük toplam hedefi gösterir.' + hcPihDurumUyarisi(durum);
    document.getElementById('hc-pih-result').classList.add('visible');
}

document.addEventListener('DOMContentLoaded', function() {
    var ogun = document.getElementById('hc-pih-ogun');

    if (ogun && !ogun.value) {
        ogun.value = '3';
    }
});

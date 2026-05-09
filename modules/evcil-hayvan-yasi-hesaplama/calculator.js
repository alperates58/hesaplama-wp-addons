var HC_EHY_KOPEK_EK_YIL = {
    kucuk: 4,
    orta: 5,
    buyuk: 6,
    dev: 7
};

function hcEhyFormat(sayi, basamak) {
    return sayi.toLocaleString('tr-TR', {
        minimumFractionDigits: basamak,
        maximumFractionDigits: basamak
    });
}

function hcEhyTurGuncelle() {
    var tur = document.getElementById('hc-ehy-tur').value;
    document.getElementById('hc-ehy-boyut-grup').style.display = tur === 'kopek' ? '' : 'none';
}

function hcEhyKediInsanYasi(yas) {
    if (yas <= 0) return 0;
    if (yas <= 1) return yas * 15;
    if (yas <= 2) return 15 + ((yas - 1) * 9);
    return 24 + ((yas - 2) * 4);
}

function hcEhyKopekInsanYasi(yas, boyut) {
    if (yas <= 0) return 0;
    if (yas <= 1) return yas * 15;
    if (yas <= 2) return 15 + ((yas - 1) * 9);
    return 24 + ((yas - 2) * HC_EHY_KOPEK_EK_YIL[boyut]);
}

function hcEhyEvre(tur, yas, boyut) {
    if (yas < 1) return 'Yavru';
    if (tur === 'kedi') {
        if (yas < 7) return 'Yetişkin';
        if (yas < 11) return 'Olgun';
        if (yas < 15) return 'Yaşlı';
        return 'İleri yaşlı';
    }

    if (yas < 7) return 'Yetişkin';
    if ((boyut === 'buyuk' || boyut === 'dev') && yas >= 7) return 'Yaşlı';
    if (yas < 10) return 'Olgun';
    return 'Yaşlı';
}

function hcEhySonrakiEvre(tur, yas, boyut) {
    var hedef;

    if (yas < 1) hedef = 1;
    else if (tur === 'kedi') hedef = yas < 7 ? 7 : (yas < 11 ? 11 : (yas < 15 ? 15 : null));
    else if (boyut === 'buyuk' || boyut === 'dev') hedef = yas < 7 ? 7 : null;
    else hedef = yas < 7 ? 7 : (yas < 10 ? 10 : null);

    if (!hedef) return 'Sonraki ana evre yok';

    return hcEhyFormat(Math.max(0, hedef - yas), 1) + ' yıl sonra';
}

function hcEhyNotlar(tur, evre) {
    var notlar = [];

    if (evre === 'Yavru') {
        notlar.push('Aşı, parazit takibi ve büyüme dönemi beslenmesi önceliklidir.');
        notlar.push('Sosyalleşme ve temel eğitim bu dönemde çok değerlidir.');
    } else if (evre === 'Yetişkin') {
        notlar.push('Yıllık veteriner kontrolü ve ideal kilo takibi önerilir.');
        notlar.push('Düzenli egzersiz ve diş bakımı yaşam kalitesini artırır.');
    } else {
        notlar.push('Daha sık veteriner kontrolü ve kan tahlili takibi faydalı olabilir.');
        notlar.push('Eklem, diş, kilo ve böbrek sağlığına daha yakından bakılmalıdır.');
    }

    if (tur === 'kedi') {
        notlar.push('Kedilerde su tüketimi ve tuvalet alışkanlığı değişimleri dikkatle izlenmelidir.');
    } else {
        notlar.push('Köpeklerde boyut grubu yaşlanma hızını etkiler; büyük ırklar daha erken yaşlı kabul edilebilir.');
    }

    return notlar;
}

function hcEhyNotlariYaz(notlar) {
    var liste = document.getElementById('hc-ehy-notlar');
    liste.innerHTML = '';

    notlar.forEach(function(not) {
        var item = document.createElement('li');
        item.textContent = not;
        liste.appendChild(item);
    });
}

function hcEvcilHayvanYasiHesapla() {
    var tur = document.getElementById('hc-ehy-tur').value;
    var boyut = document.getElementById('hc-ehy-boyut').value;
    var yil = parseInt(document.getElementById('hc-ehy-yil').value, 10);
    var ay = parseInt(document.getElementById('hc-ehy-ay').value, 10);

    if (isNaN(yil)) {
        alert('Lütfen evcil hayvanınızın yaşını yıl olarak girin.');
        return;
    }

    if (isNaN(ay)) {
        ay = 0;
    }

    if (yil < 0 || yil > 40 || ay < 0 || ay > 11) {
        alert('Lütfen yıl için 0-40, ay için 0-11 aralığında değer girin.');
        return;
    }

    if (yil === 0 && ay === 0) {
        alert('Yaş en az 1 ay olmalıdır.');
        return;
    }

    var yas = yil + (ay / 12);
    var insanYasi = tur === 'kedi' ? hcEhyKediInsanYasi(yas) : hcEhyKopekInsanYasi(yas, boyut);
    var evre = hcEhyEvre(tur, yas, boyut);
    var etki = tur === 'kedi' ? 'Kedi yaş çizelgesi' : (boyut.charAt(0).toUpperCase() + boyut.slice(1) + ' köpek grubu');
    var notlar = hcEhyNotlar(tur, evre);

    document.getElementById('hc-ehy-badge').textContent = hcEhyFormat(insanYasi, 0);
    document.getElementById('hc-ehy-insan-yasi').textContent = hcEhyFormat(insanYasi, 1) + ' insan yılı';
    document.getElementById('hc-ehy-ozet').textContent = 'Yaklaşık insan yaşı karşılığı.';
    document.getElementById('hc-ehy-gercek').textContent = yil.toLocaleString('tr-TR') + ' yıl ' + ay.toLocaleString('tr-TR') + ' ay';
    document.getElementById('hc-ehy-evre').textContent = evre;
    document.getElementById('hc-ehy-etki').textContent = etki;
    document.getElementById('hc-ehy-sonraki').textContent = hcEhySonrakiEvre(tur, yas, boyut);
    document.getElementById('hc-ehy-yorum').textContent = 'Bu hesaplama veteriner yaş çizelgelerine dayalı yaklaşık bir karşılaştırmadır; ırk, genetik, bakım ve sağlık durumu sonucu etkileyebilir.';

    hcEhyNotlariYaz(notlar);
    document.getElementById('hc-ehy-result').classList.add('visible');
}

document.addEventListener('DOMContentLoaded', function() {
    var tur = document.getElementById('hc-ehy-tur');

    if (tur) {
        tur.addEventListener('change', hcEhyTurGuncelle);
        hcEhyTurGuncelle();
    }
});

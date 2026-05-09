function hcDyFormat(sayi, basamak) {
    return sayi.toLocaleString('tr-TR', { minimumFractionDigits: basamak, maximumFractionDigits: basamak });
}

function hcDyGuncelle() {
    var cinsiyet = document.getElementById('hc-dy-cinsiyet').value;
    document.querySelectorAll('.hc-dy-erkek').forEach(function(el) { el.style.display = cinsiyet === 'erkek' ? '' : 'none'; });
    document.querySelectorAll('.hc-dy-kadin').forEach(function(el) { el.style.display = cinsiyet === 'kadin' ? '' : 'none'; });
}

function hcDyKategori(oran, cinsiyet) {
    if (cinsiyet === 'erkek') {
        if (oran < 14) return 'Atletik';
        if (oran < 18) return 'İyi seviye';
        if (oran < 25) return 'Normal';
        return 'Fazla yağlı';
    }

    if (oran < 21) return 'Atletik';
    if (oran < 25) return 'İyi seviye';
    if (oran < 32) return 'Normal';
    return 'Fazla yağlı';
}

function hcDeriKivrimiVucutYagiHesapla() {
    var yas = parseInt(document.getElementById('hc-dy-yas').value, 10);
    var cinsiyet = document.getElementById('hc-dy-cinsiyet').value;
    var kilo = parseFloat(document.getElementById('hc-dy-kilo').value);
    var uyluk = parseFloat(document.getElementById('hc-dy-uyluk').value);
    var toplam;

    if (!yas || isNaN(kilo) || isNaN(uyluk)) {
        alert('Lütfen yaş, kilo ve uyluk ölçümünü girin.');
        return;
    }

    if (yas < 18 || yas > 80 || kilo < 30 || kilo > 250 || uyluk <= 0) {
        alert('Lütfen gerçekçi değerler girin.');
        return;
    }

    if (cinsiyet === 'erkek') {
        var gogus = parseFloat(document.getElementById('hc-dy-gogus').value);
        var karin = parseFloat(document.getElementById('hc-dy-karin').value);
        if (isNaN(gogus) || isNaN(karin) || gogus <= 0 || karin <= 0) {
            alert('Lütfen göğüs, karın ve uyluk deri kıvrımı ölçümlerini mm olarak girin.');
            return;
        }
        toplam = gogus + karin + uyluk;
    } else {
        var triceps = parseFloat(document.getElementById('hc-dy-triceps').value);
        var suprailiak = parseFloat(document.getElementById('hc-dy-suprailiak').value);
        if (isNaN(triceps) || isNaN(suprailiak) || triceps <= 0 || suprailiak <= 0) {
            alert('Lütfen triceps, suprailiak ve uyluk deri kıvrımı ölçümlerini mm olarak girin.');
            return;
        }
        toplam = triceps + suprailiak + uyluk;
    }

    if (toplam < 5 || toplam > 220) {
        alert('Deri kıvrımı toplamı gerçekçi aralık dışında görünüyor.');
        return;
    }

    var yogunluk = cinsiyet === 'erkek'
        ? 1.10938 - (0.0008267 * toplam) + (0.0000016 * toplam * toplam) - (0.0002574 * yas)
        : 1.0994921 - (0.0009929 * toplam) + (0.0000023 * toplam * toplam) - (0.0001392 * yas);
    var yagOrani = (495 / yogunluk) - 450;
    var yagKutlesi = kilo * yagOrani / 100;
    var yagsizKutle = kilo - yagKutlesi;

    document.getElementById('hc-dy-oran').textContent = hcDyFormat(yagOrani, 1) + ' %';
    document.getElementById('hc-dy-kategori').textContent = hcDyKategori(yagOrani, cinsiyet);
    document.getElementById('hc-dy-yag').textContent = hcDyFormat(yagKutlesi, 1) + ' kg';
    document.getElementById('hc-dy-yagsiz').textContent = hcDyFormat(yagsizKutle, 1) + ' kg';
    document.getElementById('hc-dy-toplam').textContent = hcDyFormat(toplam, 1) + ' mm';
    document.getElementById('hc-dy-result').classList.add('visible');
}

document.addEventListener('DOMContentLoaded', function() {
    var secim = document.getElementById('hc-dy-cinsiyet');
    if (secim) {
        secim.addEventListener('change', hcDyGuncelle);
        hcDyGuncelle();
    }
});

function hcAyFarki(dogum, referans) {
    var ay = (referans.getFullYear() - dogum.getFullYear()) * 12;
    ay += referans.getMonth() - dogum.getMonth();

    if (referans.getDate() < dogum.getDate()) {
        ay -= 1;
    }

    return ay;
}

function hcOkulDurum(ay) {
    if (ay >= 69) {
        return {
            etiket: '1. Sınıfa Başlayabilir',
            detay: '69 ay ve üzeri olduğu için ilkokul 1. sınıfa başlama açısından uygundur.'
        };
    }

    if (ay >= 66) {
        return {
            etiket: 'Veli Talebiyle Başlayabilir',
            detay: '66-68 ay aralığında olduğu için veli talebi ile 1. sınıfa başlatılabilir.'
        };
    }

    if (ay >= 60) {
        return {
            etiket: 'Anaokulu / Erteleme Uygun',
            detay: '60-65 ay aralığında olduğu için okul öncesi eğitim veya erteleme değerlendirilir.'
        };
    }

    return {
        etiket: 'Henüz Erken',
        detay: '60 aydan küçük olduğu için ilkokula başlama için erken kabul edilir.'
    };
}

function hcOkulaBaslamaYasiHesapla() {
    var dogumVal = document.getElementById('hc-okul-dogum').value;
    var yilVal = parseInt(document.getElementById('hc-okul-yil').value, 10);

    if (!dogumVal) {
        alert('Lütfen doğum tarihini girin.');
        return;
    }

    var dogum = new Date(dogumVal + 'T00:00:00');
    var referans = new Date(yilVal + '-09-30T00:00:00');

    if (dogum > referans) {
        alert('Doğum tarihi seçilen eğitim yılı başlangıç tarihinden sonra olamaz.');
        return;
    }

    var toplamAy = hcAyFarki(dogum, referans);
    var yil = Math.floor(toplamAy / 12);
    var ay = toplamAy % 12;
    var durum = hcOkulDurum(toplamAy);

    document.getElementById('hc-okul-yas').textContent =
        '30 Eylül ' + yilVal.toLocaleString('tr-TR') + ' tarihinde yaş: ' + yil.toLocaleString('tr-TR') + ' yıl ' + ay.toLocaleString('tr-TR') + ' ay (' + toplamAy.toLocaleString('tr-TR') + ' ay)';

    document.getElementById('hc-okul-durum').textContent = durum.etiket;
    document.getElementById('hc-okul-detay').textContent = durum.detay;

    document.getElementById('hc-okul-result').classList.add('visible');
}

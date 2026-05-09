function hcFormatTrNumber(value) {
    return Number(value).toLocaleString('tr-TR');
}

document.addEventListener('DOMContentLoaded', function() {
    var btn = document.getElementById('hc-calculate-btn');
    if (btn) {
        btn.addEventListener('click', hcHesapla);
    }
});

function hcHesapla() {
    var quitDateStr = document.getElementById('hc-quit-date').value;
    var resultElement = document.getElementById('hc-result');
    if (!quitDateStr) {
        resultElement.innerHTML = '<p>Lütfen bir tarih girin.</p>';
        resultElement.classList.add('visible');
        return;
    }
    var quitDate = new Date(quitDateStr + 'T00:00:00');
    var now = new Date();
    var diffMs = now - quitDate;
    if (diffMs < 0) {
        resultElement.innerHTML = '<p>Gelecekteki bir tarih girdiniz. Lütfen geçmiş bir tarih girin.</p>';
        resultElement.classList.add('visible');
        return;
    }
    var diffMin = Math.floor(diffMs / (1000 * 60));
    var diffHours = Math.floor(diffMin / 60);
    var diffDays = Math.floor(diffHours / 24);
    var hours = diffHours % 24;
    var minutes = diffMin % 60;

    var message = '';
    var timeStr = diffDays + ' gün, ' + hours + ' saat, ' + minutes + ' dakika';

    if (diffMin < 20) {
        message = 'Henüz 20 dakika geçmedi. Vücudunuz iyileşmeye başlamak üzere.';
    } else if (diffMin < 480) {
        message = '20 dakika: Kan basıncı ve nabız normale döner.<br>8 saat: Kandaki karbonmonoksit seviyesi normale döner.';
    } else if (diffDays < 1) {
        message = '8 saat: Kandaki karbonmonoksit seviyesi normale döner.<br>24 saat: Kalp krizi riski azalmaya başlar.';
    } else if (diffDays < 2) {
        message = '24 saat: Vücut nikotini temizlemeye başlar.<br>48 saat: Tat ve koku duyuları iyileşir, sinir uçları yenilenir.';
    } else if (diffDays < 14) {
        message = '2-14 gün: Dolaşım sisteminiz iyileşir, akciğer fonksiyonları artar.';
    } else if (diffDays < 30) {
        message = '2-4 hafta: Akciğerlerdeki siliyalar yenilenir, öksürük ve solunum sorunları azalır.';
    } else if (diffDays < 90) {
        message = '1-3 ay: Kan dolaşımı önemli ölçüde iyileşir, kalp ve damar hastalıkları riski azalır.';
    } else if (diffDays < 365) {
        message = '3-12 ay: Akciğer fonksiyonları iyileşmeye devam eder, bağışıklık sistemi güçlenir. Bir yıl sonunda kalp krizi riski yarıya iner.';
    } else if (diffDays < 1825) {
        message = '1-5 yıl: Felç riski sigara içmeyenlerinkiyle aynı seviyeye düşer.';
    } else if (diffDays < 3650) {
        message = '5-10 yıl: Akciğer kanseri riski yarıya iner, ağız ve boğaz kanseri riski de azalır.';
    } else {
        message = '10+ yıl: Akciğer kanseri riski önemli ölçüde azalır, kalp hastalığı riski sigara içmeyenlerle aynı olur.';
    }

    resultElement.innerHTML = '<p><strong>Sigarayı bırakmanızdan bu yana geçen süre:</strong> ' + timeStr + '</p><p>' + message + '</p>';
    resultElement.classList.add('visible');
}

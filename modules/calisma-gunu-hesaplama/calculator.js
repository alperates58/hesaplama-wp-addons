var HC_CGH_GUN_ADLARI = ['Pazar', 'Pazartesi', 'Salı', 'Çarşamba', 'Perşembe', 'Cuma', 'Cumartesi'];

function hcCghPad(sayi) {
    return String(sayi).padStart(2, '0');
}

function hcCghFormat(sayi) {
    return sayi.toLocaleString('tr-TR');
}

function hcCghDateKey(date) {
    return date.getFullYear() + '-' + hcCghPad(date.getMonth() + 1) + '-' + hcCghPad(date.getDate());
}

function hcCghInputTarih(date) {
    return hcCghDateKey(date);
}

function hcCghTarihFormatla(date) {
    return date.toLocaleDateString('tr-TR', {
        day: 'numeric',
        month: 'long',
        year: 'numeric'
    });
}

function hcCghTarihOku(id) {
    var deger = document.getElementById(id).value;
    if (!deger) return null;

    var parca = deger.split('-');
    return new Date(parseInt(parca[0], 10), parseInt(parca[1], 10) - 1, parseInt(parca[2], 10), 0, 0, 0);
}

function hcCghSatirTarihOku(deger) {
    var temiz = deger.trim();
    var parca;

    if (!temiz) return null;

    if (/^\d{4}-\d{2}-\d{2}$/.test(temiz)) {
        parca = temiz.split('-');
        return new Date(parseInt(parca[0], 10), parseInt(parca[1], 10) - 1, parseInt(parca[2], 10), 0, 0, 0);
    }

    if (/^\d{1,2}\.\d{1,2}\.\d{4}$/.test(temiz)) {
        parca = temiz.split('.');
        return new Date(parseInt(parca[2], 10), parseInt(parca[1], 10) - 1, parseInt(parca[0], 10), 0, 0, 0);
    }

    return null;
}

function hcCghHaftaSonuGunleri() {
    var gunler = [];
    document.querySelectorAll('.hc-cgh-hafta-sonu:checked').forEach(function(input) {
        gunler.push(parseInt(input.value, 10));
    });
    return gunler;
}

function hcCghTatilHaritasi() {
    var raw = document.getElementById('hc-cgh-tatiller').value || '';
    var harita = {};

    raw.split(/[\r\n,]+/).forEach(function(satir) {
        var tarih = hcCghSatirTarihOku(satir);
        if (tarih) {
            harita[hcCghDateKey(tarih)] = tarih;
        }
    });

    return harita;
}

function hcCghListeYaz(tarihler) {
    var liste = document.getElementById('hc-cgh-tatil-listesi');
    liste.innerHTML = '';

    if (!tarihler.length) {
        var bos = document.createElement('li');
        bos.textContent = 'Çalışma gününden düşülen özel tarih yok.';
        liste.appendChild(bos);
        return;
    }

    tarihler.forEach(function(tarih) {
        var item = document.createElement('li');
        item.textContent = hcCghTarihFormatla(tarih) + ' - ' + HC_CGH_GUN_ADLARI[tarih.getDay()];
        liste.appendChild(item);
    });
}

function hcCalismaGunuHesapla() {
    var baslangic = hcCghTarihOku('hc-cgh-baslangic');
    var bitis = hcCghTarihOku('hc-cgh-bitis');
    var haftaSonu = hcCghHaftaSonuGunleri();
    var tatiller = hcCghTatilHaritasi();

    if (!baslangic || !bitis) {
        alert('Lütfen başlangıç ve bitiş tarihlerini seçin.');
        return;
    }

    if (baslangic > bitis) {
        alert('Başlangıç tarihi bitiş tarihinden sonra olamaz.');
        return;
    }

    if (haftaSonu.length === 7) {
        alert('Haftanın tüm günleri çalışma dışı seçilemez.');
        return;
    }

    var tarih = new Date(baslangic);
    var takvim = 0;
    var calisma = 0;
    var haftaSonuSayisi = 0;
    var tatilSayisi = 0;
    var dusulenTatiller = [];

    while (tarih <= bitis) {
        var key = hcCghDateKey(tarih);
        var gun = tarih.getDay();
        var haftaSonuMu = haftaSonu.indexOf(gun) !== -1;
        var tatilMi = !!tatiller[key];

        takvim += 1;

        if (haftaSonuMu) {
            haftaSonuSayisi += 1;
        } else if (tatilMi) {
            tatilSayisi += 1;
            dusulenTatiller.push(new Date(tarih));
        } else {
            calisma += 1;
        }

        tarih.setDate(tarih.getDate() + 1);
    }

    document.getElementById('hc-cgh-badge').textContent = hcCghFormat(calisma);
    document.getElementById('hc-cgh-calisma').textContent = hcCghFormat(calisma) + ' çalışma günü';
    document.getElementById('hc-cgh-ozet').textContent = 'Başlangıç ve bitiş tarihleri dahil hesaplandı.';
    document.getElementById('hc-cgh-takvim').textContent = hcCghFormat(takvim) + ' gün';
    document.getElementById('hc-cgh-is').textContent = hcCghFormat(calisma) + ' gün';
    document.getElementById('hc-cgh-hafta-sonu').textContent = hcCghFormat(haftaSonuSayisi) + ' gün';
    document.getElementById('hc-cgh-tatil').textContent = hcCghFormat(tatilSayisi) + ' gün';
    document.getElementById('hc-cgh-baslangic-gun').textContent = HC_CGH_GUN_ADLARI[baslangic.getDay()];
    document.getElementById('hc-cgh-bitis-gun').textContent = HC_CGH_GUN_ADLARI[bitis.getDay()];
    document.getElementById('hc-cgh-yorum').textContent = hcCghFormat(takvim) + ' takvim günü içinde ' + hcCghFormat(haftaSonuSayisi) + ' çalışma dışı hafta günü ve ' + hcCghFormat(tatilSayisi) + ' özel tatil düşüldü.';

    hcCghListeYaz(dusulenTatiller);
    document.getElementById('hc-cgh-result').classList.add('visible');
}

document.addEventListener('DOMContentLoaded', function() {
    var bugun = new Date();
    var baslangic = document.getElementById('hc-cgh-baslangic');
    var bitis = document.getElementById('hc-cgh-bitis');

    if (baslangic && !baslangic.value) {
        baslangic.value = hcCghInputTarih(bugun);
    }

    if (bitis && !bitis.value) {
        var sonraki = new Date(bugun);
        sonraki.setDate(sonraki.getDate() + 30);
        bitis.value = hcCghInputTarih(sonraki);
    }
});

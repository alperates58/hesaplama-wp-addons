var HC_TGE_GUN_ADLARI = ['Pazar', 'Pazartesi', 'Salı', 'Çarşamba', 'Perşembe', 'Cuma', 'Cumartesi'];

function hcTgePad(sayi) {
    return String(sayi).padStart(2, '0');
}

function hcTgeFormat(sayi) {
    return sayi.toLocaleString('tr-TR');
}

function hcTgeTarihOku(id) {
    var deger = document.getElementById(id).value;
    if (!deger) return null;

    var parca = deger.split('-');
    return new Date(parseInt(parca[0], 10), parseInt(parca[1], 10) - 1, parseInt(parca[2], 10), 0, 0, 0);
}

function hcTgeInputTarih(date) {
    return date.getFullYear() + '-' + hcTgePad(date.getMonth() + 1) + '-' + hcTgePad(date.getDate());
}

function hcTgeTarihFormatla(date) {
    return date.toLocaleDateString('tr-TR', {
        day: 'numeric',
        month: 'long',
        year: 'numeric'
    });
}

function hcTgeHaricGunler() {
    var gunler = [];
    document.querySelectorAll('.hc-tge-haric:checked').forEach(function(input) {
        gunler.push(parseInt(input.value, 10));
    });
    return gunler;
}

function hcTgeHaricMetni(gunler) {
    if (!gunler.length) return 'Yok';

    return gunler
        .slice()
        .sort(function(a, b) { return a - b; })
        .map(function(gun) { return HC_TGE_GUN_ADLARI[gun]; })
        .join(', ');
}

function hcTariheGunEklemeHesapla() {
    var baslangic = hcTgeTarihOku('hc-tge-baslangic');
    var eklenecek = parseInt(document.getElementById('hc-tge-gun').value, 10);
    var haricler = hcTgeHaricGunler();

    if (!baslangic || isNaN(eklenecek)) {
        alert('Lütfen başlangıç tarihi ve eklenecek gün sayısını girin.');
        return;
    }

    if (eklenecek < 0 || eklenecek > 10000) {
        alert('Lütfen eklenecek gün sayısını 0 ile 10.000 arasında girin.');
        return;
    }

    if (haricler.length === 7 && eklenecek > 0) {
        alert('Haftanın tüm günleri hariç tutulursa gün eklenemez.');
        return;
    }

    var tarih = new Date(baslangic);
    var sayilan = 0;
    var atlanan = 0;

    while (sayilan < eklenecek) {
        tarih.setDate(tarih.getDate() + 1);

        if (haricler.indexOf(tarih.getDay()) !== -1) {
            atlanan += 1;
            continue;
        }

        sayilan += 1;
    }

    var takvimFarki = Math.round((tarih.getTime() - baslangic.getTime()) / 86400000);
    var haricMetni = hcTgeHaricMetni(haricler);

    document.getElementById('hc-tge-badge').textContent = hcTgeFormat(eklenecek);
    document.getElementById('hc-tge-bitis').textContent = hcTgeTarihFormatla(tarih);
    document.getElementById('hc-tge-ozet').textContent = 'Seçilen kurallara göre hesaplanan bitiş tarihi.';
    document.getElementById('hc-tge-bitis-gun').textContent = HC_TGE_GUN_ADLARI[tarih.getDay()];
    document.getElementById('hc-tge-sayilan').textContent = hcTgeFormat(sayilan) + ' gün';
    document.getElementById('hc-tge-atlanan').textContent = hcTgeFormat(atlanan) + ' gün';
    document.getElementById('hc-tge-takvim').textContent = hcTgeFormat(takvimFarki) + ' takvim günü';
    document.getElementById('hc-tge-baslangic-gun').textContent = HC_TGE_GUN_ADLARI[baslangic.getDay()];
    document.getElementById('hc-tge-haricler').textContent = haricMetni;
    document.getElementById('hc-tge-yorum').textContent = 'Başlangıç tarihi sayılmadan ilerlenir. ' + haricMetni + ' günleri atlanarak ' + hcTgeFormat(sayilan) + ' gün sayıldı ve toplam ' + hcTgeFormat(takvimFarki) + ' takvim günü ilerlenmiş oldu.';
    document.getElementById('hc-tge-result').classList.add('visible');
}

document.addEventListener('DOMContentLoaded', function() {
    var input = document.getElementById('hc-tge-baslangic');
    if (input && !input.value) {
        input.value = hcTgeInputTarih(new Date());
    }
});

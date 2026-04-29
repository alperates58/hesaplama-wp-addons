function hcYghPad(sayi) {
    return String(sayi).padStart(2, '0');
}

function hcYghTarihOku(id) {
    var deger = document.getElementById(id).value;
    var parca;

    if (!deger) return null;

    parca = deger.split('-');
    return new Date(parseInt(parca[0], 10), parseInt(parca[1], 10) - 1, parseInt(parca[2], 10), 0, 0, 0);
}

function hcYghInputTarih(date) {
    return date.getFullYear() + '-' + hcYghPad(date.getMonth() + 1) + '-' + hcYghPad(date.getDate());
}

function hcYghGunEkle(date, gun) {
    var yeni = new Date(date.getFullYear(), date.getMonth(), date.getDate(), 0, 0, 0);
    yeni.setDate(yeni.getDate() + gun);
    return yeni;
}

function hcYghTarihFormatla(date) {
    return date.toLocaleDateString('tr-TR', { day: 'numeric', month: 'long', year: 'numeric' });
}

function hcYghTarihAraligiFormatla(baslangic, bitis) {
    if (baslangic.getTime() === bitis.getTime()) {
        return hcYghTarihFormatla(baslangic);
    }

    return hcYghTarihFormatla(baslangic) + ' - ' + hcYghTarihFormatla(bitis);
}

function hcYghBugun() {
    var simdi = new Date();
    return new Date(simdi.getFullYear(), simdi.getMonth(), simdi.getDate(), 0, 0, 0);
}

function hcYghDonguYorumu(dongu) {
    if (dongu < 24) {
        return 'Döngünüz kısa aralıkta görünüyor; tarih tahmini kişiden kişiye daha fazla değişebilir.';
    }

    if (dongu > 32) {
        return 'Döngünüz uzun aralıkta görünüyor; yumurtlama tarihi her ay aynı güne denk gelmeyebilir.';
    }

    return 'Döngü uzunluğunuza göre yumurtlama günü, sonraki adetten yaklaşık 14 gün önce tahmin edilir.';
}

function hcYumurtlamaGunuHesapla() {
    var sonAdet = hcYghTarihOku('hc-ygh-son-adet');
    var dongu = parseInt(document.getElementById('hc-ygh-dongu').value, 10);
    var bugun = hcYghBugun();
    var sonrakiAdet;
    var yumurtlama;
    var olasiBaslangic;
    var olasiBitis;
    var dogurganBaslangic;
    var dogurganBitis;
    var gecenGun;

    if (!sonAdet || isNaN(dongu)) {
        alert('Lütfen son adet tarihini ve ortalama döngü uzunluğunu girin.');
        return;
    }

    if (sonAdet > bugun) {
        alert('Son adet tarihi gelecekte olamaz.');
        return;
    }

    if (dongu < 21 || dongu > 35) {
        alert('Lütfen döngü uzunluğunu 21-35 gün arasında girin.');
        return;
    }

    gecenGun = Math.floor((bugun.getTime() - sonAdet.getTime()) / 86400000) + 1;

    if (gecenGun > 90) {
        alert('Son adet tarihi 90 günden eski görünüyor. Lütfen tarihi kontrol edin.');
        return;
    }

    sonrakiAdet = hcYghGunEkle(sonAdet, dongu);
    yumurtlama = hcYghGunEkle(sonrakiAdet, -14);
    olasiBaslangic = hcYghGunEkle(sonrakiAdet, -14);
    olasiBitis = hcYghGunEkle(sonrakiAdet, -12);
    dogurganBaslangic = hcYghGunEkle(yumurtlama, -5);
    dogurganBitis = hcYghGunEkle(yumurtlama, 1);

    document.getElementById('hc-ygh-ana-sonuc').textContent = hcYghTarihFormatla(yumurtlama);
    document.getElementById('hc-ygh-ozet').textContent = 'Tahmini yumurtlama günü';
    document.getElementById('hc-ygh-dogurgan').textContent = hcYghTarihAraligiFormatla(dogurganBaslangic, dogurganBitis);
    document.getElementById('hc-ygh-aralik').textContent = hcYghTarihAraligiFormatla(olasiBaslangic, olasiBitis);
    document.getElementById('hc-ygh-sonraki-adet').textContent = hcYghTarihFormatla(sonrakiAdet);
    document.getElementById('hc-ygh-dongu-gunu').textContent = gecenGun.toLocaleString('tr-TR') + '. gün';
    document.getElementById('hc-ygh-yorum').textContent = hcYghDonguYorumu(dongu) + ' Doğurgan günler, tahmini yumurtlama gününden önceki 5 gün ile yumurtlama gününün ertesi gününü kapsayacak şekilde gösterilir.';
    document.getElementById('hc-ygh-result').classList.add('visible');
}

document.addEventListener('DOMContentLoaded', function() {
    var dongu = document.getElementById('hc-ygh-dongu');

    if (dongu && !dongu.value) {
        dongu.value = '28';
    }
});

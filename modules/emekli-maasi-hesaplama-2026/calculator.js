function hcEmekliMaasiTL(n) {
    return n.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' TL';
}

function hcEmekliMaasiYuzde(n) {
    return (n * 100).toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + '%';
}

function hcEmekliMaasiDonem(baslangic) {
    var tarih1999 = new Date('1999-09-08T00:00:00');
    var tarih2008 = new Date('2008-04-30T00:00:00');

    if (baslangic < tarih1999) {
        return '2000 öncesi';
    }

    if (baslangic <= tarih2008) {
        return '2000-2008 arası';
    }

    return '2008 sonrası';
}

function hcEmekliMaasiABO(donem, hizmetYili, sigorta) {
    var oran;

    if (donem === '2000 öncesi') {
        oran = hizmetYili <= 10 ? 0.70 : 0.70 + ((Math.min(hizmetYili, 25) - 10) * 0.004);
        if (hizmetYili > 25) {
            oran += (hizmetYili - 25) * 0.01;
        }
        return Math.min(oran, 0.85);
    }

    if (donem === '2000-2008 arası') {
        oran = hizmetYili * 0.026;
        return Math.min(Math.max(oran, 0.35), 0.75);
    }

    oran = hizmetYili * 0.02;
    if (sigorta === '4C') {
        oran += 0.05;
    }

    return Math.min(Math.max(oran, 0.30), 0.70);
}

function hcEmekliMaasiHesapla2026() {
    var sigorta = document.getElementById('hc-emekli-sigorta').value;
    var baslangicDeger = document.getElementById('hc-emekli-baslangic').value;
    var kazanc = parseFloat(document.getElementById('hc-emekli-kazanc').value);
    var hizmetYili = parseFloat(document.getElementById('hc-emekli-hizmet').value);
    var kesinti = parseFloat(document.getElementById('hc-emekli-kesinti').value);
    var ekOdemeOrani = parseFloat(document.getElementById('hc-emekli-ek-odeme').value) / 100;

    if (!baslangicDeger) {
        alert('Lütfen sigorta başlangıç tarihini seçin.');
        return;
    }

    if (!kazanc || kazanc <= 0) {
        alert('Lütfen geçerli bir aylık ortalama brüt kazanç girin.');
        return;
    }

    if (!hizmetYili || hizmetYili <= 0) {
        alert('Lütfen geçerli bir toplam hizmet yılı girin.');
        return;
    }

    if (isNaN(kesinti) || kesinti < 0) {
        alert('Lütfen kesinti tutarını 0 TL veya daha yüksek girin.');
        return;
    }

    if (isNaN(ekOdemeOrani) || ekOdemeOrani < 0) {
        alert('Lütfen geçerli bir ek ödeme oranı girin.');
        return;
    }

    var baslangic = new Date(baslangicDeger + 'T00:00:00');
    var donem = hcEmekliMaasiDonem(baslangic);
    var abo = hcEmekliMaasiABO(donem, hizmetYili, sigorta);
    var zamOrani = sigorta === '4C' ? 0.186 : 0.1219;
    var tabanAylik = sigorta === '4C' ? 27877 : 20000;
    var kokAylik = kazanc * abo;
    var zamliKok = kokAylik * (1 + zamOrani);
    var ekOdeme = zamliKok * ekOdemeOrani;
    var kesintiOncesi = zamliKok + ekOdeme;
    var destek = Math.max(0, tabanAylik - kesintiOncesi);
    var netAylik = Math.max(0, kesintiOncesi + destek - kesinti);
    var yillik = netAylik * 12;

    document.getElementById('hc-emekli-net').textContent = hcEmekliMaasiTL(netAylik);
    document.getElementById('hc-emekli-abo').textContent = hcEmekliMaasiYuzde(abo);
    document.getElementById('hc-emekli-kok').textContent = hcEmekliMaasiTL(kokAylik);
    document.getElementById('hc-emekli-zam').textContent = hcEmekliMaasiYuzde(zamOrani);
    document.getElementById('hc-emekli-zamli').textContent = hcEmekliMaasiTL(zamliKok);
    document.getElementById('hc-emekli-ek').textContent = hcEmekliMaasiTL(ekOdeme);
    document.getElementById('hc-emekli-destek').textContent = hcEmekliMaasiTL(destek);
    document.getElementById('hc-emekli-kesinti-sonuc').textContent = hcEmekliMaasiTL(kesinti);
    document.getElementById('hc-emekli-yillik').textContent = hcEmekliMaasiTL(yillik);
    document.getElementById('hc-emekli-not').textContent = donem + ' dönemi ve ' + sigorta + ' statüsü için yaklaşık hesaplamadır. Kesin aylık; SGK prime esas kazanç dökümü, prim günleri, güncelleme katsayıları ve kişisel dosya bilgilerine göre değişebilir.';
    document.getElementById('hc-emekli-maasi-hesaplama-2026-result').classList.add('visible');
}

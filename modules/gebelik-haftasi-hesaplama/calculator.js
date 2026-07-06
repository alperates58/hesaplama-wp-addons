function hcGebelikHaftasiPad(sayi) {
    return String(sayi).padStart(2, '0');
}

function hcGebelikHaftasiFormat(sayi) {
    return sayi.toLocaleString('tr-TR');
}

function hcGebelikHaftasiTarihOku(id) {
    var deger = document.getElementById(id).value;
    var parca;

    if (!deger) return null;

    parca = deger.split('-');
    return new Date(parseInt(parca[0], 10), parseInt(parca[1], 10) - 1, parseInt(parca[2], 10), 0, 0, 0);
}

function hcGebelikHaftasiInputTarih(date) {
    return date.getFullYear() + '-' + hcGebelikHaftasiPad(date.getMonth() + 1) + '-' + hcGebelikHaftasiPad(date.getDate());
}

function hcGebelikHaftasiTarihFormatla(date) {
    return date.toLocaleDateString('tr-TR', { day: 'numeric', month: 'long', year: 'numeric' });
}

function hcGebelikHaftasiGunEkle(date, gun) {
    var yeni = new Date(date.getFullYear(), date.getMonth(), date.getDate(), 0, 0, 0);
    yeni.setDate(yeni.getDate() + gun);
    return yeni;
}

function hcGebelikHaftasiDonem(hafta) {
    if (hafta < 13) return '1. trimester';
    if (hafta < 27) return '2. trimester';
    if (hafta < 40) return '3. trimester';
    if (hafta < 42) return '40 hafta sonrası';
    return '42 hafta ve üzeri';
}

function hcGebelikHaftasiKalanMetin(kalanGun) {
    var hafta;
    var gun;

    if (kalanGun <= 0) return 'Tahmini doğum tarihi geçti';

    hafta = Math.floor(kalanGun / 7);
    gun = kalanGun % 7;

    if (hafta === 0) return hcGebelikHaftasiFormat(gun) + ' gün';
    if (gun === 0) return hcGebelikHaftasiFormat(hafta) + ' hafta';
    return hcGebelikHaftasiFormat(hafta) + ' hafta ' + hcGebelikHaftasiFormat(gun) + ' gün';
}

function hcGebelikHaftasiYorum(hafta, gun, kalanGun) {
    if (hafta < 0) return '';
    if (hafta < 13) return 'Gebeliğin erken dönemindesiniz. Bu dönemde doktor kontrolleri ve önerilen takipler önemlidir.';
    if (hafta < 27) return 'Gebeliğin ikinci trimester dönemindesiniz. Takiplerinizi düzenli sürdürmeniz önerilir.';
    if (hafta < 37) return 'Gebeliğin üçüncü trimester dönemindesiniz. Doğuma kalan süre giderek azalıyor.';
    if (hafta < 40) return '37. haftadan sonra doğum zamanı yaklaşmış kabul edilir. Doktorunuzun takip planına uyun.';
    if (kalanGun <= 0 && hafta < 42) return 'Tahmini doğum tarihi geçmiş görünüyor. Bu durumda doktor kontrolü özellikle önemlidir.';
    return '42 hafta ve üzeri gebeliklerde tıbbi değerlendirme gerekir. Lütfen doktorunuzla görüşün.';
}

function hcGebelikHaftasiHesapla() {
    var sat = hcGebelikHaftasiTarihOku('hc-gebelik-haftasi-sat');
    var bugun = hcGebelikHaftasiTarihOku('hc-gebelik-haftasi-bugun');
    var simdi = new Date();
    var gecenGun;
    var hafta;
    var gun;
    var dogum;
    var kalanGun;
    var yuzde;

    if (!sat || !bugun) {
        alert('Lütfen son adet tarihini ve hesaplama tarihini seçin.');
        return;
    }

    if (sat > bugun) {
        alert('Son adet tarihi hesaplama tarihinden sonra olamaz.');
        return;
    }

    if (sat > simdi) {
        alert('Son adet tarihi gelecekte olamaz.');
        return;
    }

    gecenGun = Math.floor((bugun.getTime() - sat.getTime()) / 86400000);

    if (gecenGun > 315) {
        alert('Girilen tarihe göre süre 45 haftayı aşıyor. Lütfen tarihi kontrol edin.');
        return;
    }

    hafta = Math.floor(gecenGun / 7);
    gun = gecenGun % 7;
    dogum = hcGebelikHaftasiGunEkle(sat, 280);
    kalanGun = Math.ceil((dogum.getTime() - bugun.getTime()) / 86400000);
    yuzde = Math.max(0, Math.min(100, (gecenGun / 280) * 100));

    var yorumText = hcGebelikHaftasiYorum(hafta, gun, kalanGun);
    var donemText = hcGebelikHaftasiDonem(hafta);
    if (typeof window.HC !== 'undefined' && typeof window.HC.ResultEngine !== 'undefined' && window.HC.ResultEngine.render('gebelik-haftasi-hesaplama', {
        primaryResult: hafta + ' Hafta ' + gun + ' Gün',
        shortSummary: 'Tahmini gebelik süresi hesaplandı.',
        interpretation: yorumText,
        referenceTable: {
            headers: ['Ölçüm', 'Değer'],
            rows: [
                ['Gebelik Haftası', hafta + ' Hafta ' + gun + ' Gün'],
                ['Toplam Geçen Gün', hcGebelikHaftasiFormat(gecenGun) + ' Gün'],
                ['Tahmini Doğum Tarihi', hcGebelikHaftasiTarihFormatla(dogum)],
                ['Kalan Süre', hcGebelikHaftasiKalanMetin(kalanGun)],
                ['Gebelik Dönemi (Trimester)', donemText],
                ['Tamamlanma Oranı', yuzde.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + '%']
            ],
            highlightedRowIndex: 0
        },
        formula: {
            raw: 'Gebelik Süresi = Hesaplama Tarihi - Son Adet Tarihi (SAT)',
            text: 'Gebelik süresi, son adet tarihinin (SAT) ilk gününden itibaren geçen gün sayısının haftaya çevrilmesiyle hesaplanır. İdeal gebelik süresi 280 gün (40 hafta) kabul edilir.'
        },
        source: {
            name: 'ACOG (American College of Obstetricians and Gynecologists)',
            url: 'https://www.acog.org'
        },
        nextActions: [
            'Haftalık gebelik takibinizi aksatmamak için doktor kontrollerinizi planlayın.',
            'Sağlıklı beslenme ve doktor onaylı egzersiz programları uygulayın.',
            'Trimester dönemine uygun tarama testleri ve aşılar hakkında hekiminize danışın.'
        ],
        faq: [
            { question: "Tahmini doğum tarihi nasıl hesaplanır?", answer: "Son adet tarihinin (SAT) ilk gününe 280 gün (40 hafta) eklenerek hesaplanır." },
            { question: "Trimester nedir?", answer: "Yaklaşık 3\'er aylık dönemlerden oluşan 3 ana gebelik evresidir." }
        ],
        metadata: {
            severity: 'info',
            status: 'success',
            lastUpdated: '2026-07-06',
            badges: ['Sağlık & Tıp', donemText]
        }
    })) {
        return;
    }

    document.getElementById('hc-gebelik-haftasi-badge').textContent = hafta + '. hafta';
    document.getElementById('hc-gebelik-haftasi-ana-sonuc').textContent = hafta + ' hafta ' + gun + ' gün';
    document.getElementById('hc-gebelik-haftasi-ozet').textContent = 'Son adet tarihine göre tahmini gebelik süresi.';
    document.getElementById('hc-gebelik-haftasi-dogum').textContent = hcGebelikHaftasiTarihFormatla(dogum);
    document.getElementById('hc-gebelik-haftasi-kalan').textContent = hcGebelikHaftasiKalanMetin(kalanGun);
    document.getElementById('hc-gebelik-haftasi-gecen').textContent = hcGebelikHaftasiFormat(gecenGun) + ' gün';
    document.getElementById('hc-gebelik-haftasi-donem').textContent = hcGebelikHaftasiDonem(hafta);
    document.getElementById('hc-gebelik-haftasi-yuzde').textContent = yuzde.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + '%';
    document.getElementById('hc-gebelik-haftasi-bar').style.width = yuzde + '%';
    document.getElementById('hc-gebelik-haftasi-yorum').textContent = hcGebelikHaftasiYorum(hafta, gun, kalanGun);
    document.getElementById('hc-gebelik-haftasi-result').classList.add('visible');
}

document.addEventListener('DOMContentLoaded', function() {
    var bugun = document.getElementById('hc-gebelik-haftasi-bugun');
    if (bugun && !bugun.value) {
        bugun.value = hcGebelikHaftasiInputTarih(new Date());
    }
});

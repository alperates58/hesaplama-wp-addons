function hcIdealKiloFormat(sayi, basamak) {
    return sayi.toLocaleString('tr-TR', {
        minimumFractionDigits: basamak,
        maximumFractionDigits: basamak
    });
}

function hcIdealKiloKg(sayi) {
    return hcIdealKiloFormat(sayi, 1) + ' kg';
}

function hcIdealKiloFormulleri(boy, cinsiyet) {
    var farkCm = boy - 152.4;

    if (cinsiyet === 'erkek') {
        return {
            devine: 50 + (0.905512 * farkCm),
            robinson: 52 + (0.748031 * farkCm),
            miller: 56.2 + (0.555118 * farkCm),
            hamwi: 48 + (1.062992 * farkCm)
        };
    }

    return {
        devine: 45.5 + (0.905512 * farkCm),
        robinson: 49 + (0.669291 * farkCm),
        miller: 53.1 + (0.535433 * farkCm),
        hamwi: 45.5 + (0.866142 * farkCm)
    };
}

function hcIdealKiloBkiKategori(bki) {
    if (bki < 18.5) return 'zayıf aralıkta';
    if (bki < 25) return 'sağlıklı aralıkta';
    if (bki < 30) return 'fazla kilolu aralıkta';
    return 'obezite aralığında';
}

function hcIdealKiloOzet(kilo, ortalama, alt, ust, bki) {
    var kategori = hcIdealKiloBkiKategori(bki);

    if (kilo < alt) {
        return 'Mevcut kilonuz sağlıklı BKİ aralığının altında ve BKİ değeriniz ' + kategori + '. Ortalama ideal kilo tahminine ulaşmak için yaklaşık ' + hcIdealKiloKg(ortalama - kilo) + ' artış gerekir.';
    }

    if (kilo > ust) {
        return 'Mevcut kilonuz sağlıklı BKİ aralığının üzerinde ve BKİ değeriniz ' + kategori + '. Ortalama ideal kilo tahminine göre yaklaşık ' + hcIdealKiloKg(kilo - ortalama) + ' fark bulunuyor.';
    }

    var fark = Math.abs(kilo - ortalama);
    return 'Mevcut kilonuz sağlıklı BKİ aralığında ve BKİ değeriniz ' + kategori + '. Formüllerin ortalamasıyla aranızdaki fark yaklaşık ' + hcIdealKiloKg(fark) + '.';
}

function hcIdealKiloHesapla() {
    var boy = parseFloat(document.getElementById('hc-ideal-kilo-boy').value);
    var kilo = parseFloat(document.getElementById('hc-ideal-kilo-kilo').value);
    var cinsiyet = document.getElementById('hc-ideal-kilo-cinsiyet').value;
    var yas = parseInt(document.getElementById('hc-ideal-kilo-yas').value, 10);

    if (isNaN(boy) || isNaN(kilo) || isNaN(yas)) {
        alert('Lütfen boy, kilo ve yaş alanlarını doldurun.');
        return;
    }

    if (yas < 18 || yas > 100) {
        alert('Bu hesaplama yetişkinler içindir. Lütfen 18 ile 100 arasında bir yaş girin.');
        return;
    }

    if (boy < 153 || boy > 230) {
        alert('Lütfen 153 cm ile 230 cm arasında geçerli bir boy girin.');
        return;
    }

    if (kilo < 30 || kilo > 300) {
        alert('Lütfen 30 kg ile 300 kg arasında geçerli bir kilo girin.');
        return;
    }

    var boyMetre = boy / 100;
    var bki = kilo / Math.pow(boyMetre, 2);
    var saglikliAlt = 18.5 * Math.pow(boyMetre, 2);
    var saglikliUst = 24.9 * Math.pow(boyMetre, 2);
    var formuller = hcIdealKiloFormulleri(boy, cinsiyet);
    var ortalama = (formuller.devine + formuller.robinson + formuller.miller + formuller.hamwi) / 4;

    document.getElementById('hc-ideal-kilo-ortalama').textContent = hcIdealKiloKg(ortalama);
    document.getElementById('hc-ideal-kilo-bki').textContent = hcIdealKiloFormat(bki, 1) + ' kg/m²';
    document.getElementById('hc-ideal-kilo-aralik').textContent = hcIdealKiloKg(saglikliAlt) + ' - ' + hcIdealKiloKg(saglikliUst);
    document.getElementById('hc-ideal-kilo-ozet').textContent = hcIdealKiloOzet(kilo, ortalama, saglikliAlt, saglikliUst, bki);
    document.getElementById('hc-ideal-kilo-devine').textContent = hcIdealKiloKg(formuller.devine);
    document.getElementById('hc-ideal-kilo-robinson').textContent = hcIdealKiloKg(formuller.robinson);
    document.getElementById('hc-ideal-kilo-miller').textContent = hcIdealKiloKg(formuller.miller);
    document.getElementById('hc-ideal-kilo-hamwi').textContent = hcIdealKiloKg(formuller.hamwi);
    document.getElementById('hc-ideal-kilo-result').classList.add('visible');
}

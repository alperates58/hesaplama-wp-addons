function hcGsiFormat(litre) {
    return litre.toLocaleString('tr-TR', {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    });
}

function hcGsiHavaEki(hava) {
    if (hava === 'sicak') {
        return 0.5;
    }

    if (hava === 'cok-sicak') {
        return 1;
    }

    return 0;
}

function hcGsiDurumEki(durum) {
    if (durum === 'gebelik') {
        return 0.3;
    }

    if (durum === 'emzirme') {
        return 0.7;
    }

    return 0;
}

function hcGsiDurumMetni(hava, durum) {
    var metinler = [];

    if (hava === 'sicak') {
        metinler.push('sıcak veya nemli ortam');
    } else if (hava === 'cok-sicak') {
        metinler.push('çok sıcak ortam veya yoğun terleme');
    }

    if (durum === 'gebelik') {
        metinler.push('gebelik');
    } else if (durum === 'emzirme') {
        metinler.push('emzirme');
    }

    return metinler.length ? metinler.join(', ') : 'ek durum yok';
}

function hcGunlukSuIhtiyaciHesapla() {
    var kilo = parseFloat(document.getElementById('hc-gsi-kilo').value);
    var aktivite = parseFloat(document.getElementById('hc-gsi-aktivite').value);
    var hava = document.getElementById('hc-gsi-hava').value;
    var durum = document.getElementById('hc-gsi-durum').value;

    if (isNaN(kilo) || isNaN(aktivite)) {
        alert('Lütfen kilo ve günlük egzersiz süresi alanlarını doldurun.');
        return;
    }

    if (kilo < 30 || kilo > 250) {
        alert('Lütfen kilo için gerçekçi bir kg değeri girin.');
        return;
    }

    if (aktivite < 0 || aktivite > 300) {
        alert('Lütfen egzersiz süresini 0-300 dakika arasında girin.');
        return;
    }

    var temel = kilo * 0.035;
    var aktiviteEk = (aktivite / 30) * 0.35;
    var digerEk = hcGsiHavaEki(hava) + hcGsiDurumEki(durum);
    var toplam = temel + aktiviteEk + digerEk;
    var alt = Math.max(1.5, toplam - 0.25);
    var ust = toplam + 0.25;

    document.getElementById('hc-gsi-toplam').textContent = hcGsiFormat(toplam) + ' L/gün';
    document.getElementById('hc-gsi-ozet').textContent = 'Tahmini günlük su ihtiyacınız.';
    document.getElementById('hc-gsi-temel').textContent = hcGsiFormat(temel) + ' L';
    document.getElementById('hc-gsi-aktivite-ek').textContent = hcGsiFormat(aktiviteEk) + ' L';
    document.getElementById('hc-gsi-diger-ek').textContent = hcGsiFormat(digerEk) + ' L';
    document.getElementById('hc-gsi-alt').textContent = hcGsiFormat(alt) + ' L/gün';
    document.getElementById('hc-gsi-ust').textContent = hcGsiFormat(ust) + ' L/gün';
    document.getElementById('hc-gsi-yorum').textContent = 'Hesaplama 35 ml/kg temel ihtiyaca, egzersiz süresi ve ' + hcGsiDurumMetni(hava, durum) + ' eklemelerine göre yapılır. Su ihtiyacının bir kısmı yiyeceklerden de karşılanabilir.';
    document.getElementById('hc-gsi-result').classList.add('visible');
}

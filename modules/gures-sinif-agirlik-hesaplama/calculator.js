var hcGuresSikletleri = {
    'senior': {
        'serbest': [57, 61, 65, 70, 74, 79, 86, 92, 97, 125],
        'grekoromen': [55, 60, 63, 67, 72, 77, 82, 87, 97, 130],
        'kadin-serbest': [50, 53, 55, 57, 59, 62, 65, 68, 72, 76]
    },
    'u20': {
        'serbest': [57, 61, 65, 70, 74, 79, 86, 92, 97, 125],
        'grekoromen': [55, 60, 63, 67, 72, 77, 82, 87, 97, 130],
        'kadin-serbest': [50, 53, 55, 57, 59, 62, 65, 68, 72, 76]
    },
    'u17': {
        'serbest': [41, 45, 48, 51, 55, 60, 65, 71, 80, 92, 110],
        'grekoromen': [41, 45, 48, 51, 55, 60, 65, 71, 80, 92, 110],
        'kadin-serbest': [36, 40, 43, 46, 49, 53, 57, 61, 65, 69, 73]
    },
    'u15': {
        'serbest': [34, 38, 41, 44, 48, 52, 57, 62, 68, 75, 85],
        'grekoromen': [34, 38, 41, 44, 48, 52, 57, 62, 68, 75, 85],
        'kadin-serbest': [29, 33, 36, 39, 42, 46, 50, 54, 58, 62, 66]
    }
};

function hcGuresAgirlikHesapla() {
    var kilo = parseFloat(document.getElementById('hc-gsa-kilo').value) || 0;
    var yas = document.getElementById('hc-gsa-yas').value;
    var stil = document.getElementById('hc-gsa-stil').value;

    if (kilo <= 20) {
        alert('Lütfen geçerli bir kilo giriniz.');
        return;
    }

    var sikletler = hcGuresSikletleri[yas][stil];
    if (!sikletler) {
        alert('Stil ve yaş grubu uyuşmazlığı tespit edildi.');
        return;
    }

    var altSiklet = null;
    var ustSiklet = null;

    for (var i = 0; i < sikletler.length; i++) {
        var s = sikletler[i];
        if (s <= kilo) {
            altSiklet = s;
        }
        if (s >= kilo && ustSiklet === null) {
            ustSiklet = s;
        }
    }

    if (altSiklet === null) altSiklet = sikletler[0];
    if (ustSiklet === null) ustSiklet = sikletler[sikletler.length - 1];

    var farkAlt = kilo - altSiklet;
    var farkUst = ustSiklet - kilo;

    var oneri = '';
    var taktik = '';

    // Eğer tam siklet kütlesindeyse
    if (farkAlt === 0) {
        oneri = altSiklet + ' kg Sıkleti';
        taktik = 'Tam sıklet kilonuzdasınız. Formunuzu koruyun.';
    } else {
        // Eğer alt sıklete daha yakınsa ve düşülecek kilo vücut ağırlığının %7'sinden azsa
        var cutLimit = kilo * 0.07;
        if (farkAlt <= cutLimit) {
            oneri = altSiklet + ' kg Sıkleti (Kilo Düşerek)';
            taktik = farkAlt.toFixed(1) + ' kg terleme ve diyetle verilerek alt sıklette yarışılması fiziksel güç avantajı sağlar.';
        } else {
            oneri = ustSiklet + ' kg Sıkleti (Kilo Alarak / Kas Kütlesiyle)';
            taktik = 'Alt sıklet için ' + farkAlt.toFixed(1) + ' kg düşmek çok riskli. Güç kaybı yaşamamak için ' + farkUst.toFixed(1) + ' kg kas kütlesi ekleyerek bir üst sıklete yerleşin.';
        }
    }

    document.getElementById('hc-gsa-res-alt').innerText = altSiklet + ' kg (-' + farkAlt.toFixed(1) + ' kg)';
    document.getElementById('hc-gsa-res-ust').innerText = ustSiklet + ' kg (+' + farkUst.toFixed(1) + ' kg)';
    document.getElementById('hc-gsa-res-oneri').innerText = oneri;
    document.getElementById('hc-gsa-res-taktik').innerText = taktik;

    document.getElementById('hc-gsa-result').classList.add('visible');
}
var hcBpmTaps = [];
function hcBpmTap() {
    var now = new Date().getTime();
    hcBpmTaps.push(now);

    if (hcBpmTaps.length > 10) {
        hcBpmTaps.shift(); // En son 10 tıklamayı tut
    }

    var sayacText = document.getElementById('hc-bpm-sayac');
    sayacText.innerText = 'Tıklama Sayısı: ' + hcBpmTaps.length;

    if (hcBpmTaps.length < 2) {
        return;
    }

    var farklarSum = 0;
    for (var i = 1; i < hcBpmTaps.length; i++) {
        farklarSum += (hcBpmTaps[i] - hcBpmTaps[i-1]);
    }
    
    var ortalamaMs = farklarSum / (hcBpmTaps.length - 1);
    var bpm = 60000 / ortalamaMs;

    hcBpmSonuclariGoster(bpm, ortalamaMs);
}

function hcBpmManuelHesapla() {
    var vurus = parseFloat(document.getElementById('hc-bpm-vurus').value) || 0;
    var sure = parseFloat(document.getElementById('hc-bpm-sure').value) || 0;

    if (vurus <= 0 || sure <= 0) {
        alert('Lütfen vuruş sayısını ve süreyi giriniz.');
        return;
    }

    var bpm = (vurus / sure) * 60;
    var ortalamaMs = 60000 / bpm;
    hcBpmSonuclariGoster(bpm, ortalamaMs);
}

function hcBpmSonuclariGoster(bpm, ms) {
    document.getElementById('hc-bpm-res-bpm').innerText = Math.round(bpm) + ' BPM';
    document.getElementById('hc-bpm-res-ms').innerText = Math.round(ms) + ' ms';

    var terim = 'Moderato';
    if (bpm < 60) {
        terim = 'Largo (Çok Yavaş)';
    } else if (bpm < 76) {
        terim = 'Adagio (Yavaş)';
    } else if (bpm < 108) {
        terim = 'Andante (Ağırdan Orta Tempoluya)';
    } else if (bpm < 120) {
        terim = 'Moderato (Orta Hızda)';
    } else if (bpm < 168) {
        terim = 'Allegro (Hızlı)';
    } else {
        terim = 'Presto (Çok Hızlı)';
    }
    
    document.getElementById('hc-bpm-res-terim').innerText = terim;
    document.getElementById('hc-bpm-result').classList.add('visible');
}

function hcBpmSifirla() {
    hcBpmTaps = [];
    document.getElementById('hc-bpm-sayac').innerText = 'En az 4 kez tıklayın.';
    document.getElementById('hc-bpm-result').classList.remove('visible');
}
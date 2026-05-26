var hcDsrState = 'idle'; // idle, waiting, ready
var hcDsrStartTime = 0;
var hcDsrTimeout = null;
var hcDsrTrials = [];

function hcDsrClickGameBox() {
    var box = document.getElementById('hc-dsr-game-box');

    if (hcDsrState === 'idle') {
        // Başlat
        hcDsrState = 'waiting';
        box.style.background = '#eab308';
        box.innerText = 'BEKLE... SARI ALAN YEŞİL OLACAK';
        
        var randomDelay = 1500 + Math.random() * 3000; // 1.5 - 4.5 sn
        hcDsrTimeout = setTimeout(function() {
            hcDsrState = 'ready';
            box.style.background = '#22c55e';
            box.innerText = 'ŞİMDİ TIKLA!';
            hcDsrStartTime = Date.now();
        }, randomDelay);

    } else if (hcDsrState === 'waiting') {
        // Erken tıklama
        clearTimeout(hcDsrTimeout);
        hcDsrState = 'idle';
        box.style.background = '#ef4444';
        box.innerText = 'ERKEN TIKLADINIZ! TEKRAR BAŞLATMAK İÇİN TIKLA';
        alert('Erken tıkladınız! Lütfen yeşile dönmesini bekleyin.');

    } else if (hcDsrState === 'ready') {
        // Doğru zamanda tıklama
        var reactionTime = Date.now() - hcDsrStartTime;
        hcDsrTrials.push(reactionTime);
        hcDsrState = 'idle';
        box.style.background = '#ef4444';
        box.innerText = 'KAYDEDİLDİ (' + reactionTime + ' ms). BAŞLATMAK İÇİN TEKRAR TIKLA';

        hcDsrUpdateResults();
    }
}

function hcDsrUpdateResults() {
    var last = hcDsrTrials[hcDsrTrials.length - 1];
    document.getElementById('hc-dsr-res-last').innerText = last + ' ms';
    document.getElementById('hc-dsr-res-history').innerText = hcDsrTrials.join('ms, ') + 'ms';

    // Ortalama
    var sum = 0;
    for (var i = 0; i < hcDsrTrials.length; i++) {
        sum += hcDsrTrials[i];
    }
    var avg = sum / hcDsrTrials.length;
    document.getElementById('hc-dsr-res-avg').innerText = Math.round(avg) + ' ms';

    // Değerlendirme
    var rating = 'Sıradan Refleks';
    var renk = '#fff';
    if (avg < 180) {
        rating = 'Işık Hızında / Elit Dövüşçü';
        renk = 'var(--hc-front-green)';
    } else if (avg < 230) {
        rating = 'Oldukça Hızlı / Profesyonel Sporcu';
        renk = '#22c55e';
    } else if (avg < 300) {
        rating = 'Ortalama Refleks Kapasitesi';
        renk = '#eab308';
    } else {
        rating = 'Yavaş (Refleks çalışması yapılmalı)';
        renk = '#ef4444';
    }
    
    document.getElementById('hc-dsr-res-rating').innerText = rating;
    document.getElementById('hc-dsr-res-rating').style.color = renk;

    document.getElementById('hc-dsr-result').classList.add('visible');
}

function hcDsrResetGame() {
    hcDsrTrials = [];
    hcDsrState = 'idle';
    var box = document.getElementById('hc-dsr-game-box');
    box.style.background = '#ef4444';
    box.innerText = 'BAŞLAMAK İÇİN TIKLA';
    document.getElementById('hc-dsr-result').classList.remove('visible');
}
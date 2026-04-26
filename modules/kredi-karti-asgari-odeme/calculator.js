function hcKKAOHesapla() {
    var borc       = parseFloat(document.getElementById('hc-kkao-borc').value);
    var faizOrani  = parseFloat(document.getElementById('hc-kkao-faiz').value) / 100;
    var asgarıOran = parseFloat(document.getElementById('hc-kkao-oran').value) / 100;

    if (!borc || borc <= 0) {
        alert('Lütfen geçerli bir borç tutarı girin.');
        return;
    }

    var ilkOdeme    = borc * asgarıOran;
    var kalanBorc   = borc - ilkOdeme;
    var toplamFaiz  = 0;
    var toplamOdeme = ilkOdeme;
    var ay          = 1;
    var kapanmadi   = false;
    var maxAy       = 600; // 50 yıl güvenlik sınırı

    while (kalanBorc > 1 && ay < maxAy) {
        var faiz       = kalanBorc * faizOrani;
        kalanBorc      = kalanBorc + faiz;
        var odeme      = kalanBorc * asgarıOran;

        // Asgari ödeme faizi karşılamıyorsa borç hiç kapanmaz
        if (odeme <= faiz) {
            kapanmadi = true;
            break;
        }

        toplamFaiz  += faiz;
        toplamOdeme += odeme;
        kalanBorc   -= odeme;
        ay++;
    }

    var fmt = function(n) {
        return n.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    };

    document.getElementById('hc-r-ilk-odeme').textContent = fmt(ilkOdeme);
    document.getElementById('hc-r-toplam').textContent    = kapanmadi ? '—' : fmt(toplamOdeme);
    document.getElementById('hc-r-faiz').textContent      = kapanmadi ? '—' : fmt(toplamFaiz);

    var sureEl  = document.getElementById('hc-r-sure');
    var uyariEl = document.getElementById('hc-kkao-uyari');

    if (kapanmadi) {
        sureEl.textContent    = 'Kapanmıyor!';
        sureEl.style.color    = '#c0392b';
        uyariEl.style.display = 'block';
    } else {
        var yil = Math.floor(ay / 12);
        var gun = ay % 12;
        var sureStr = '';
        if (yil > 0) sureStr += yil + ' yıl ';
        if (gun > 0) sureStr += gun + ' ay';
        sureEl.textContent    = sureStr.trim() || '1 ay';
        sureEl.style.color    = '#1d7917';
        uyariEl.style.display = 'none';
    }

    var result = document.getElementById('hc-kkao-result');
    result.classList.add('visible');
}

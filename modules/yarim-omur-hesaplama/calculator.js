function hcYarimOmurSolveDegisti() {
    var mode = document.getElementById('hc-yoh-solve').value;
    
    document.getElementById('hc-yoh-initial-group').style.display = mode === 'initial' ? 'none' : 'block';
    document.getElementById('hc-yoh-remaining-group').style.display = mode === 'remaining' ? 'none' : 'block';
    document.getElementById('hc-yoh-halflife-group').style.display = mode === 'halflife' ? 'none' : 'block';
    document.getElementById('hc-yoh-time-group').style.display = mode === 'time' ? 'none' : 'block';
}

function hcYarimOmurHesapla() {
    var mode = document.getElementById('hc-yoh-solve').value;
    var unit = document.getElementById('hc-yoh-unit').value;

    var N0 = parseFloat(document.getElementById('hc-yoh-initial').value);
    var Nt = parseFloat(document.getElementById('hc-yoh-remaining').value);
    var tHalf = parseFloat(document.getElementById('hc-yoh-halflife').value);
    var t = parseFloat(document.getElementById('hc-yoh-time').value);

    var resVal = 0;
    var resLabel = '';
    var decayedVal = 0;
    var pctVal = 0;
    var desc = '';

    if (mode === 'remaining') {
        if (isNaN(N0) || N0 <= 0 || isNaN(tHalf) || tHalf <= 0 || isNaN(t) || t < 0) {
            alert('Lütfen geçerli başlangıç miktarı, yarım ömür ve geçen süre değerlerini girin.');
            return;
        }

        // Nt = N0 * (0.5)^(t / tHalf)
        Nt = N0 * Math.pow(0.5, t / tHalf);
        resVal = Nt;
        resLabel = 'Kalan Miktar (N):';
        decayedVal = N0 - Nt;
        pctVal = (decayedVal / N0) * 100;
        
        desc = N0.toLocaleString('tr-TR') + ' başlangıç kütlesine sahip madde, ' + tHalf.toLocaleString('tr-TR') + ' ' + unit + ' yarım ömür ve ' + t.toLocaleString('tr-TR') + ' ' + unit + ' bozunma süresi sonunda ' + Nt.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' miktarına düşer. Bu süreçte toplam ' + decayedVal.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' madde bozunarak kaybolmuştur (%' + pctVal.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' kayıp).';
    } else if (mode === 'initial') {
        if (isNaN(Nt) || Nt <= 0 || isNaN(tHalf) || tHalf <= 0 || isNaN(t) || t < 0) {
            alert('Lütfen geçerli kalan miktar, yarım ömür ve geçen süre değerlerini girin.');
            return;
        }

        // N0 = Nt / (0.5)^(t / tHalf)
        N0 = Nt / Math.pow(0.5, t / tHalf);
        resVal = N0;
        resLabel = 'Başlangıç Miktarı (N₀):';
        decayedVal = N0 - Nt;
        pctVal = (decayedVal / N0) * 100;

        desc = tHalf.toLocaleString('tr-TR') + ' ' + unit + ' yarım ömürlü bir maddenin, ' + t.toLocaleString('tr-TR') + ' ' + unit + ' bozunma süresi sonunda geriye ' + Nt.toLocaleString('tr-TR') + ' kadar kalabilmesi için başlangıç kütlesinin tam ' + N0.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' olması gerekir.';
    } else if (mode === 'halflife') {
        if (isNaN(N0) || N0 <= 0 || isNaN(Nt) || Nt <= 0 || isNaN(t) || t <= 0) {
            alert('Lütfen geçerli başlangıç miktarı, kalan miktar ve geçen süre girin.');
            return;
        }
        if (Nt >= N0) {
            alert('Bozunma olması için kalan miktar başlangıç miktarından küçük olmalıdır.');
            return;
        }

        // tHalf = t * log(0.5) / log(Nt / N0)
        tHalf = (t * Math.log(0.5)) / Math.log(Nt / N0);
        resVal = tHalf;
        resLabel = 'Yarım Ömür (T₁/₂):';
        decayedVal = N0 - Nt;
        pctVal = (decayedVal / N0) * 100;

        desc = N0.toLocaleString('tr-TR') + ' başlangıç kütleli maddenin, ' + t.toLocaleString('tr-TR') + ' ' + unit + ' bozunma sonunda ' + Nt.toLocaleString('tr-TR') + ' düzeyine gerilemesi, bu maddenin yarım ömrünün (T₁/₂) tam ' + tHalf.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' ' + unit + ' olduğunu gösterir.';
    } else {
        if (isNaN(N0) || N0 <= 0 || isNaN(Nt) || Nt <= 0 || isNaN(tHalf) || tHalf <= 0) {
            alert('Lütfen geçerli başlangıç miktarı, kalan miktar ve yarım ömür değerleri girin.');
            return;
        }
        if (Nt >= N0) {
            alert('Bozunma olması için kalan miktar başlangıç miktarından küçük olmalıdır.');
            return;
        }

        // t = tHalf * log(Nt / N0) / log(0.5)
        t = (tHalf * Math.log(Nt / N0)) / Math.log(0.5);
        resVal = t;
        resLabel = 'Geçen Süre (t):';
        decayedVal = N0 - Nt;
        pctVal = (decayedVal / N0) * 100;

        desc = N0.toLocaleString('tr-TR') + ' miktarındaki bir maddenin, ' + tHalf.toLocaleString('tr-TR') + ' ' + unit + ' yarılanma ömrüyle bozunarak ' + Nt.toLocaleString('tr-TR') + ' seviyesine gerilemesi için tam ' + t.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' ' + unit + ' süre geçmesi gerekir.';
    }

    var timeUnitSuffix = (mode === 'halflife' || mode === 'time') ? ' ' + unit : '';
    document.getElementById('hc-yoh-res-label').innerText = resLabel;
    document.getElementById('hc-yoh-res-val').innerText = resVal.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + timeUnitSuffix;
    document.getElementById('hc-yoh-res-decayed').innerText = decayedVal.toLocaleString('tr-TR', { maximumFractionDigits: 4 });
    document.getElementById('hc-yoh-res-pct').innerText = '%' + pctVal.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    document.getElementById('hc-yoh-desc').innerText = desc;

    document.getElementById('hc-yarim-omur-hesaplama-result').classList.add('visible');
}

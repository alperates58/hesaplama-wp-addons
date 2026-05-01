function hcMevduatParaFormatla(tutar) {
    return tutar.toLocaleString('tr-TR', {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    }) + ' ₺';
}

function hcMevduatOranFormatla(oran) {
    return '%' + oran.toLocaleString('tr-TR', {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    });
}

function hcMevduatStopajAlaniGuncelle() {
    var tip = document.getElementById('hc-mevduat-stopaj-tipi').value;
    var wrap = document.getElementById('hc-mevduat-ozel-stopaj-wrap');

    if (!wrap) return;

    wrap.style.display = tip === 'ozel' ? 'block' : 'none';
}

function hcMevduatOtomatikStopajOrani(vadeGunu) {
    if (vadeGunu <= 183) return 17.5;
    if (vadeGunu <= 365) return 15;
    return 10;
}

function hcMevduatStopajOraniniAl(vadeGunu) {
    var tip = document.getElementById('hc-mevduat-stopaj-tipi').value;

    if (tip === 'yok') return 0;
    if (tip === 'ozel') return parseFloat(document.getElementById('hc-mevduat-ozel-stopaj').value);

    return hcMevduatOtomatikStopajOrani(vadeGunu);
}

function hcMevduatFaiziHesapla() {
    var anapara = parseFloat(document.getElementById('hc-mevduat-anapara').value);
    var faizOrani = parseFloat(document.getElementById('hc-mevduat-faiz').value);
    var vadeGunu = parseInt(document.getElementById('hc-mevduat-vade').value, 10);
    var yenilemeSayisi = parseInt(document.getElementById('hc-mevduat-yenileme').value, 10);
    var stopajOrani = hcMevduatStopajOraniniAl(vadeGunu);
    var result = document.getElementById('hc-mevduat-result');

    if (!anapara || anapara <= 0) {
        alert('Lütfen geçerli bir mevduat tutarı girin.');
        return;
    }

    if (isNaN(faizOrani) || faizOrani < 0) {
        alert('Lütfen geçerli bir yıllık faiz oranı girin.');
        return;
    }

    if (!vadeGunu || vadeGunu <= 0) {
        alert('Lütfen geçerli bir vade günü girin.');
        return;
    }

    if (!yenilemeSayisi || yenilemeSayisi <= 0) {
        alert('Lütfen geçerli bir vade yenileme sayısı girin.');
        return;
    }

    if (isNaN(stopajOrani) || stopajOrani < 0 || stopajOrani > 100) {
        alert('Lütfen geçerli bir stopaj oranı girin.');
        return;
    }

    var bakiye = anapara;
    var toplamBrutFaiz = 0;
    var toplamStopaj = 0;
    var toplamNetFaiz = 0;

    for (var i = 0; i < yenilemeSayisi; i++) {
        var brutFaiz = bakiye * faizOrani * vadeGunu / 36500;
        var stopajTutari = brutFaiz * stopajOrani / 100;
        var netFaiz = brutFaiz - stopajTutari;

        toplamBrutFaiz += brutFaiz;
        toplamStopaj += stopajTutari;
        toplamNetFaiz += netFaiz;
        bakiye += netFaiz;
    }

    var donemselGetiri = toplamNetFaiz / anapara * 100;
    var toplamGun = vadeGunu * yenilemeSayisi;
    var efektifYillikGetiri = (Math.pow(bakiye / anapara, 365 / toplamGun) - 1) * 100;

    document.getElementById('hc-mevduat-net-bakiye').textContent = hcMevduatParaFormatla(bakiye);
    document.getElementById('hc-mevduat-brut').textContent = hcMevduatParaFormatla(toplamBrutFaiz);
    document.getElementById('hc-mevduat-stopaj').textContent = hcMevduatParaFormatla(toplamStopaj);
    document.getElementById('hc-mevduat-net-faiz').textContent = hcMevduatParaFormatla(toplamNetFaiz);
    document.getElementById('hc-mevduat-bakiye').textContent = hcMevduatParaFormatla(bakiye);
    document.getElementById('hc-mevduat-stopaj-orani').textContent = hcMevduatOranFormatla(stopajOrani);
    document.getElementById('hc-mevduat-donemsel').textContent = hcMevduatOranFormatla(donemselGetiri);
    document.getElementById('hc-mevduat-efektif').textContent = hcMevduatOranFormatla(efektifYillikGetiri);
    document.getElementById('hc-mevduat-not').textContent = 'Hesaplama TL vadeli mevduat için yıllık brüt basit faiz oranıyla yapılır. Vade yenileme sayısı 1’den büyükse net faiz anaparaya eklenerek sonraki dönem yeniden hesaplanır.';
    result.classList.add('visible');
}

document.addEventListener('DOMContentLoaded', hcMevduatStopajAlaniGuncelle);

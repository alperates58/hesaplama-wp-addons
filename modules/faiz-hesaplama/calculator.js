function hcFaizParaFormatla(tutar) {
    return tutar.toLocaleString('tr-TR', {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    }) + ' ₺';
}

function hcFaizOranFormatla(oran) {
    return '%' + oran.toLocaleString('tr-TR', {
        minimumFractionDigits: 0,
        maximumFractionDigits: 2
    });
}

function hcFaizStopajAlaniGuncelle() {
    var tip = document.getElementById('hc-faiz-stopaj-tipi').value;
    var wrap = document.getElementById('hc-faiz-ozel-stopaj-wrap');

    if (!wrap) return;

    wrap.style.display = tip === 'ozel' ? 'block' : 'none';
}

function hcFaizOtomatikStopajOrani(vadeGunu) {
    if (vadeGunu <= 183) return 17.5;
    if (vadeGunu <= 365) return 15;
    return 10;
}

function hcFaizStopajOraniniAl(vadeGunu) {
    var tip = document.getElementById('hc-faiz-stopaj-tipi').value;

    if (tip === 'yok') return 0;
    if (tip === 'ozel') return parseFloat(document.getElementById('hc-faiz-ozel-stopaj').value);

    return hcFaizOtomatikStopajOrani(vadeGunu);
}

function hcFaizHesapla() {
    var anapara = parseFloat(document.getElementById('hc-faiz-anapara').value);
    var faizOrani = parseFloat(document.getElementById('hc-faiz-oran').value);
    var vadeGunu = parseInt(document.getElementById('hc-faiz-vade').value, 10);
    var stopajOrani = hcFaizStopajOraniniAl(vadeGunu);
    var result = document.getElementById('hc-faiz-result');

    if (!anapara || anapara <= 0) {
        alert('Lütfen geçerli bir anapara tutarı girin.');
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

    if (isNaN(stopajOrani) || stopajOrani < 0 || stopajOrani > 100) {
        alert('Lütfen geçerli bir stopaj oranı girin.');
        return;
    }

    var brutFaiz = anapara * faizOrani * vadeGunu / 36500;
    var stopajTutari = brutFaiz * stopajOrani / 100;
    var netFaiz = brutFaiz - stopajTutari;
    var netBakiye = anapara + netFaiz;
    var netEfektifYillik = anapara > 0 && vadeGunu > 0 ? (netFaiz / anapara) * (365 / vadeGunu) * 100 : 0;

    document.getElementById('hc-faiz-net-bakiye').textContent = hcFaizParaFormatla(netBakiye);
    document.getElementById('hc-faiz-brut').textContent = hcFaizParaFormatla(brutFaiz);
    document.getElementById('hc-faiz-stopaj').textContent = hcFaizParaFormatla(stopajTutari);
    document.getElementById('hc-faiz-net').textContent = hcFaizParaFormatla(netFaiz);
    document.getElementById('hc-faiz-bakiye').textContent = hcFaizParaFormatla(netBakiye);
    document.getElementById('hc-faiz-stopaj-orani').textContent = hcFaizOranFormatla(stopajOrani);
    document.getElementById('hc-faiz-efektif').textContent = hcFaizOranFormatla(netEfektifYillik);
    document.getElementById('hc-faiz-not').textContent = 'Hesaplama yıllık basit faiz formülüyle yapılır: anapara x faiz oranı x vade günü / 36500. Sonuçlar bilgilendirme amaçlıdır.';
    result.classList.add('visible');
}

document.addEventListener('DOMContentLoaded', hcFaizStopajAlaniGuncelle);

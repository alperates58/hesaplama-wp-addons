var hcDovizApiAnahtari = 'ddf43dc83228f324754d8335';
var hcDovizOnbellek = {};

var hcDovizAdlari = {
    TRY: 'Türk lirası',
    USD: 'Amerikan doları',
    EUR: 'Euro',
    GBP: 'İngiliz sterlini',
    CHF: 'İsviçre frangı',
    JPY: 'Japon yeni',
    CAD: 'Kanada doları',
    AUD: 'Avustralya doları',
    SAR: 'Suudi Arabistan riyali',
    AED: 'BAE dirhemi'
};

function hcDovizSayiFormatla(sayi, basamak) {
    return sayi.toLocaleString('tr-TR', {
        minimumFractionDigits: basamak,
        maximumFractionDigits: basamak
    });
}

function hcDovizParaFormatla(tutar, kod) {
    var basamak = kod === 'JPY' ? 0 : 2;
    var metin = hcDovizSayiFormatla(tutar, basamak);

    if (kod === 'TRY') {
        return metin + ' ₺';
    }

    return metin + ' ' + kod;
}

function hcDovizKurFormatla(kur) {
    var basamak = kur >= 100 ? 2 : 4;
    return kur.toLocaleString('tr-TR', {
        minimumFractionDigits: basamak,
        maximumFractionDigits: 6
    });
}

function hcDovizKurGetir(kaynak, hedef) {
    var anahtar = kaynak + '-' + hedef;

    if (hcDovizOnbellek[anahtar] && Date.now() - hcDovizOnbellek[anahtar].zaman < 300000) {
        return Promise.resolve(hcDovizOnbellek[anahtar]);
    }

    var url = 'https://v6.exchangerate-api.com/v6/' + encodeURIComponent(hcDovizApiAnahtari) +
        '/pair/' + encodeURIComponent(kaynak) + '/' + encodeURIComponent(hedef);

    return fetch(url)
        .then(function(res) {
            return res.json();
        })
        .then(function(veri) {
            if (!veri || veri.result !== 'success' || !veri.conversion_rate) {
                throw new Error('Kur verisi alınamadı.');
            }

            var sonuc = {
                kur: parseFloat(veri.conversion_rate),
                guncelleme: veri.time_last_update_utc ? new Date(veri.time_last_update_utc) : new Date(),
                zaman: Date.now()
            };

            hcDovizOnbellek[anahtar] = sonuc;
            return sonuc;
        });
}

function hcDovizHesaplamaHesapla() {
    var tutar = parseFloat(document.getElementById('hc-doviz-tutar').value);
    var kaynak = document.getElementById('hc-doviz-kaynak').value;
    var hedef = document.getElementById('hc-doviz-hedef').value;
    var result = document.getElementById('hc-doviz-result');

    if (!tutar || tutar <= 0) {
        alert('Lütfen geçerli bir tutar girin.');
        return;
    }

    if (!kaynak || !hedef) {
        alert('Lütfen kaynak ve hedef para birimlerini seçin.');
        return;
    }

    if (kaynak === hedef) {
        alert('Lütfen farklı iki para birimi seçin.');
        return;
    }

    document.getElementById('hc-doviz-sonuc').textContent = 'Hesaplanıyor...';
    document.getElementById('hc-doviz-kur').textContent = '';
    document.getElementById('hc-doviz-guncelleme').textContent = '';
    document.getElementById('hc-doviz-not').textContent = '';
    result.classList.add('visible');

    hcDovizKurGetir(kaynak, hedef).then(function(veri) {
        var cevrilenTutar = tutar * veri.kur;
        var guncelleme = veri.guncelleme.toLocaleString('tr-TR', {
            timeZone: 'Europe/Istanbul',
            hour12: false
        });

        document.getElementById('hc-doviz-sonuc').textContent = hcDovizParaFormatla(cevrilenTutar, hedef);
        document.getElementById('hc-doviz-kur').textContent = '1 ' + kaynak + ' = ' + hcDovizKurFormatla(veri.kur) + ' ' + hedef;
        document.getElementById('hc-doviz-guncelleme').textContent = guncelleme;
        document.getElementById('hc-doviz-not').textContent = hcDovizParaFormatla(tutar, kaynak) + ' tutarı güncel kura göre ' + hcDovizAdlari[hedef] + ' cinsine çevrildi.';
    }).catch(function() {
        document.getElementById('hc-doviz-sonuc').textContent = 'Veri alınamadı';
        document.getElementById('hc-doviz-not').textContent = 'Kur bilgisi alınamadı. Lütfen bağlantınızı kontrol edip tekrar deneyin.';
    });
}

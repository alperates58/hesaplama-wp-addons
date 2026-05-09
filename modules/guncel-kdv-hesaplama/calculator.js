function hcGuncelKdvParaFormatla(tutar) {
    return tutar.toLocaleString('tr-TR', {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    }) + ' ₺';
}

function hcGuncelKdvOranFormatla(oran) {
    return '%' + oran.toLocaleString('tr-TR', {
        minimumFractionDigits: 0,
        maximumFractionDigits: 2
    });
}

function hcGuncelKdvOzelOranGuncelle() {
    var oranSecimi = document.getElementById('hc-kdv-oran').value;
    var ozelWrap = document.getElementById('hc-kdv-ozel-wrap');

    if (!ozelWrap) return;

    ozelWrap.style.display = oranSecimi === 'ozel' ? 'block' : 'none';
}

function hcGuncelKdvOraniniAl() {
    var oranSecimi = document.getElementById('hc-kdv-oran').value;

    if (oranSecimi === 'ozel') {
        return parseFloat(document.getElementById('hc-kdv-ozel-oran').value);
    }

    return parseFloat(oranSecimi);
}

function hcGuncelKdvHesapla() {
    var islem = document.getElementById('hc-kdv-islem').value;
    var tutar = parseFloat(document.getElementById('hc-kdv-tutar').value);
    var oran = hcGuncelKdvOraniniAl();
    var result = document.getElementById('hc-kdv-result');
    var kdvHaric = 0;
    var kdvTutari = 0;
    var kdvDahil = 0;

    if (!tutar || tutar <= 0) {
        alert('Lütfen geçerli bir tutar girin.');
        return;
    }

    if (isNaN(oran) || oran < 0 || oran > 100) {
        alert('Lütfen geçerli bir KDV oranı girin.');
        return;
    }

    if (islem === 'haricten-dahile') {
        kdvHaric = tutar;
        kdvTutari = kdvHaric * oran / 100;
        kdvDahil = kdvHaric + kdvTutari;
        document.getElementById('hc-kdv-ana-sonuc').textContent = hcGuncelKdvParaFormatla(kdvDahil);
        document.getElementById('hc-kdv-not').textContent = 'KDV hariç tutara ' + hcGuncelKdvOranFormatla(oran) + ' KDV eklenerek KDV dahil tutar hesaplandı.';
    } else {
        kdvDahil = tutar;
        kdvHaric = kdvDahil / (1 + oran / 100);
        kdvTutari = kdvDahil - kdvHaric;
        document.getElementById('hc-kdv-ana-sonuc').textContent = hcGuncelKdvParaFormatla(kdvHaric);
        document.getElementById('hc-kdv-not').textContent = 'KDV dahil tutardan ' + hcGuncelKdvOranFormatla(oran) + ' oranındaki KDV ayrıştırılarak matrah hesaplandı.';
    }

    document.getElementById('hc-kdv-haric').textContent = hcGuncelKdvParaFormatla(kdvHaric);
    document.getElementById('hc-kdv-tutari').textContent = hcGuncelKdvParaFormatla(kdvTutari);
    document.getElementById('hc-kdv-dahil').textContent = hcGuncelKdvParaFormatla(kdvDahil);
    document.getElementById('hc-kdv-uygulanan-oran').textContent = hcGuncelKdvOranFormatla(oran);
    result.classList.add('visible');
}

document.addEventListener('DOMContentLoaded', hcGuncelKdvOzelOranGuncelle);

function hcSesYutmaKatsayisiHesapla() {
    var pInc = parseFloat(document.getElementById('hc-syk-p-inc').value);
    var pRef = parseFloat(document.getElementById('hc-syk-p-ref').value);

    if (isNaN(pInc) || pInc <= 0) {
        alert('Lütfen gelen ses gücü için pozitif bir değer girin.');
        return;
    }
    if (isNaN(pRef) || pRef < 0) {
        alert('Lütfen geçerli bir yansıyan ses gücü girin.');
        return;
    }
    if (pRef > pInc) {
        alert('Yansıyan ses gücü, gelen ses gücünden büyük olamaz!');
        return;
    }

    // alpha = 1 - (pRef / pInc)
    var alpha = 1 - (pRef / pInc);
    var percent = alpha * 100;

    var sClass = '';
    var rating = '';
    
    if (alpha >= 0.90) {
        sClass = 'A Sınıfı';
        rating = 'Mükemmel derece ses yutucu (Akustik panel ve özel yutucu köpükler).';
    } else if (alpha >= 0.80) {
        sClass = 'B Sınıfı';
        rating = 'Çok yüksek derecede ses yutucu.';
    } else if (alpha >= 0.60) {
        sClass = 'C Sınıfı';
        rating = 'Orta-Yüksek derecede ses yutucu (Kalın halılar, delikli alçıpanlar).';
    } else if (alpha >= 0.30) {
        sClass = 'D Sınıfı';
        rating = 'Düşük-Orta derecede ses yutucu.';
    } else if (alpha >= 0.15) {
        sClass = 'E Sınıfı';
        rating = 'Çok düşük derecede ses yutucu.';
    } else {
        sClass = 'Sınıflandırılmamış (Yansıtıcı)';
        rating = 'Ses yutma özelliği son derece zayıftır, sesi doğrudan yansıtır (Beton duvar, cam, mermer).';
    }

    document.getElementById('hc-syk-res-alpha').innerText = alpha.toLocaleString('tr-TR', { maximumFractionDigits: 3 });
    document.getElementById('hc-syk-res-class').innerText = sClass;
    document.getElementById('hc-syk-res-percent').innerText = '%' + percent.toLocaleString('tr-TR', { maximumFractionDigits: 1 });

    var desc = 'Girdiğiniz değerlere göre malzeme, üzerine gelen ses enerjisinin %' + percent.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + '\'ini yutmakta, geri kalan kısmını ise yansıtmaktadır. ISO 11654 standardına göre bu malzeme ' + sClass + ' yutucu sınıfındadır. ' + rating;
    document.getElementById('hc-syk-desc').innerText = desc;

    document.getElementById('hc-ses-yutma-katsayisi-hesaplama-result').classList.add('visible');
}

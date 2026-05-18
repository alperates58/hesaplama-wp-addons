function hcTeleskopBuyutmeHesapla() {
    var fTel = parseFloat(document.getElementById('hc-tbo-f-tel').value);
    var fEye = parseFloat(document.getElementById('hc-tbo-f-eye').value);
    var aperture = parseFloat(document.getElementById('hc-tbo-aperture').value);

    if (isNaN(fTel) || fTel <= 0) {
        alert('Lütfen geçerli bir teleskop odak uzaklığı girin.');
        return;
    }
    if (isNaN(fEye) || fEye <= 0) {
        alert('Lütfen geçerli bir oküler (göz merceği) odak uzaklığı girin.');
        return;
    }
    if (isNaN(aperture) || aperture <= 0) {
        alert('Lütfen geçerli bir teleskop açıklığı girin.');
        return;
    }

    // Magnification = fTel / fEye
    var mag = fTel / fEye;

    // Focal ratio = fTel / aperture
    var fRatio = fTel / aperture;

    // Max useful magnification = 2 * aperture (metric rule: 2x per mm of aperture)
    var maxMag = aperture * 2;

    document.getElementById('hc-tbo-res-mag').innerText = mag.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + 'x';
    document.getElementById('hc-tbo-res-ratio').innerText = 'f/' + fRatio.toLocaleString('tr-TR', { maximumFractionDigits: 1 });
    document.getElementById('hc-tbo-res-max').innerText = maxMag.toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + 'x';

    var status = '';
    if (mag > maxMag) {
        status = ' ⚠️ DİKKAT: Hesaplanan büyütme oranı (' + mag.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + 'x), teleskobunuzun fiziksel kapasite sınırı olan ' + maxMag.toLocaleString('tr-TR') + 'x değerinden büyüktür. Bu mercek kombinasyonu ile görüntü aşırı karanlık ve bulanık olacaktır.';
    } else {
        status = ' Bu mercek kombinasyonu teleskobunuzun optik sınırları içindedir, net ve kaliteli bir gözlem gerçekleştirebilirsiniz.';
    }

    var desc = 'Teleskobunuz şu anki mercek ayarlarıyla gökyüzü nesnelerini çıplak gözle göründüğünden ' + mag.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' kat daha büyük gösterir. Teleskobun odak oranı f/' + fRatio.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + '\'dir (f/8 altı hızlı/geniş açılı, f/10 üstü yavaş/gezegen gözlemi için uygundur).' + status;
    document.getElementById('hc-tbo-desc').innerText = desc;

    document.getElementById('hc-teleskop-buyutme-orani-hesaplama-result').classList.add('visible');
}

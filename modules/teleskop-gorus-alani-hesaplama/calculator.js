function hcTeleskopGorusAlaniHesapla() {
    var fTel = parseFloat(document.getElementById('hc-tga-f-tel').value);
    var fEye = parseFloat(document.getElementById('hc-tga-f-eye').value);
    var afov = parseFloat(document.getElementById('hc-tga-afov').value);

    if (isNaN(fTel) || fTel <= 0) {
        alert('Lütfen geçerli bir teleskop odak uzaklığı girin.');
        return;
    }
    if (isNaN(fEye) || fEye <= 0) {
        alert('Lütfen geçerli bir oküler odak uzaklığı girin.');
        return;
    }
    if (isNaN(afov) || afov <= 0 || afov > 120) {
        alert('Lütfen 1 ile 120 derece arasında geçerli bir oküler görünür görüş alanı (AFoV) girin.');
        return;
    }

    var mag = fTel / fEye;

    // True Field of View (TFoV) = AFoV / Magnification
    var tfov = afov / mag;

    // Full Moon is ~0.5 degrees wide in the sky
    var moonCount = tfov / 0.5;

    document.getElementById('hc-tga-res-tfov').innerText = tfov.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + '°';
    document.getElementById('hc-tga-res-mag').innerText = mag.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + 'x';
    document.getElementById('hc-tga-res-moon').innerText = '~' + moonCount.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' Dolunay Boyutu';

    var desc = 'Bu optik kombinasyon ile gökyüzüne baktığınızda görebileceğiniz dairesel alanın gerçek çapı ' + tfov.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' derecedir. Gökyüzündeki Dolunay yaklaşık 0.5 derece yer kaplar; yani bu bakış açısı ile görüş alanınıza yan yana yaklaşık ' + moonCount.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' adet Dolunay sığdırabilirsiniz. Geniş açılı gözlemler (bulutsular, açık yıldız kümeleri) için idealdir.';
    document.getElementById('hc-tga-desc').innerText = desc;

    document.getElementById('hc-teleskop-gorus-alani-hesaplama-result').classList.add('visible');
}

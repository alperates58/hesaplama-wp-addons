function hcNafakaHesapla() {
    var odeyenGelir = parseFloat(document.getElementById('hc-nafaka-odeyen-gelir').value) || 0;
    var alanGelir = parseFloat(document.getElementById('hc-nafaka-alan-gelir').value) || 0;
    var cocukSayisi = parseInt(document.getElementById('hc-nafaka-cocuk-sayisi').value) || 0;
    var sed = document.getElementById('hc-nafaka-sosyal-durum').value;

    if (odeyenGelir <= 0) {
        alert('Lütfen nafaka ödeyecek kişinin aylık gelirini giriniz.');
        return;
    }

    var sedFactor = 1.0;
    if (sed === 'dusuk') sedFactor = 0.85;
    if (sed === 'yuksek') sedFactor = 1.15;

    // Yoksulluk Nafakası Tahmini
    var yoksullukMin = 0;
    var yoksullukMax = 0;
    
    if (alanGelir < odeyenGelir) {
        var fark = odeyenGelir - alanGelir;
        if (alanGelir === 0) {
            yoksullukMin = odeyenGelir * 0.18 * sedFactor;
            yoksullukMax = odeyenGelir * 0.25 * sedFactor;
        } else {
            yoksullukMin = fark * 0.15 * sedFactor;
            yoksullukMax = fark * 0.22 * sedFactor;
        }
    }
    
    // Yoksulluk nafakası ödeyenin gelirinin 1/3'ünü aşamaz genelde
    var yoksullukCap = odeyenGelir * 0.33;
    if (yoksullukMin > yoksullukCap) yoksullukMin = yoksullukCap * 0.9;
    if (yoksullukMax > yoksullukCap) yoksullukMax = yoksullukCap;

    // İştirak Nafakası Tahmini (Çocuk başına ödeyenin gelirinin yaklaşık %12-%18'i)
    var istirakMin = 0;
    var istirakMax = 0;
    
    if (cocukSayisi > 0) {
        var cocukBasiOranMin = 0.12;
        var cocukBasiOranMax = 0.18;
        
        // Çoklu çocuk iskontosu
        var iskonto = 1.0;
        if (cocukSayisi === 2) iskonto = 0.85;
        if (cocukSayisi >= 3) iskonto = 0.70;

        istirakMin = odeyenGelir * cocukBasiOranMin * cocukSayisi * iskonto * sedFactor;
        istirakMax = odeyenGelir * cocukBasiOranMax * cocukSayisi * iskonto * sedFactor;
    }

    // Toplam iştirak nafakası ödeyenin gelirinin %45'ini aşamaz
    var istirakCap = odeyenGelir * 0.45;
    if (istirakMin > istirakCap) istirakMin = istirakCap * 0.9;
    if (istirakMax > istirakCap) istirakMax = istirakCap;

    // Formatlama ve Gösterim
    var yoksullukText = yoksullukMax > 0 ? 
        Math.round(yoksullukMin).toLocaleString('tr-TR') + ' ₺ - ' + Math.round(yoksullukMax).toLocaleString('tr-TR') + ' ₺' : '0 ₺';
    var istirakText = istirakMax > 0 ? 
        Math.round(istirakMin).toLocaleString('tr-TR') + ' ₺ - ' + Math.round(istirakMax).toLocaleString('tr-TR') + ' ₺' : '0 ₺';
    
    var toplamMin = yoksullukMin + istirakMin;
    var toplamMax = yoksullukMax + istirakMax;
    var toplamText = Math.round(toplamMin).toLocaleString('tr-TR') + ' ₺ - ' + Math.round(toplamMax).toLocaleString('tr-TR') + ' ₺';

    document.getElementById('hc-nafaka-res-yoksulluk').innerText = yoksullukText;
    document.getElementById('hc-nafaka-res-istirak').innerText = istirakText;
    document.getElementById('hc-nafaka-res-toplam').innerText = toplamText;

    document.getElementById('hc-nafaka-hesaplama-result').classList.add('visible');
}
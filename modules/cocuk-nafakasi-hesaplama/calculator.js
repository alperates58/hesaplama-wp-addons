function hcCocukGirisleriGuncelle() {
    var sayi = parseInt(document.getElementById('hc-cn-cocuk-sayisi').value) || 1;
    var container = document.getElementById('hc-cn-cocuk-detaylari');
    container.innerHTML = '';
    
    for (var i = 1; i <= sayi; i++) {
        var div = document.createElement('div');
        div.className = 'hc-cn-cocuk-row';
        div.style.padding = '10px';
        div.style.border = '1px solid #e2e8f0';
        div.style.borderRadius = '8px';
        div.style.marginBottom = '10px';
        
        div.innerHTML = '<span style="font-weight:bold; font-size:13px; display:block; margin-bottom:6px;">' + i + '. Çocuk</span>' +
            '<div class="hc-form-group" style="margin-bottom:6px;">' +
                '<label style="font-size:12px;">Yaş Grubu</label>' +
                '<select class="hc-cn-yas-grubu">' +
                    '<option value="0.12">0-6 Yaş (Okul Öncesi)</option>' +
                    '<option value="0.15">7-12 Yaş (İlkokul/Ortaokul)</option>' +
                    '<option value="0.18">13-18 Yaş (Lise)</option>' +
                    '<option value="0.20">18+ Yaş (Üniversite / Eğitim Devam Ediyor)</option>' +
                '</select>' +
            '</div>';
        container.appendChild(div);
    }
}

function hcCocukNafakasiHesapla() {
    var odeyenGelir = parseFloat(document.getElementById('hc-cn-odeyen-gelir').value) || 0;
    var ekGider = parseFloat(document.getElementById('hc-cn-ek-gider').value) || 0;
    
    if (odeyenGelir <= 0) {
        alert('Lütfen yükümlünün aylık net gelirini giriniz.');
        return;
    }

    var yasGruplari = document.getElementsByClassName('hc-cn-yas-grubu');
    var totalFactor = 0;
    
    for (var i = 0; i < yasGruplari.length; i++) {
        totalFactor += parseFloat(yasGruplari[i].value);
    }

    // Çok çocuk iskontosu (toplam nafakayı makul tutmak için)
    var iskonto = 1.0;
    if (yasGruplari.length === 2) iskonto = 0.85;
    if (yasGruplari.length === 3) iskonto = 0.75;
    if (yasGruplari.length >= 4) iskonto = 0.65;

    var bazNafakaMin = odeyenGelir * totalFactor * 0.9 * iskonto;
    var bazNafakaMax = odeyenGelir * totalFactor * 1.1 * iskonto;

    // Ek gider payı (yarı yarıya paylaşıldığı kabulüyle)
    var ekKatki = ekGider * 0.5;

    var toplamMin = bazNafakaMin + ekKatki;
    var toplamMax = bazNafakaMax + ekKatki;

    // Yükümlünün aylık gelirinin en fazla %50'si kadar iştirak nafakası ödeyebilir kuralı
    var cap = odeyenGelir * 0.50;
    if (toplamMin > cap) toplamMin = cap * 0.9;
    if (toplamMax > cap) toplamMax = cap;

    document.getElementById('hc-cn-res-baz').innerText = 
        Math.round(bazNafakaMin).toLocaleString('tr-TR') + ' ₺ - ' + Math.round(bazNafakaMax).toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-cn-res-ek').innerText = Math.round(ekKatki).toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-cn-res-toplam').innerText = 
        Math.round(toplamMin).toLocaleString('tr-TR') + ' ₺ - ' + Math.round(toplamMax).toLocaleString('tr-TR') + ' ₺';

    document.getElementById('hc-cocuk-nafakasi-result').classList.add('visible');
}
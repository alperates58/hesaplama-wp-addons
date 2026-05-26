function hcKiraVergisiGiderGuncelle() {
    var tur = document.getElementById('hc-kkgv-gider-turu').value;
    var row = document.getElementById('hc-kkgv-gercek-gider-row');
    if (tur === 'gercek') {
        row.style.display = 'block';
    } else {
        row.style.display = 'none';
        document.getElementById('hc-kkgv-gercek-tutar').value = '0';
    }
}

function hcKiraVergisiHesapla() {
    var gelir = parseFloat(document.getElementById('hc-kkgv-gelir').value) || 0;
    var yil = document.getElementById('hc-kkgv-yil').value;
    var giderTuru = document.getElementById('hc-kkgv-gider-turu').value;
    var gercekGider = parseFloat(document.getElementById('hc-kkgv-gercek-tutar').value) || 0;

    var istisnaMsg = document.getElementById('hc-kkgv-istisna-msg');
    var tableArea = document.getElementById('hc-kkgv-table-area');

    istisnaMsg.style.display = 'none';
    tableArea.style.display = 'none';

    if (gelir <= 0) {
        alert('Lütfen yıllık kira gelirinizi giriniz.');
        return;
    }

    var istisnaLimit = yil === '2026' ? 58000 : 47000;
    
    if (gelir <= istisnaLimit) {
        istisnaMsg.innerHTML = '<strong>Müjde!</strong> Yıllık toplam konut kira geliriniz (' + gelir.toLocaleString('tr-TR') + ' ₺), ' + yil + ' yılı yasal istisna sınırı olan <strong>' + istisnaLimit.toLocaleString('tr-TR') + ' ₺</strong> tutarının altında kaldığı için gelir vergisi beyannamesi vermenize gerek yoktur ve vergi ödemezsiniz.';
        istisnaMsg.style.display = 'block';
        document.getElementById('hc-kkgv-result').classList.add('visible');
        return;
    }

    var kalanGelir = gelir - istisnaLimit;
    var indirilebilirGider = 0;

    if (giderTuru === 'goturu') {
        // Götürü gider: matrahın %15'i oranında indirim yapılır
        indirilebilirGider = kalanGelir * 0.15;
    } else {
        // Gerçek giderde giderlerin istisnaya isabet eden kısmı indirilemez. Formül: Gerçek Gider * (Gelir - İstisna) / Gelir
        indirilebilirGider = gercekGider * (kalanGelir / gelir);
    }

    var matrah = kalanGelir - indirilebilirGider;
    if (matrah < 0) matrah = 0;

    // Vergi Hesaplama
    var vergi = 0;
    
    if (yil === '2025') {
        // 2025 Gelir Vergisi Dilimleri (Ücret dışı gelirler)
        if (matrah <= 158000) {
            vergi = matrah * 0.15;
        } else if (matrah <= 330000) {
            vergi = 23700 + (matrah - 158000) * 0.20;
        } else if (matrah <= 800000) {
            vergi = 58100 + (matrah - 330000) * 0.27;
        } else if (matrah <= 4300000) {
            vergi = 185000 + (matrah - 800000) * 0.35;
        } else {
            vergi = 1410000 + (matrah - 4300000) * 0.40;
        }
    } else {
        // 2026 Gelir Vergisi Dilimleri (Ücret dışı gelirler)
        if (matrah <= 190000) {
            vergi = matrah * 0.15;
        } else if (matrah <= 400000) {
            vergi = 28500 + (matrah - 190000) * 0.20;
        } else if (matrah <= 1000000) {
            vergi = 70500 + (matrah - 400000) * 0.27;
        } else if (matrah <= 5300000) {
            vergi = 232500 + (matrah - 1000000) * 0.35;
        } else {
            vergi = 1737500 + (matrah - 5300000) * 0.40;
        }
    }

    var damgaVergisi = yil === '2026' ? 650 : 460;

    document.getElementById('hc-kkgv-res-brut').innerText = gelir.toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-kkgv-res-istisna').innerText = '-' + istisnaLimit.toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-kkgv-res-gider').innerText = '-' + Math.round(indirilebilirGider).toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-kkgv-res-matrah').innerText = Math.round(matrah).toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-kkgv-res-vergi').innerText = Math.round(vergi).toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-kkgv-res-damga').innerText = damgaVergisi.toLocaleString('tr-TR') + ' ₺';

    tableArea.style.display = 'block';
    document.getElementById('hc-kkgv-result').classList.add('visible');
}
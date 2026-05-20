function hcLbtModelDegisti() {
    var model = document.getElementById('hc-lbt-model').value;
    var customDiv = document.getElementById('hc-lbt-custom-limit-gr');
    if (model === 'custom') {
        customDiv.style.display = 'block';
    } else {
        customDiv.style.display = 'none';
    }
}

function hcLbtGirdiTuruDegisti() {
    var tur = document.getElementById('hc-lbt-girdi-turu').value;
    var kelimeGr = document.getElementById('hc-lbt-kelime-gr');
    var metinGr = document.getElementById('hc-lbt-metin-gr');

    if (tur === 'kelime') {
        kelimeGr.style.display = 'block';
        metinGr.style.display = 'none';
    } else {
        kelimeGr.style.display = 'none';
        metinGr.style.display = 'block';
    }
}

function hcLbtMetinDegisti() {
    var txt = document.getElementById('hc-lbt-metin').value;
    var charCount = txt.length;
    var wordCount = txt.trim() === '' ? 0 : txt.trim().split(/\s+/).length;
    document.getElementById('hc-lbt-metin-bilgi').textContent = 'Karakter: ' + charCount.toLocaleString('tr-TR') + ' | Kelime: ' + wordCount.toLocaleString('tr-TR');
}

function hcLlmBaglamPenceresiTokenHesapla() {
    var model = document.getElementById('hc-lbt-model').value;
    var limit = 0;

    if (model === 'custom') {
        limit = parseFloat(document.getElementById('hc-lbt-custom-limit').value);
    } else {
        limit = parseFloat(model);
    }

    if (!limit || limit <= 0) {
        alert('Lütfen geçerli bir model limiti girin.');
        return;
    }

    var tur = document.getElementById('hc-lbt-girdi-turu').value;
    var kelimeSayisi = 0;

    if (tur === 'kelime') {
        kelimeSayisi = parseFloat(document.getElementById('hc-lbt-kelime-sayisi').value);
        if (!kelimeSayisi || kelimeSayisi <= 0) {
            alert('Lütfen geçerli bir kelime sayısı girin.');
            return;
        }
    } else {
        var metin = document.getElementById('hc-lbt-metin').value;
        kelimeSayisi = metin.trim() === '' ? 0 : metin.trim().split(/\s+/).length;
        if (kelimeSayisi === 0) {
            alert('Lütfen hesaplanacak bir metin yapıştırın.');
            return;
        }
    }

    // Dil/tip çarpanları
    var dil = document.getElementById('hc-lbt-dil').value;
    var carpan = 1.8;
    if (dil === 'en') carpan = 1.3;
    else if (dil === 'kod') carpan = 2.2;

    var tahminiToken = kelimeSayisi * carpan;
    var dolulukOrani = (tahminiToken / limit) * 100;
    var kalanToken = limit - tahminiToken;

    var fmtSayi = function(val) {
        return Math.round(val).toLocaleString('tr-TR');
    };

    document.getElementById('hc-lbt-res-token').textContent = fmtSayi(tahminiToken) + ' token';
    document.getElementById('hc-lbt-res-limit').textContent = fmtSayi(limit) + ' token';
    
    var dolulukEl = document.getElementById('hc-lbt-res-doluluk');
    dolulukEl.textContent = '%' + dolulukOrani.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    
    if (dolulukOrani > 100) {
        dolulukEl.style.color = 'var(--hc-front-red)';
        dolulukEl.textContent += ' (LİMİT AŞILDI!)';
        document.getElementById('hc-lbt-res-kalan').textContent = 'Kapasite yetersiz (' + fmtSayi(Math.abs(kalanToken)) + ' token aşıldı)';
        document.getElementById('hc-lbt-res-kalan').style.color = 'var(--hc-front-red)';
    } else {
        dolulukEl.style.color = dolulukOrani > 80 ? 'var(--hc-front-orange)' : 'var(--hc-front-text)';
        document.getElementById('hc-lbt-res-kalan').textContent = fmtSayi(kalanToken) + ' token boş yer var';
        document.getElementById('hc-lbt-res-kalan').style.color = 'var(--hc-front-green)';
    }

    document.getElementById('hc-llm-baglam-token-result').classList.add('visible');
}

// Yüzde Hesaplama Ana Mantık ve Fonksiyonları

function hcYhSelectTab(tabName) {
    var calc = document.getElementById('hc-yuzde-hesaplama');
    if (!calc) return;

    var panels = calc.querySelectorAll('.hc-yh-panel');
    panels.forEach(function(p) {
        p.style.display = 'none';
        p.classList.remove('active');
    });

    var targetPanel = document.getElementById('hc-yh-panel-' + tabName);
    if (targetPanel) {
        targetPanel.style.display = 'block';
        targetPanel.classList.add('active');
    }

    var select = document.getElementById('hc-yh-islem-turu');
    if (select && select.value !== tabName) {
        select.value = tabName;
    }
}

function hcYhTab(tabName, btn) {
    hcYhSelectTab(tabName);
}


function hcYhFormatNumber(num, maxDecimals) {
    if (num === null || num === undefined || isNaN(num)) return '-';
    maxDecimals = (typeof maxDecimals === 'number') ? maxDecimals : 4;
    var factor = Math.pow(10, maxDecimals);
    var rounded = Math.round(num * factor) / factor;
    return rounded.toLocaleString('tr-TR', { maximumFractionDigits: maxDecimals });
}

function hcYhKopyala(elementId) {
    var el = document.getElementById(elementId);
    if (!el) return;
    var text = el.innerText || el.textContent;
    if (!text || text === '-') return;

    navigator.clipboard.writeText(text).then(function() {
        var btn = event ? (event.target || event.srcElement) : null;
        if (btn) {
            var oldText = btn.innerHTML;
            btn.innerHTML = '✅ Kopyalandı';
            setTimeout(function() {
                btn.innerHTML = oldText;
            }, 1800);
        }
    }).catch(function() {
        alert('Kopyalama başarısız oldu.');
    });
}

function hcYhSetP1B(pct) {
    var input = document.getElementById('hc-yh-p1-b');
    if (input) {
        input.value = pct;
        var a = parseFloat(document.getElementById('hc-yh-p1-a').value);
        if (!isNaN(a)) {
            hcYhHesaplaSayi();
        }
    }
}

function hcYhSetP4B(pct) {
    var input = document.getElementById('hc-yh-p4-b');
    if (input) {
        input.value = pct;
        var a = parseFloat(document.getElementById('hc-yh-p4-a').value);
        if (!isNaN(a)) {
            hcYhHesaplaEkleCikar();
        }
    }
}

function hcYhSifirla(panel) {
    if (panel === 'sayi') {
        document.getElementById('hc-yh-p1-a').value = '';
        document.getElementById('hc-yh-p1-b').value = '';
        document.getElementById('hc-yh-res-sayi').classList.remove('visible');
    } else if (panel === 'oran') {
        document.getElementById('hc-yh-p2-a').value = '';
        document.getElementById('hc-yh-p2-b').value = '';
        document.getElementById('hc-yh-res-oran').classList.remove('visible');
    } else if (panel === 'degisim') {
        document.getElementById('hc-yh-p3-a').value = '';
        document.getElementById('hc-yh-p3-b').value = '';
        document.getElementById('hc-yh-res-degisim').classList.remove('visible');
    } else if (panel === 'ekle-cikar') {
        document.getElementById('hc-yh-p4-a').value = '';
        document.getElementById('hc-yh-p4-b').value = '';
        document.getElementById('hc-yh-res-ekle-cikar').classList.remove('visible');
    } else if (panel === 'ters') {
        document.getElementById('hc-yh-p5-a').value = '';
        document.getElementById('hc-yh-p5-b').value = '';
        document.getElementById('hc-yh-res-ters').classList.remove('visible');
    }
}

// 1. Sekme: Sayının Yüzdesi (A'nın %B'si)
function hcYhHesaplaSayi() {
    var a = parseFloat(document.getElementById('hc-yh-p1-a').value);
    var b = parseFloat(document.getElementById('hc-yh-p1-b').value);

    if (isNaN(a) || isNaN(b)) {
        alert('Lütfen geçerli bir sayı ve yüzde oranı giriniz.');
        return;
    }

    var sonuc = a * (b / 100);
    var eklenmis = a + sonuc;
    var cikarilmis = a - sonuc;

    document.getElementById('hc-yh-p1-title').innerText = hcYhFormatNumber(a) + ' sayısının %' + hcYhFormatNumber(b) + ' kadarı';
    document.getElementById('hc-yh-p1-main').innerText = hcYhFormatNumber(sonuc);
    document.getElementById('hc-yh-p1-added').innerText = hcYhFormatNumber(eklenmis);
    document.getElementById('hc-yh-p1-subbed').innerText = hcYhFormatNumber(cikarilmis);

    // Formül
    var formula = '<strong>Formül:</strong> ' + hcYhFormatNumber(a) + ' × (' + hcYhFormatNumber(b) + ' ÷ 100) = <strong>' + hcYhFormatNumber(sonuc) + '</strong><br>' +
                  '<small>• Zamlı/Eklenmiş Değer: ' + hcYhFormatNumber(a) + ' + ' + hcYhFormatNumber(sonuc) + ' = ' + hcYhFormatNumber(eklenmis) + '<br>' +
                  '• İndirimli/Çıkarılmış Değer: ' + hcYhFormatNumber(a) + ' - ' + hcYhFormatNumber(sonuc) + ' = ' + hcYhFormatNumber(cikarilmis) + '</small>';
    document.getElementById('hc-yh-p1-formula').innerHTML = formula;

    // Pratik Tablo Oluşturma
    var pratikOranlar = [1, 5, 8, 10, 18, 20, 25, 50, 75];
    var tableHtml = '';
    for (var i = 0; i < pratikOranlar.length; i++) {
        var p = pratikOranlar[i];
        var val = a * (p / 100);
        tableHtml += '<div class="hc-yh-table-item">' +
                        '<span class="hc-yh-ti-pct">%' + p + '</span>' +
                        '<span class="hc-yh-ti-val">' + hcYhFormatNumber(val) + '</span>' +
                     '</div>';
    }
    document.getElementById('hc-yh-p1-table').innerHTML = tableHtml;

    document.getElementById('hc-yh-res-sayi').classList.add('visible');
}

// 2. Sekme: Yüzde Oranı (A, B'nin yüzde kaçı?)
function hcYhHesaplaOran() {
    var a = parseFloat(document.getElementById('hc-yh-p2-a').value);
    var b = parseFloat(document.getElementById('hc-yh-p2-b').value);

    if (isNaN(a) || isNaN(b)) {
        alert('Lütfen parça ve bütün değerlerini giriniz.');
        return;
    }

    if (b === 0) {
        alert('Toplam (bütün) değer 0 olamaz.');
        return;
    }

    var yuzde = (a / b) * 100;
    var kalan = 100 - yuzde;

    document.getElementById('hc-yh-p2-title').innerText = hcYhFormatNumber(a) + ' sayısı, ' + hcYhFormatNumber(b) + ' sayısının:';
    document.getElementById('hc-yh-p2-main').innerText = '%' + hcYhFormatNumber(yuzde);
    document.getElementById('hc-yh-p2-kalan').innerText = '%' + hcYhFormatNumber(kalan);
    document.getElementById('hc-yh-p2-kesir').innerText = hcYhFormatNumber(a) + ' / ' + hcYhFormatNumber(b);

    // Oran Çubuğu
    var barWidth = Math.max(0, Math.min(100, yuzde));
    document.getElementById('hc-yh-p2-bar').style.width = barWidth + '%';
    document.getElementById('hc-yh-p2-bar-pct').innerText = '%' + hcYhFormatNumber(yuzde);
    document.getElementById('hc-yh-p2-bar-rem').innerText = '%' + hcYhFormatNumber(kalan) + ' Kalan';

    // Formül
    var formula = '<strong>Formül:</strong> (' + hcYhFormatNumber(a) + ' ÷ ' + hcYhFormatNumber(b) + ') × 100 = <strong>%' + hcYhFormatNumber(yuzde) + '</strong>';
    document.getElementById('hc-yh-p2-formula').innerHTML = formula;

    document.getElementById('hc-yh-res-oran').classList.add('visible');
}

// 3. Sekme: Yüzde Değişim (Artış / Azalış)
function hcYhHesaplaDegisim() {
    var a = parseFloat(document.getElementById('hc-yh-p3-a').value);
    var b = parseFloat(document.getElementById('hc-yh-p3-b').value);

    if (isNaN(a) || isNaN(b)) {
        alert('Lütfen eski ve yeni değerleri giriniz.');
        return;
    }

    if (a === 0) {
        alert('İlk/eski değer 0 olduğunda yüzde değişim hesaplanamaz (sıfıra bölme hatası).');
        return;
    }

    var fark = b - a;
    var degisim = (fark / Math.abs(a)) * 100;
    var kat = b / a;

    var resMain = document.getElementById('hc-yh-p3-main');
    if (degisim > 0) {
        resMain.innerHTML = '<span style="color:#0f8a5f;">+% ' + hcYhFormatNumber(degisim) + ' Artış ↗</span>';
    } else if (degisim < 0) {
        resMain.innerHTML = '<span style="color:#c0362c;">-% ' + hcYhFormatNumber(Math.abs(degisim)) + ' Azalış ↘</span>';
    } else {
        resMain.innerHTML = '<span style="color:#64748b;">% 0 Değişim Yok ➔</span>';
    }

    document.getElementById('hc-yh-p3-fark').innerText = (fark > 0 ? '+' : '') + hcYhFormatNumber(fark);
    document.getElementById('hc-yh-p3-kat').innerText = hcYhFormatNumber(kat) + ' katı';

    // Formül
    var formula = '<strong>Formül:</strong> [(' + hcYhFormatNumber(b) + ' - ' + hcYhFormatNumber(a) + ') ÷ ' + hcYhFormatNumber(Math.abs(a)) + '] × 100 = <strong>%' + hcYhFormatNumber(degisim) + '</strong><br>' +
                  '<small>• Mutlak Fark: ' + hcYhFormatNumber(b) + ' - ' + hcYhFormatNumber(a) + ' = ' + hcYhFormatNumber(fark) + '</small>';
    document.getElementById('hc-yh-p3-formula').innerHTML = formula;

    document.getElementById('hc-yh-res-degisim').classList.add('visible');
}

// 4. Sekme: Yüzde Ekle / Çıkar (Zam & İndirim)
function hcYhHesaplaEkleCikar() {
    var a = parseFloat(document.getElementById('hc-yh-p4-a').value);
    var b = parseFloat(document.getElementById('hc-yh-p4-b').value);

    var islemEl = document.querySelector('input[name="hc-yh-p4-islem"]:checked');
    var islem = islemEl ? islemEl.value : 'ekle';

    if (isNaN(a) || isNaN(b)) {
        alert('Lütfen geçerli bir tutar ve yüzde oranı giriniz.');
        return;
    }

    var fark = a * (b / 100);
    var yeniTutar = (islem === 'ekle') ? (a + fark) : (a - fark);

    var title = (islem === 'ekle') ? '% ' + hcYhFormatNumber(b) + ' Zam/KDV Eklenmiş Yeni Tutar' : '% ' + hcYhFormatNumber(b) + ' İndirimli Yeni Tutar';
    document.getElementById('hc-yh-p4-res-title').innerText = title;
    document.getElementById('hc-yh-p4-main').innerText = hcYhFormatNumber(yeniTutar);

    var farkLabel = (islem === 'ekle') ? 'Eklenen Zam / Fark Tutarı' : 'Yapılan İndirim Tutarı';
    document.getElementById('hc-yh-p4-fark-label').innerText = farkLabel;
    document.getElementById('hc-yh-p4-fark').innerText = (islem === 'ekle' ? '+' : '-') + hcYhFormatNumber(fark);
    document.getElementById('hc-yh-p4-orijinal').innerText = hcYhFormatNumber(a);

    // Formül
    var islemSembol = (islem === 'ekle') ? '+' : '-';
    var islemText = (islem === 'ekle') ? 'Ekleme / Zam' : 'Çıkarma / İndirim';
    var formula = '<strong>İşlem:</strong> ' + hcYhFormatNumber(a) + ' ' + islemSembol + ' (' + hcYhFormatNumber(a) + ' × ' + hcYhFormatNumber(b) + ' ÷ 100) = <strong>' + hcYhFormatNumber(yeniTutar) + '</strong><br>' +
                  '<small>• Uygulanan ' + islemText + ' Miktarı: ' + hcYhFormatNumber(fark) + '</small>';
    document.getElementById('hc-yh-p4-formula').innerHTML = formula;

    document.getElementById('hc-yh-res-ekle-cikar').classList.add('visible');
}

// 5. Sekme: Tamamını Bul (Ters Yüzde)
function hcYhHesaplaTers() {
    var a = parseFloat(document.getElementById('hc-yh-p5-a').value);
    var b = parseFloat(document.getElementById('hc-yh-p5-b').value);

    if (isNaN(a) || isNaN(b)) {
        alert('Lütfen yüzde oranını ve karşılık gelen tutarı giriniz.');
        return;
    }

    if (a === 0) {
        alert('Yüzde oranı 0 olamaz.');
        return;
    }

    var tamam = (b * 100) / a;

    document.getElementById('hc-yh-p5-main').innerText = hcYhFormatNumber(tamam);
    document.getElementById('hc-yh-p5-parca').innerText = hcYhFormatNumber(b);
    document.getElementById('hc-yh-p5-oran').innerText = '%' + hcYhFormatNumber(a);

    // Formül
    var formula = '<strong>Formül:</strong> (' + hcYhFormatNumber(b) + ' × 100) ÷ ' + hcYhFormatNumber(a) + ' = <strong>' + hcYhFormatNumber(tamam) + '</strong><br>' +
                  '<small>• Doğrulama: ' + hcYhFormatNumber(tamam) + ' sayısının %' + hcYhFormatNumber(a) + ' kadarı = ' + hcYhFormatNumber(b) + '</small>';
    document.getElementById('hc-yh-p5-formula').innerHTML = formula;

    document.getElementById('hc-yh-res-ters').classList.add('visible');
}

// Geriye uyumluluk için eski fonksiyon alias'ı
function hcPctGenHesapla() {
    hcYhHesaplaSayi();
}


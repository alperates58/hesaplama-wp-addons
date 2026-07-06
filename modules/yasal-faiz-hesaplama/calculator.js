function hcYasalFaizHesapla() {
    var anapara = parseFloat(document.getElementById('hc-yf-anapara').value) || 0;
    var baslangicStr = document.getElementById('hc-yf-baslangic').value;
    var bitisStr = document.getElementById('hc-yf-bitis').value;

    if (anapara <= 0 || !baslangicStr || !bitisStr) {
        alert('Lütfen anapara tutarını ve tarihleri giriniz.');
        return;
    }

    var baslangic = new Date(baslangicStr);
    var bitis = new Date(bitisStr);

    var diffTime = bitis - baslangic;
    var diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

    if (diffDays <= 0) {
        alert('Faiz bitiş tarihi başlangıç tarihinden sonra olmalıdır.');
        return;
    }

    // Güncel yasal faiz oranı: %24
    var yasalOran = 0.24;
    var faiz = anapara * yasalOran * (diffDays / 365);
    var toplam = anapara + faiz;

    if (typeof window.HC !== 'undefined' && typeof window.HC.ResultEngine !== 'undefined' && window.HC.ResultEngine.render('yasal-faiz-hesaplama', {
        primaryResult: Math.round(toplam).toLocaleString('tr-TR') + ' ₺',
        shortSummary: 'Yasal faiz hesaplaması başarıyla tamamlandı.',
        interpretation: 'Belirtilen tarihler arasındaki günlük faiz oranı yıllık %24 (günlük %0.06575) üzerinden hesaplanmıştır.',
        referenceTable: {
            headers: ['Açıklama', 'Değer'],
            rows: [
                ['Faize Esas Anapara', anapara.toLocaleString('tr-TR') + ' ₺'],
                ['Günlük Yasal Faiz Oranı', '%0.06575 (Yıllık %24)'],
                ['Geçen Gün Sayısı', diffDays + ' Gün'],
                ['Biriken Faiz Tutarı', '+' + Math.round(faiz).toLocaleString('tr-TR') + ' ₺'],
                ['Toplam Alacak (Anapara + Faiz)', Math.round(toplam).toLocaleString('tr-TR') + ' ₺']
            ],
            highlightedRowIndex: 4
        },
        formula: {
            raw: 'Faiz = Anapara * 0.24 * (Gün Sayısı / 365)',
            text: 'Anaparanın yıllık yasal faiz oranı (%24) ve gün sayısı ile çarpılarak 365 güne bölünmesiyle hesaplanır.'
        },
        example: '100.000 ₺ anapara için 1 yıllık yasal faiz tutarı: 100.000 * 0.24 * 1 = 24.000 ₺.',
        source: {
            name: 'TCMB Yasal Faiz Tebliğleri',
            url: 'https://www.tcmb.gov.tr'
        },
        nextActions: [
            'Dava ve temerrüt tarihlerinin mevzuata uygunluğunu hukuk müşavirinizle netleştirin.',
            'Hesaplanan toplam alacak tutarı ile icra takibi başlatabilirsiniz.'
        ],
        faq: [
            { question: "Yasal faiz oranı 2026 yılı için ne kadar?", answer: "Yıllık yasal faiz oranı %24 olarak uygulanmaktadır." },
            { question: "Dönemsel faiz değişiklikleri hesaba katılıyor mu?", answer: "Bu modül güncel sabit yasal faiz oranını baz almaktadır." }
        ],
        metadata: {
            severity: 'success',
            status: 'success',
            lastUpdated: '2026-07-06',
            badges: ['Finans & Ekonomi', 'Yasal Faiz %24']
        }
    })) {
        return;
    }

    document.getElementById('hc-yf-res-anapara').innerText = anapara.toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-yf-res-gun').innerText = diffDays + ' Gün';
    document.getElementById('hc-yf-res-faiz').innerText = '+' + Math.round(faiz).toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-yf-res-toplam').innerText = Math.round(toplam).toLocaleString('tr-TR') + ' ₺';

    document.getElementById('hc-yf-result').classList.add('visible');
}
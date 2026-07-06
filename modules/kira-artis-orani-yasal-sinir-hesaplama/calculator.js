function hcKiraArtisYasalSinirHesapla() {
    var kira = parseFloat(document.getElementById('hc-kay-kira').value) || 0;
    var oran = parseFloat(document.getElementById('hc-kay-ay').value) || 0.25;
    
    if (kira <= 0) {
        alert('Lütfen mevcut kira bedelini giriniz.');
        return;
    }

    var artis = kira * oran;
    var yeniKira = kira + artis;

    if (typeof window.HC !== 'undefined' && typeof window.HC.ResultEngine !== 'undefined' && window.HC.ResultEngine.render('kira-artis-orani-yasal-sinir-hesaplama', {
        primaryResult: Math.round(yeniKira).toLocaleString('tr-TR') + ' ₺',
        shortSummary: 'Yasal kira artış oranı hesaplandı.',
        interpretation: 'Hesaplanan tutar, TÜFE 12 aylık ortalaması yasal tavanı baz alınarak yapılmıştır. Türk Borçlar Kanunu Madde 344 uyarınca konut kiralarında yasal artış sınırı bu oranı geçemez.',
        referenceTable: {
            headers: ['Açıklama', 'Değer'],
            rows: [
                ['Mevcut Kira Bedeli', kira.toLocaleString('tr-TR') + ' ₺'],
                ['Artış Oranı', '%' + (oran * 100).toFixed(2)],
                ['Artış Miktarı', '+' + Math.round(artis).toLocaleString('tr-TR') + ' ₺'],
                ['Yeni Kira Bedeli', Math.round(yeniKira).toLocaleString('tr-TR') + ' ₺']
            ],
            highlightedRowIndex: 3
        },
        formula: {
            raw: 'Yeni Kira = Mevcut Kira * (1 + Artış Oranı)',
            text: 'Mevcut kira tutarı belirlenen yasal artış oranı (TÜFE 12 aylık ortalaması) kadar artırılarak yeni dönem kira bedeli hesaplanır.'
        },
        example: '10.000 ₺ kira için %60 yasal artış yapıldığında yeni kira 16.000 ₺ olur.',
        source: {
            name: 'Türkiye Borçlar Kanunu Madde 344 ve TÜİK Enflasyon Verileri',
            url: 'https://www.mevzuat.gov.tr'
        },
        nextActions: [
            'Artış oranının kontrat yenileme ayına ait güncel TÜFE 12 aylık ortalaması olduğunu doğrulayın.',
            'Ev sahibi ve kiracı arasında yazılı mutabakat sağlayarak kira sözleşmesine ek protokol yapın.'
        ],
        faq: [
            { question: "Konut kiralarında %25 sınırı devam ediyor mu?", answer: "Hayır, Temmuz 2024 itibarıyla %25 yasal sınır uygulaması sona ermiş olup, artışlar yeniden TÜFE 12 aylık ortalamalarına göre belirlenmektedir." },
            { question: "İş yeri kiralarında artış sınırı nedir?", answer: "İş yeri kiralarında da yasal tavan oranı TÜFE 12 aylık ortalamasıdır." }
        ],
        metadata: {
            severity: 'info',
            status: 'success',
            lastUpdated: '2026-07-06',
            badges: ['Hukuk & Mevzuat', 'Konut / Kira']
        }
    })) {
        return;
    }

    document.getElementById('hc-kay-res-eski').innerText = kira.toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-kay-res-oran').innerText = '%' + (oran * 100).toFixed(2);
    document.getElementById('hc-kay-res-artis').innerText = '+' + Math.round(artis).toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-kay-res-yeni').innerText = Math.round(yeniKira).toLocaleString('tr-TR') + ' ₺';

    document.getElementById('hc-kay-result').classList.add('visible');
}
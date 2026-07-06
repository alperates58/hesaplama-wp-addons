function hcKdvTevkifatHesapla() {
    const amount = parseFloat(document.getElementById('hc-kdv-amount').value);
    const kdvRate = parseFloat(document.getElementById('hc-kdv-rate').value) / 100;
    const tevkifatRate = parseFloat(document.getElementById('hc-kdv-tevkifat-rate').value);

    if (isNaN(amount) || amount <= 0) {
        alert('Lütfen geçerli bir tutar girin.');
        return;
    }

    const totalKdv = amount * kdvRate;
    const tevkifatAmount = totalKdv * tevkifatRate;
    const sellerKdv = totalKdv - tevkifatAmount;
    const grandTotal = amount + sellerKdv;

    if (typeof window.HC !== 'undefined' && typeof window.HC.ResultEngine !== 'undefined' && window.HC.ResultEngine.render('kdv-hesaplama-tevkifatli', {
        primaryResult: grandTotal.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺',
        shortSummary: 'Tevkifatlı KDV hesaplaması başarıyla yapıldı.',
        interpretation: 'Girilen tutara ait KDV oranının bir kısmı alıcı tarafından beyan edilmek üzere tevkif edilmiş (kesilmiş), kalan kısım ise satıcıya ödenmek üzere hesaplanmıştır.',
        referenceTable: {
            headers: ['Açıklama', 'Tutar (₺)'],
            rows: [
                ['Matrah (KDV Hariç Tutar)', amount.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺'],
                ['Hesaplanan Toplam KDV', totalKdv.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺'],
                ['Tevkif Edilen KDV Tutarı', '-' + tevkifatAmount.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺'],
                ['Beyan Edilecek KDV (Satıcıya Ödenen)', sellerKdv.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺'],
                ['Fatura Genel Toplamı (Matrah + Satıcı KDV)', grandTotal.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺']
            ],
            highlightedRowIndex: 4
        },
        formula: {
            raw: 'Tevkifat Tutarı = KDV Tutarı * Tevkifat Oranı (örn. 5/10)',
            text: 'Toplam KDV tutarı hesaplandıktan sonra, ilgili tevkifat oranına (bölümüne) göre KDV ikiye bölünür. Kesilen kısım alıcı tarafından 2 no\'lu KDV beyannamesi ile devlete beyan edilir.'
        },
        source: {
            name: 'Gelir İdaresi Başkanlığı (GİB) KDV Tebliği',
            url: 'https://www.gib.gov.tr'
        },
        nextActions: [
            'Faturayı keserken tevkifat kodunun ve oranının doğru seçildiğinden emin olun.',
            'Tevkif edilen tutarı 2 no\'lu KDV beyannamesi ile beyan süresi içinde ödeyin.'
        ],
        faq: [
            { question: "KDV tevkifatı kimler için zorunludur?", answer: "Belirli kamu kurumları, borsalar ve tebliğde belirtilen mal/hizmet alıcıları tevkifat yapmakla yükümlüdür." },
            { question: "En sık kullanılan tevkifat oranları nelerdir?", answer: "Genellikle 5/10, 7/10 ve 9/10 oranları işgücü, temizlik ve yapım işlerinde sıkça kullanılır." }
        ],
        metadata: {
            severity: 'success',
            status: 'success',
            lastUpdated: '2026-07-06',
            badges: ['Finans & Ekonomi', 'Vergi / Tevkifat']
        }
    })) {
        return;
    }

    document.getElementById('hc-kdv-res-total-kdv').innerText = totalKdv.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-kdv-res-tevkifat').innerText = tevkifatAmount.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-kdv-res-seller-kdv').innerText = sellerKdv.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-kdv-res-grand').innerText = grandTotal.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-kdv-tevkifat-result').classList.add('visible');
}

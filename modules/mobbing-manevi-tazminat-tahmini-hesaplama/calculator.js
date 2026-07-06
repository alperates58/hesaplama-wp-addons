function hcMobbingTazminatHesapla() {
    var sure = parseInt(document.getElementById('hc-mmt-sure').value) || 1;
    var psiko = parseFloat(document.getElementById('hc-mmt-psiko').value);
    var delil = parseFloat(document.getElementById('hc-mmt-delil').value);
    var sirket = parseFloat(document.getElementById('hc-mmt-sirket').value);

    var uyariDiv = document.getElementById('hc-mmt-uyari');
    uyariDiv.style.display = 'none';

    if (sure <= 0) {
        alert('Lütfen mobbing süresini giriniz.');
        return;
    }

    if (delil === 5) {
        uyariDiv.innerHTML = '<strong>Önemli Uyarı:</strong> Hukuk davalarında iddia sahibi iddiasını ispatla mükelleftir. Elinizde yazılı delil, şahit veya tıbbi rapor bulunmuyorsa davanın reddedilme olasılığı yüksektir. Mobbingi kanıtlamak için e-postaları saklamanız ve doktor raporu almanız tavsiye edilir.';
        uyariDiv.style.display = 'block';
    }

    // Puanlama modeli
    var surePuan = Math.min(sure * 2.5, 30); // Süre çarpanı max 30
    var toplamPuan = surePuan + psiko + delil;

    var minTazminat = toplamPuan * sirket * 250;
    var maxTazminat = minTazminat * 2.0;

    // Mutlak limitler (2026 yılı Yargıtay eğilimlerine göre)
    if (minTazminat < 15000) minTazminat = 15000;
    if (maxTazminat > 400000) maxTazminat = 400000;
    if (delil === 5) {
        minTazminat = minTazminat * 0.4;
        maxTazminat = maxTazminat * 0.4;
    }

    if (typeof window.HC !== 'undefined' && typeof window.HC.ResultEngine !== 'undefined' && window.HC.ResultEngine.render('mobbing-manevi-tazminat-tahmini-hesaplama', {
        primaryResult: Math.round(minTazminat).toLocaleString('tr-TR') + ' ₺ - ' + Math.round(maxTazminat).toLocaleString('tr-TR') + ' ₺',
        shortSummary: 'Mobbing manevi tazminat tahmini aralığı hesaplandı.',
        interpretation: 'Hesaplanan tutar, mobbing süresi, delil durumu ve şirket büyüklüğü katsayıları baz alınarak Yargıtay emsal kararları çerçevesinde tahmin edilmiştir.',
        referenceTable: {
            headers: ['Kriter', 'Girdi Değeri'],
            rows: [
                ['Mobbing Süresi', sure + ' Ay'],
                ['Psikolojik Etki Katsayısı', psiko + ' Puan'],
                ['Delil/İspat Durumu', delil === 35 ? 'Güçlü Yazılı Deliller var' : (delil === 20 ? 'Şahit/Kısmi Deliller var' : 'Sadece Beyan (Delil Yok)')],
                ['Şirket Büyüklüğü', sirket === 2.5 ? 'Büyük Ölçekli' : (sirket === 1.5 ? 'Orta Ölçekli' : 'Küçük Ölçekli')],
                ['Tahmini Minimum Tazminat', Math.round(minTazminat).toLocaleString('tr-TR') + ' ₺'],
                ['Tahmini Maksimum Tazminat', Math.round(maxTazminat).toLocaleString('tr-TR') + ' ₺']
            ],
            highlightedRowIndex: 4
        },
        formula: {
            raw: 'Tazminat = (Süre Puanı + Psikolojik Etki + Delil Puanı) * Şirket Katsayısı * 250',
            text: 'Mobbing süresi (max 30 puan), psikolojik etki (max 35 puan) ve delil gücü (max 35 puan) toplanarak şirket katsayısı ve taban ücret çarpanı ile hesaplanır. Delil olmaması durumunda %60 hakkaniyet indirimi uygulanır.'
        },
        example: '6 ay süre, orta etki ve güçlü delil içeren bir senaryoda tazminat tahmini yaklaşık 45.000 ₺ - 90.000 ₺ arasındadır.',
        source: {
            name: 'Yargıtay 9. Hukuk Dairesi Emsal Mobbing Kararları ve Türk Borçlar Kanunu Madde 56',
            url: 'https://www.mevzuat.gov.tr'
        },
        nextActions: [
            'Mobbing teşkil eden tüm e-posta, mesaj ve yazışmaları güvenli bir şekilde arşivleyin.',
            'Yaşadığınız psikolojik yıpranmayı belgelemek adına devlet hastanesinden psikiyatrik rapor alın.',
            'İş akdinizi haklı nedenle feshetmeden önce mutlaka bir iş hukuku avukatına danışın.'
        ],
        faq: [
            { question: "Mobbing davalarında ispat yükü kimdedir?", answer: "İddia sahibi işçi mobbinge uğradığını delillerle veya güçlü emarelerle kanıtlamakla yükümlüdür." },
            { question: "Manevi tazminat miktarı neye göre belirlenir?", answer: "Tarafların sosyal ve ekonomik durumu, olayın vehameti, mobbingin süresi ve işçide bıraktığı hasar esas alınır." }
        ],
        metadata: {
            severity: 'warning',
            status: 'success',
            lastUpdated: '2026-07-06',
            badges: ['Hukuk & Mevzuat', 'Tazminat Tahmini']
        }
    })) {
        return;
    }

    document.getElementById('hc-mmt-val').innerText = 
        Math.round(minTazminat).toLocaleString('tr-TR') + ' ₺ - ' + Math.round(maxTazminat).toLocaleString('tr-TR') + ' ₺';

    document.getElementById('hc-mmt-result').classList.add('visible');
}
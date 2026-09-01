function hcIliskiNumerolojisiHesapla() {
    const n1 = document.getElementById('hc-num-n1').value.trim();
    const n2 = document.getElementById('hc-num-n2').value.trim();
    const d1 = document.getElementById('hc-num-d1').value;
    const d2 = document.getElementById('hc-num-d2').value;

    if (!n1 || !n2 || !d1 || !d2) {
        alert("Lütfen her iki partnerin de isim ve doğum tarihlerini giriniz.");
        return;
    }

    const pythagoreanMap = {
        'A': 1, 'J': 1, 'S': 1, 'Ş': 1,
        'B': 2, 'K': 2, 'T': 2,
        'C': 3, 'Ç': 3, 'L': 3, 'U': 3, 'Ü': 3,
        'D': 4, 'M': 4, 'V': 4,
        'E': 5, 'N': 5, 'W': 5,
        'F': 6, 'O': 6, 'Ö': 6, 'X': 6,
        'G': 7, 'Ğ': 7, 'P': 7, 'Y': 7,
        'H': 8, 'Q': 8, 'Z': 8,
        'I': 9, 'İ': 9, 'R': 9
    };

    const vowels = new Set(['A', 'E', 'I', 'İ', 'O', 'Ö', 'U', 'Ü']);

    function reduceToSingleOrMaster(num) {
        if (num === 11 || num === 22 || num === 33) return num;
        while (num > 9 && num !== 11 && num !== 22 && num !== 33) {
            let s = 0;
            num.toString().split('').forEach(d => s += parseInt(d));
            num = s;
        }
        return num;
    }

    function singleDigit(num) {
        while (num > 9) {
            let s = 0;
            num.toString().split('').forEach(d => s += parseInt(d));
            num = s;
        }
        return num;
    }

    function getLifePath(dateStr) {
        const d = new Date(dateStr);
        return reduceToSingleOrMaster(singleDigit(d.getDate()) + singleDigit(d.getMonth() + 1) + singleDigit(d.getFullYear()));
    }

    function getNameData(name) {
        const clean = name.toLocaleUpperCase('tr-TR').replace(/[^A-ZÇĞİÖŞÜ]/g, '');
        let tot = 0, vow = 0;
        for (let char of clean) {
            const v = pythagoreanMap[char] || 0;
            tot += v;
            if (vowels.has(char)) vow += v;
        }
        return {
            destiny: reduceToSingleOrMaster(tot),
            soul: reduceToSingleOrMaster(vow)
        };
    }

    const lp1 = getLifePath(d1);
    const lp2 = getLifePath(d2);
    const nameData1 = getNameData(n1);
    const nameData2 = getNameData(n2);

    // Kompozit İlişki Sayısı (Relationship Number = Life Path 1 + Life Path 2)
    const relNum = reduceToSingleOrMaster(singleDigit(lp1) + singleDigit(lp2));

    // Uyum Yüzdesi
    let compatibilityScore = 80;
    const diff = Math.abs(singleDigit(lp1) - singleDigit(lp2));
    if (diff === 0) compatibilityScore = 95;
    else if (diff === 2 || diff === 4 || diff === 6) compatibilityScore = 88;
    else if (diff === 1 || diff === 3) compatibilityScore = 75;
    if (relNum === 2 || relNum === 6 || relNum === 3) compatibilityScore += 5;
    if (compatibilityScore > 98) compatibilityScore = 98;

    const relationshipArchetypes = {
        1: { title: "Öncü & Dinamik Çift", chem: "Yüksek çekim, birlikte yeni projeler başlatma ve güçlü ortak hedefler.", light: "Bağımsızlıklarına saygı duyan, birlikte büyüyen ve çevreye ilham veren lider çift.", shadow: "Ego çatışmaları ve kimin lider olacağı inatlaşması." },
        2: { title: "Ruh Eşi & Kusursuz Uyum", chem: "Sözsüz anlaşma, derin empati, romantik şefkat ve huzurlu güven.", light: "Karşılıklı anlayış, güvenli liman olma ve sadakat.", shadow: "Kırgınlıkları içine atma veya aşırı alınganlık." },
        3: { title: "Neşeli & Yaratıcı Aşk", chem: "Sosyal, esprili, eğlenceli ve asla sıkılmayan renkli bir ilişki.", light: "Birlikte gülme, bol seyahat ve sanatsal/sosyal sinerji.", shadow: "Ciddi sorumlulukları erteleme veya yüzeysellik." },
        4: { title: "Sağlam & Sarsılmaz Ortaklık", chem: "Gelecek garantisi, sadakat, düzen ve evlilik temelleri.", light: "Uzun vadeli kalıcılık, maddi ve manevi güvence.", shadow: "Monotonluk veya aşırı kurallara takılma." },
        5: { title: "Macera Dolu & Özgür Aşk", chem: "Sürprizler, ani seyahatler, tutku ve yenilikçi enerji.", light: "Birbirini kısıtlamayan, heyecanı hep taze kalan ilişki.", shadow: "Bağlanma korkusu veya sabırsızlık." },
        6: { title: "Yuva Sıcaklığı & Koşulsuz Sevgi", chem: "Aile odaklı, koruyucu, şefkatli ve evlilik enerjisi yüksek bağ.", light: "Fedakarlık, romantizm ve huzurlu bir hayat paylaşımı.", shadow: "Aşırı kıskançlık veya kontrol etme isteği." },
        7: { title: "Mistik & Zihinsel Ruh Bağı", chem: "Derin sohbetler, felsefi uyum ve spiritüel yakınlık.", light: "Birbirinin kişisel alanına saygı duyan bilgece birliktelik.", shadow: "Duygusal soğukluk veya aşırı içine kapanma." },
        8: { title: "Güçlü & Bereketli Ortaklık", chem: "Maddi başarı, statü, büyük hedefler ve karşılıklı hayranlık.", light: "Birlikte finansal ve sosyal olarak zirveye tırmanma.", shadow: "Güç savaşları ve işi aşktan öne koyma riski." },
        9: { title: "Evrensel Sevgi & Karmik Bütünleşme", chem: "Kadersel karşılaşma, büyük aşk, şefkat ve birbirini tamamlama.", light: "Dünyayı güzelleştiren, derin ruhsal tatmin sunan aşk.", shadow: "Geçmiş kırgınlıkları bırakamamak." },
        11: { title: "Üstat Sezgisel Ruh Birliği (Master 11)", chem: "Telepatik bağ, yüksek ilham ve kutsal ruh eşi enerjisi.", light: "Birbirinin ruhunu uyandıran ve dönüştüren manyetik aşk.", shadow: "Aşırı hassasiyet ve duygusal iniş çıkışlar." },
        22: { title: "Büyük Gelecek Mimarları (Master 22)", chem: "Birlikte imparatorluk kurabilecek kadar güçlü ve vizyoner ortaklık.", light: "Kalıcı miras bırakma ve hayalleri gerçeğe dönüştürme.", shadow: "Ağır sorumluluklar altında romantizmi unutma." },
        33: { title: "Evrensel Şifa & Kutsal Kalp (Master 33)", chem: "Karşılıksız sevgi, derin merhamet ve kusursuz ruhsal şifa.", light: "Birbirinin yaralarını saran, saf aşkın yaşayan örneği.", shadow: "Kendini ilişkide tamamen unutup kurban psikolojisine girmek." }
    };

    const relInfo = relationshipArchetypes[relNum] || relationshipArchetypes[2];

    const heroHtml = `
        <div class="hc-num-hero-card">
            <div class="hc-num-badge">💖 İlişki Uyum Skoru: %${compatibilityScore} | Ortak İlişki Sayınız: ${relNum}</div>
            <div class="hc-num-title">${relInfo.title}</div>
            <p class="hc-num-sub">Aşk Kimyanız: <strong>${relInfo.chem}</strong></p>
        </div>
    `;

    const gridHtml = `
        <div class="hc-partner-card">
            <h4>👤 1. Partner (${n1})</h4>
            <p>🌱 <strong>Yaşam Yolu:</strong> ${lp1}</p>
            <p>⚡ <strong>Kader Sayısı:</strong> ${nameData1.destiny}</p>
            <p>💖 <strong>Ruh Güdüsü:</strong> ${nameData1.soul}</p>
        </div>

        <div class="hc-partner-card">
            <h4>👤 2. Partner (${n2})</h4>
            <p>🌱 <strong>Yaşam Yolu:</strong> ${lp2}</p>
            <p>⚡ <strong>Kader Sayısı:</strong> ${nameData2.destiny}</p>
            <p>💖 <strong>Ruh Güdüsü:</strong> ${nameData2.soul}</p>
        </div>
    `;

    const descHtml = `
        <p><strong>İlişkinizin Işık Potansiyeli (Süper Gücünüz):</strong> ${relInfo.light}</p>
        <p><strong>Gölge Tuzak (Dikkat Edilmesi Gereken):</strong> ${relInfo.shadow}</p>
        <p><strong>Kadersel Tavsiye:</strong> ${n1} ve ${n2} çifti olarak bir araya geldiğinizde ortaya çıkan <strong>${relNum} titreşimi</strong>, birbirinizin hayatında büyük bir tekamül başlatır. Açık iletişim kurarak bu enerjiyi besleyin.</p>
    `;

    document.getElementById('hc-in-hero').innerHTML = heroHtml;
    document.getElementById('hc-in-grid').innerHTML = gridHtml;
    document.getElementById('hc-num-details').innerHTML = descHtml;

    document.getElementById('hc-iliski-numerolojisi-result').classList.add('visible');
    document.getElementById('hc-iliski-numerolojisi-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}


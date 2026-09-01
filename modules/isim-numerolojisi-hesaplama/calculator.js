function hcNameNumHesapla() {
    const rawName = document.getElementById('hc-name-input').value.trim();
    if (!rawName) {
        alert('Lütfen adınızı ve soyadınızı giriniz.');
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

    const cleanChars = rawName.toLocaleUpperCase('tr-TR').replace(/[^A-ZÇĞİÖŞÜ]/g, '');
    if (cleanChars.length === 0) {
        alert('Lütfen geçerli harfler içeren bir isim giriniz.');
        return;
    }

    let totalSum = 0;
    let vowelSum = 0;
    let consonantSum = 0;
    const digitCounts = { 1: 0, 2: 0, 3: 0, 4: 0, 5: 0, 6: 0, 7: 0, 8: 0, 9: 0 };
    const letterBreakdown = [];

    for (let char of cleanChars) {
        const val = pythagoreanMap[char] || 0;
        if (val > 0) {
            totalSum += val;
            digitCounts[val]++;
            const isVowel = vowels.has(char);
            if (isVowel) vowelSum += val;
            else consonantSum += val;
            letterBreakdown.push({ char, val, isVowel });
        }
    }

    const expressionNum = reduceToSingleOrMaster(totalSum);
    const soulUrgeNum = reduceToSingleOrMaster(vowelSum);
    const personalityNum = reduceToSingleOrMaster(consonantSum);

    // Karmik Dersler (İsimde hiç bulunmayan sayılar)
    const karmicLessons = [];
    for (let i = 1; i <= 9; i++) {
        if (digitCounts[i] === 0) karmicLessons.push(i);
    }

    // Karmik Borçlar (Toplamda 13, 14, 16, 19 geçişi)
    const karmicDebts = [];
    if (totalSum === 13 || totalSum === 14 || totalSum === 16 || totalSum === 19) {
        karmicDebts.push(totalSum);
    }

    const numberArchetypes = {
        1: { name: "1 - Öncü Lider & Yaratıcı Güç", planet: "☀️ Güneş", chakra: "Boğaz / Taç", theme: "Bağımsızlık, inisiyatif, cesaret ve sıfırdan kurma potansiyeli." },
        2: { name: "2 - Diplomat & Sezgisel Arabulucu", planet: "🌙 Ay", chakra: "Üçüncü Göz / Kalp", theme: "Uyum, şefkat, iş birliği ve derin sezgisel algı." },
        3: { name: "3 - Yaratıcı Sanatçı & Neşe Kaynağı", planet: "♃ Jüpiter", chakra: "Sakral Çakra", theme: "Sanat, kendini ifade etme, mizah, popülerlik ve yüksek sosyal çekim." },
        4: { name: "4 - Usta İnşaatçı & Güvenilir Sistem", planet: "♄ Satürn / ♅ Uranüs", chakra: "Kök Çakra", theme: "Disiplin, sadakat, sarsılmaz sabır ve kalıcı yapılar kurma." },
        5: { name: "5 - Özgür Gezgin & Değişim Öncüsü", planet: "☿️ Merkür", chakra: "Boğaz Çakrası", theme: "Macera, esneklik, çok yönlülük ve kitlelerle hızlı iletişim." },
        6: { name: "6 - Şifacı Ebeveyn & Sevgi Mimarı", planet: "♀️ Venüs", chakra: "Kalp Çakrası", theme: "Koşulsuz sevgi, koruyuculuk, estetik ve ailevi sorumluluk." },
        7: { name: "7 - Mistik Düşünür & Hakikat Arayıcısı", planet: "♆ Neptün", chakra: "Taç Çakra", theme: "Derin felsefe, analitik zeka, maneviyat ve yalnızlıkta parlayan ışık." },
        8: { name: "8 - Güç Sahibi & Finansal Lider", planet: "♄ Satürn", chakra: "Solar Pleksus", theme: "Maddi bolluk, organizasyonel güç, adalet ve büyük hedefleri yönetme." },
        9: { name: "9 - Evrensel Hümanist & Bilge Işık", planet: "♂️ Mars", chakra: "Taç / Tüm Çakralar", theme: "Merhamet, insanlığa hizmet, sanatsal ilham ve döngü tamamlama." },
        11: { name: "11 - Üstat Sezgisel Rehber (Master 11)", planet: "🌙 / ♅", chakra: "Üçüncü Göz / Taç", theme: "Kozmik ilham kanallığı, yüksek sezgiler ve insanlığın bilincini yükseltme." },
        22: { name: "22 - Büyük Usta Mimar (Master 22)", planet: "♄ / ♅", chakra: "Tüm Çakralar", theme: "Küresel hayalleri fiziksel dünyada devasa yapılara dönüştürme dehası." },
        33: { name: "33 - Evrensel Şifa Öğretmeni (Master 33)", planet: "♀️ / ♆", chakra: "Kalp / Taç", theme: "Koşulsuz evrensel sevgi, şifa dağıtma ve ruhsal fedakarlık zirvesi." }
    };

    const expInfo = numberArchetypes[expressionNum] || numberArchetypes[1];
    const soulInfo = numberArchetypes[soulUrgeNum] || numberArchetypes[1];
    const persInfo = numberArchetypes[personalityNum] || numberArchetypes[1];

    const heroHtml = `
        <div class="hc-num-hero-card">
            <div class="hc-num-badge">🔢 Ana İfade (Kader) Sayınız: ${expressionNum}</div>
            <div class="hc-num-title">${expInfo.name}</div>
            <p class="hc-num-sub">Kozmik Yönetici: <strong>${expInfo.planet}</strong> | Çakra Rezonansı: <strong>${expInfo.chakra}</strong></p>
        </div>
    `;

    const gridHtml = `
        <div class="hc-num-card-box">
            <div class="hc-num-card-tag">🌟 İfade / Kader Sayısı (${expressionNum})</div>
            <div class="hc-num-card-title">${expInfo.name}</div>
            <p class="hc-num-card-p"><strong>Dış Dünyadaki Misyonunuz:</strong> ${expInfo.theme}</p>
        </div>

        <div class="hc-num-card-box" style="border: 2px solid #ec4899; background: #fdf2f8;">
            <div class="hc-num-card-tag" style="color: #db2777;">💖 Ruh Güdüsü / Kalp Arzusu (${soulUrgeNum})</div>
            <div class="hc-num-card-title" style="color: #9d174d;">${soulInfo.name}</div>
            <p class="hc-num-card-p"><strong>İçsel En Derin Arzunuz:</strong> ${soulInfo.theme}</p>
        </div>

        <div class="hc-num-card-box" style="border: 2px solid #3b82f6; background: #eff6ff;">
            <div class="hc-num-card-tag" style="color: #2563eb;">🎭 Dış Kişilik / İlk İzlenim (${personalityNum})</div>
            <div class="hc-num-card-title" style="color: #1e40af;">${persInfo.name}</div>
            <p class="hc-num-card-p"><strong>İnsanların Sizi Algılayışı:</strong> ${persInfo.theme}</p>
        </div>
    `;

    let lettersHtml = `<div class="hc-letters-chips">`;
    letterBreakdown.forEach(item => {
        lettersHtml += `<span class="hc-letter-chip ${item.isVowel ? 'vowel' : 'consonant'}"><strong>${item.char}</strong><small>=${item.val}</small></span>`;
    });
    lettersHtml += `</div>`;

    if (karmicLessons.length > 0) {
        lettersHtml += `<div class="hc-karmic-box">
            <strong>⚠️ Karmik Ders Sayılarınız (İsimde Eksik Enerjiler):</strong> Sayı ${karmicLessons.join(', ')}. Bu sayılara karşılık gelen yaşam temalarını (örn: sabır, inisiyatif, diplomasi) bilinçli olarak geliştirmelisiniz.
        </div>`;
    } else {
        lettersHtml += `<div class="hc-karmic-box" style="background: #f0fdf4; border-color: #bbf7d0; color: #166534;">
            <strong>✨ Tam Çakra Dengesi:</strong> İsminiz 1'den 9'a kadar tüm rakamların frekansını içermektedir. Çok yönlü ve dengeli bir potansiyele sahipsiniz.
        </div>`;
    }

    const descHtml = `
        <p><strong>İsim Enerjinizin Yaşam Yansıması:</strong> ${rawName} ismi, Pisagor tablosuna göre toplamda <strong>${totalSum}</strong> sayısına (${expressionNum}) ulaşır. Bu frekans size hayatta ${expInfo.theme} şeklinde büyük bir güç bahşeder.</p>
        <p><strong>Ruhsal Denge Tavsiyesi:</strong> Kalbinizin fısıltısı olan <strong>Ruh Güdüsü (${soulUrgeNum})</strong> ile dış dünyadaki eylemleriniz olan <strong>İfade Sayınızı (${expressionNum})</strong> uyumlu hale getirdiğinizde hayatınızda maksimum doyum ve bereket sağlarsınız.</p>
    `;

    document.getElementById('hc-name-hero').innerHTML = heroHtml;
    document.getElementById('hc-name-grid').innerHTML = gridHtml;
    document.getElementById('hc-name-letters-table').innerHTML = lettersHtml;
    document.getElementById('hc-name-desc').innerHTML = descHtml;

    document.getElementById('hc-isim-num-result').classList.add('visible');
    document.getElementById('hc-isim-num-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}


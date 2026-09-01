function hcFullNumHesapla() {
    const rawName = document.getElementById('hc-full-name').value.trim();
    const dateStr = document.getElementById('hc-full-date').value;

    if (!rawName || !dateStr) {
        alert('Lütfen adınızı ve doğum tarihinizi giriniz.');
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

    const cleanChars = rawName.toLocaleUpperCase('tr-TR').replace(/[^A-ZÇĞİÖŞÜ]/g, '');
    let totalSum = 0;
    let vowelSum = 0;
    let consonantSum = 0;

    for (let char of cleanChars) {
        const val = pythagoreanMap[char] || 0;
        if (val > 0) {
            totalSum += val;
            if (vowels.has(char)) vowelSum += val;
            else consonantSum += val;
        }
    }

    const d = new Date(dateStr);
    const day = d.getDate();
    const month = d.getMonth() + 1;
    const year = d.getFullYear();

    // 1. Yaşam Yolu (Life Path)
    const lpDay = singleDigit(day);
    const lpMonth = singleDigit(month);
    const lpYear = singleDigit(year);
    const lifePathNum = reduceToSingleOrMaster(lpDay + lpMonth + lpYear);

    // 2. Kader / İfade Sayısı (Destiny/Expression)
    const destinyNum = reduceToSingleOrMaster(totalSum);

    // 3. Ruh Güdüsü (Soul Urge)
    const soulNum = reduceToSingleOrMaster(vowelSum);

    // 4. Kişilik Sayısı (Personality)
    const personalityNum = reduceToSingleOrMaster(consonantSum);

    // 5. Doğum Günü Sayısı (Day of Birth)
    const birthdayNum = reduceToSingleOrMaster(day);

    // 6. Olgunluk Sayısı (Maturity Number)
    const maturityNum = reduceToSingleOrMaster(lifePathNum + destinyNum);

    // 4 Yaşam Zirvesi (Pinnacles)
    const p1 = reduceToSingleOrMaster(lpMonth + lpDay);
    const p2 = reduceToSingleOrMaster(lpDay + lpYear);
    const p3 = reduceToSingleOrMaster(p1 + p2);
    const p4 = reduceToSingleOrMaster(lpMonth + lpYear);

    // Zirve Yaş Aralıkları
    const lpBase = singleDigit(lifePathNum);
    const ageP1End = 36 - lpBase;
    const ageP2End = ageP1End + 9;
    const ageP3End = ageP2End + 9;

    // 2026 Kişisel Yıl
    const personalYear2026 = reduceToSingleOrMaster(lpDay + lpMonth + singleDigit(2026));

    const numTitles = {
        1: "Öncü & Bağımsız Lider",
        2: "Sezgisel & Diplomatik Arabulucu",
        3: "Yaratıcı & İlham Verici Sanatçı",
        4: "Disiplinli & Güvenilir Sistem Kurucu",
        5: "Özgür & Çok Yönlü İletişimci",
        6: "Şefkatli & Sevgi Dolu Koruyucu",
        7: "Mistik & Analitik Hakikat Arayıcısı",
        8: "Güçlü & Vizyoner Finans Yöneticisi",
        9: "Evrensel Hümanist & Bilge Rehber",
        11: "Üstat Sezgisel Kanal (Master 11)",
        22: "Büyük Usta Mimar (Master 22)",
        33: "Evrensel Şifa Öğreticisi (Master 33)"
    };

    const heroHtml = `
        <div class="hc-num-hero-card">
            <div class="hc-num-badge">🌟 Yaşam Yolu Sayınız: ${lifePathNum} | 2026 Kişisel Yılınız: ${personalYear2026}</div>
            <div class="hc-num-title">${numTitles[lifePathNum] || 'Kozmik Yolcu'}</div>
            <p class="hc-num-sub">Kader Sayınız: <strong>${destinyNum}</strong> | Ruh Güdünüz: <strong>${soulNum}</strong> | Olgunluk Sayınız: <strong>${maturityNum}</strong></p>
        </div>
    `;

    const gridHtml = `
        <div class="hc-num-card-mini">
            <div class="hc-tag">🌱 Yaşam Yolu</div>
            <div class="hc-val">${lifePathNum}</div>
            <div class="hc-name">${numTitles[lifePathNum]}</div>
        </div>

        <div class="hc-num-card-mini">
            <div class="hc-tag">⚡ Kader / İfade</div>
            <div class="hc-val">${destinyNum}</div>
            <div class="hc-name">${numTitles[destinyNum]}</div>
        </div>

        <div class="hc-num-card-mini">
            <div class="hc-tag">💖 Ruh Güdüsü</div>
            <div class="hc-val">${soulNum}</div>
            <div class="hc-name">${numTitles[soulNum]}</div>
        </div>

        <div class="hc-num-card-mini">
            <div class="hc-tag">🎭 Dış Kişilik</div>
            <div class="hc-val">${personalityNum}</div>
            <div class="hc-name">${numTitles[personalityNum]}</div>
        </div>

        <div class="hc-num-card-mini">
            <div class="hc-tag">🎂 Doğum Günü</div>
            <div class="hc-val">${birthdayNum}</div>
            <div class="hc-name">Doğal Yetenek</div>
        </div>

        <div class="hc-num-card-mini">
            <div class="hc-tag">👑 Olgunluk (35+ Yaş)</div>
            <div class="hc-val">${maturityNum}</div>
            <div class="hc-name">${numTitles[maturityNum]}</div>
        </div>
    `;

    const pinnaclesHtml = `
        <div class="hc-pinnacle-box">
            <div class="hc-pin-tag">1. Zirve (Doğum - ${ageP1End} Yaş)</div>
            <div class="hc-pin-val">Zirve Sayısı: <strong>${p1}</strong></div>
            <p class="hc-pin-desc">Gençlik ve karakter oluşumu evresindeki ana kozmik tema.</p>
        </div>

        <div class="hc-pinnacle-box">
            <div class="hc-pin-tag">2. Zirve (${ageP1End + 1} - ${ageP2End} Yaş)</div>
            <div class="hc-pin-val">Zirve Sayısı: <strong>${p2}</strong></div>
            <p class="hc-pin-desc">Kariyer, ilişkiler ve sorumlulukların zirve yaptığı üretkenlik dönemi.</p>
        </div>

        <div class="hc-pinnacle-box">
            <div class="hc-pin-tag">3. Zirve (${ageP2End + 1} - ${ageP3End} Yaş)</div>
            <div class="hc-pin-val">Zirve Sayısı: <strong>${p3}</strong></div>
            <p class="hc-pin-desc">Olgunluk, ustalık ve toplumsal etki yaratma evresi.</p>
        </div>

        <div class="hc-pinnacle-box">
            <div class="hc-pin-tag">4. Zirve (${ageP3End + 1}+ Yaş ve Sonrası)</div>
            <div class="hc-pin-val">Zirve Sayısı: <strong>${p4}</strong></div>
            <p class="hc-pin-desc">Ruhsal doyum, bilgelik ve kalıcı bir miras bırakma dönemi.</p>
        </div>
    `;

    const descHtml = `
        <p><strong>Yaşam Yolu (${lifePathNum}) ile Kader Sayınızın (${destinyNum}) Sinerjisi:</strong> Doğum tarihinizden gelen <strong>${lifePathNum}</strong> sayısı bu hayatta yürüyeceğiniz ana otobanı belirlerken, adınızdan gelen <strong>${destinyNum}</strong> sayısı o yolda kullanacağınız aracın motor gücünü simgeler.</p>
        <p><strong>2026 Yılı Numerolojik Enerjiniz:</strong> 2026 yılı sizin için <strong>${personalYear2026}. Kişisel Yıl</strong> döngüsündedir. Bu yılın ana teması, geçmiş döngülerinizi değerlendirip yeni kapılar açmaktır.</p>
    `;

    document.getElementById('hc-fn-hero').innerHTML = heroHtml;
    document.getElementById('hc-fn-grid').innerHTML = gridHtml;
    document.getElementById('hc-fn-pinnacles').innerHTML = pinnaclesHtml;
    document.getElementById('hc-full-desc').innerHTML = descHtml;

    document.getElementById('hc-numeroloji-result').classList.add('visible');
    document.getElementById('hc-numeroloji-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}


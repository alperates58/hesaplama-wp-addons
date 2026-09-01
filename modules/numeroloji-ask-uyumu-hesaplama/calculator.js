function hcNumerologyLoveHesapla() {
    const b1 = document.getElementById('hc-nl-birth-1').value;
    const b2 = document.getElementById('hc-nl-birth-2').value;

    if (!b1 || !b2) {
        alert('Lütfen her iki partnerin de doğum tarihini giriniz.');
        return;
    }

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

    const lp1 = getLifePath(b1);
    const lp2 = getLifePath(b2);

    const numTitles = {
        1: "1 (Öncü Lider)",
        2: "2 (Duygusal Arabulucu)",
        3: "3 (Yaratıcı & Neşeli)",
        4: "4 (Güvenilir & Düzenli)",
        5: "5 (Özgür & Maceracı)",
        6: "6 (Şefkatli & Aileci)",
        7: "7 (Mistik & Derin)",
        8: "8 (Güçlü & Kararlı)",
        9: "9 (Hümanist & Şifacı)",
        11: "11 (Üstat Sezgisel)",
        22: "22 (Usta Mimar)",
        33: "33 (Evrensel Sevgi)"
    };

    // Authentic Life Path compatibility pairs
    const naturalPairs = {
        1: [1, 5, 7, 3],
        2: [2, 4, 8, 6],
        3: [3, 1, 5, 9, 6],
        4: [4, 2, 8, 6, 7],
        5: [5, 1, 3, 7, 9],
        6: [6, 2, 4, 3, 9],
        7: [7, 1, 5, 4],
        8: [8, 2, 4, 6],
        9: [9, 3, 6, 1, 5],
        11: [11, 2, 6, 7, 9],
        22: [22, 4, 8, 6],
        33: [33, 6, 9, 2]
    };

    const s1 = singleDigit(lp1);
    const s2 = singleDigit(lp2);

    let loveScore = 75;
    let passionScore = 78;
    let commScore = 80;
    let marriageScore = 76;

    if (s1 === s2) {
        loveScore = 96;
        passionScore = 90;
        commScore = 95;
        marriageScore = 94;
    } else if (naturalPairs[s1] && naturalPairs[s1].includes(s2)) {
        loveScore = 89;
        passionScore = 86;
        commScore = 88;
        marriageScore = 90;
    } else {
        loveScore = 68;
        passionScore = 72;
        commScore = 65;
        marriageScore = 70;
    }

    const heroHtml = `
        <div class="hc-num-hero-card">
            <div class="hc-num-badge">💘 Genel Aşk Uyumu: %${loveScore}</div>
            <div class="hc-num-title">${numTitles[lp1]} & ${numTitles[lp2]}</div>
            <p class="hc-num-sub">1. Partner Yaşam Yolu: <strong>${lp1}</strong> | 2. Partner Yaşam Yolu: <strong>${lp2}</strong></p>
        </div>
    `;

    const barsHtml = `
        <div class="hc-bar-row">
            <div class="hc-bar-label"><span>🔥 Tutku ve Çekim Gücü</span> <strong>%${passionScore}</strong></div>
            <div class="hc-bar-track"><div class="hc-bar-fill" style="width: ${passionScore}%; background: #f43f5e;"></div></div>
        </div>

        <div class="hc-bar-row">
            <div class="hc-bar-label"><span>💬 İletişim ve Zihinsel Uyum</span> <strong>%${commScore}</strong></div>
            <div class="hc-bar-track"><div class="hc-bar-fill" style="width: ${commScore}%; background: #3b82f6;"></div></div>
        </div>

        <div class="hc-bar-row">
            <div class="hc-bar-label"><span>💍 Uzun Vadeli Evlilik Potansiyeli</span> <strong>%${marriageScore}</strong></div>
            <div class="hc-bar-track"><div class="hc-bar-fill" style="width: ${marriageScore}%; background: #10b981;"></div></div>
        </div>
    `;

    const descHtml = `
        <p><strong>Yaşam Yolları Karşılaşması:</strong> 1. Partnerin <strong>${lp1}</strong> sayısı ile 2. Partnerin <strong>${lp2}</strong> sayısı bir araya geldiğinde ${loveScore >= 85 ? 'mükemmel bir ruhsal ahenk ve karşılıklı destek enerjisi' : 'birbirinize farklı bakış açıları kazandıran öğretici bir sinerji'} açığa çıkar.</p>
        <p><strong>İlişki Tavsiyesi:</strong> Birbirinizin temel numerolojik ihtiyaçlarına (örn: özgürlük, şefkat, takdir edilme veya güvenlik) saygı gösterdiğinizde bağınız her geçen gün daha da derinleşir.</p>
    `;

    document.getElementById('hc-nl-hero').innerHTML = heroHtml;
    document.getElementById('hc-nl-bars').innerHTML = barsHtml;
    document.getElementById('hc-res-nl-desc').innerHTML = descHtml;

    document.getElementById('hc-numeroloji-ask-uyumu-hesaplama-result').classList.add('visible');
    document.getElementById('hc-numeroloji-ask-uyumu-hesaplama-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}


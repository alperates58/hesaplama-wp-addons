function hcBurcUyumuHesapla() {
    const b1 = document.getElementById('hc-burc1').value;
    const b2 = document.getElementById('hc-burc2').value;

    const signs = ["Koç", "Boğa", "İkizler", "Yengeç", "Aslan", "Başak", "Terazi", "Akrep", "Yay", "Oğlak", "Kova", "Balık"];
    const elements = {
        "Koç": "Ateş", "Aslan": "Ateş", "Yay": "Ateş",
        "Boğa": "Toprak", "Başak": "Toprak", "Oğlak": "Toprak",
        "İkizler": "Hava", "Terazi": "Hava", "Kova": "Hava",
        "Yengeç": "Su", "Akrep": "Su", "Balık": "Su"
    };

    const modalities = {
        "Koç": "Öncü", "Yengeç": "Öncü", "Terazi": "Öncü", "Oğlak": "Öncü",
        "Boğa": "Sabit", "Aslan": "Sabit", "Akrep": "Sabit", "Kova": "Sabit",
        "İkizler": "Değişken", "Başak": "Değişken", "Yay": "Değişken", "Balık": "Değişken"
    };

    const i1 = signs.indexOf(b1);
    const i2 = signs.indexOf(b2);
    let distance = Math.abs(i1 - i2);
    if (distance > 6) distance = 12 - distance;

    const e1 = elements[b1];
    const e2 = elements[b2];
    const m1 = modalities[b1];
    const m2 = modalities[b2];

    let overallScore = 0;
    let sLove = 0, sTalk = 0, sPassion = 0, sMarriage = 0;
    let patternName = "";
    let desc = "";

    // Zodiac Aspects (distance: 0 to 6)
    if (distance === 0) {
        // 1-1 Aynı Burç (Kavuşum)
        patternName = "Aynı Burç (1-1 Eşleşmesi)";
        sLove = 88; sTalk = 85; sPassion = 80; sMarriage = 85;
        overallScore = 85;
        desc = `İkiniz de <strong>${b1}</strong> burcusunuz! Birbirinizin iç dünyasını, tepkilerini ve arzularını kelimelere gerek kalmadan hissedebilirsiniz. Karşınızda adeta bir ayna duruyor. Bu ilişki büyük bir anlayış ve doğal bir yakınlık getirir; ancak birbirinizin eksik ya da inatçı yönlerini pekiştirmemeye, birbirinize alan tanımaya özen göstermelisiniz.`;
    } else if (distance === 4) {
        // 1-5 Üçgen Açı (Aynı Element)
        patternName = `Aynı Element (${e1} - ${e1} Üçgeni)`;
        sLove = 96; sTalk = 92; sPassion = 90; sMarriage = 94;
        overallScore = 93;
        desc = `<strong>${b1} ve ${b2}</strong> zodyakın en kusursuz üçgen açısını (120°) paylaşır! Her ikiniz de <strong>${e1}</strong> elementinden beslendiğiniz için hayata aynı gözlüklerle bakarsınız. Birbirinize doğal bir ilham, yüksek sevgi ve sarsılmaz bir güven verirsiniz. Birlikteyken hayat çok daha akıcı, coşkulu ve huzurludur.`;
    } else if (distance === 2) {
        // 1-3 Sekstil Açı (Uyumlu Elementler: Ateş-Hava veya Toprak-Su)
        patternName = `Sekstil Uyum (${e1} - ${e2} Dansı)`;
        sLove = 92; sTalk = 95; sPassion = 88; sMarriage = 90;
        overallScore = 91;
        desc = `<strong>${b1} ve ${b2}</strong> arasındaki 60°'lik sekstil açı, zodyaktaki en tatlı dostluk ve aşk köprülerinden biridir. ${e1 === 'Ateş' || e1 === 'Hava' ? 'Hava ateşi körükler, ateş havaya ışıltı katar.' : 'Toprak suya yuva olur, su toprağı besler ve bereketlendirir.'} Birbirinizi sıkmadan büyütür, hem harika birer sırdaş hem de tutkulu birer aşık olursunuz.`;
    } else if (distance === 6) {
        // 1-7 Karşıt Burçlar (Polarite)
        patternName = `Zıt Kutupların Çekimi (${b1} - ${b2})`;
        sLove = 85; sTalk = 80; sPassion = 98; sMarriage = 86;
        overallScore = 87;
        desc = `<strong>${b1} ve ${b2}</strong> zodyak çemberinde tam karşı karşıyadır (180°). Zıt kutupların birbirini delice çekmesi gibi aranızda muazzam bir manyetik çekim ve tutku vardır. Sizde olmayan onda, onda olmayan sizdedir. Birbirinizi tamamlamayı seçerseniz ömür boyu sürecek efsanevi bir birliktelik doğar.`;
    } else if (distance === 3) {
        // 1-4 Kare Açı (Dinamik Gerilim & Tutku)
        patternName = `Kare Açı (${m1} Nitelik Çatışması)`;
        sLove = 70; sTalk = 68; sPassion = 88; sMarriage = 72;
        overallScore = 74;
        desc = `<strong>${b1} ve ${b2}</strong> birbirine 90° kare açı yapar. İkiniz de <strong>${m1}</strong> nitelikte olduğunuz için zaman zaman liderlik veya yöntem konusunda inatlaşabilirsiniz. Ancak bu gerilim inanılmaz bir tutku ve gelişim ateşi yakar. Birbirinizi değiştirmeye çalışmak yerine farklılıklarınıza saygı duyduğunuzda, ilişki devasa bir güce dönüşür.`;
    } else if (distance === 5) {
        // 1-6 / 1-8 Birleşmeyen (Quincunx - Karmik Büyüme)
        patternName = "Karmik Uyum & Dönüşüm (150°)";
        sLove = 72; sTalk = 70; sPassion = 80; sMarriage = 75;
        overallScore = 74;
        desc = `<strong>${b1} ve ${b2}</strong> element ve nitelik olarak tamamen farklı dünyalara aittir. Bu ilişki size hayatta hiç bilmediğiniz yönlerinizi keşfetme fırsatı sunar. Başlangıçta birbirinizin tarzına alışmak emek istese de, sabır ve empatiyle zodyakın en derin ve dönüştürücü ruhsal bağlarından biri kurulabilir.`;
    } else {
        // 1-2 Komşu Burçlar (Semi-sextile 30°)
        patternName = "Komşu Burçlar (Adım Adım Uyum)";
        sLove = 75; sTalk = 76; sPassion = 78; sMarriage = 76;
        overallScore = 76;
        desc = `<strong>${b1} ve ${b2}</strong> zodyakta yan yana duran komşu burçlardır. Birbirinizin hayat tecrübesine bir sonraki aşamadan bakarsınız. Birbirinizden öğreneceğiniz çok şey vardır; açık iletişim ve ortak hobiler ilişkinizi her geçen gün daha sağlam temellere oturtacaktır.`;
    }

    const heroHtml = `
        <div class="hc-bu-hero-card">
            <div class="hc-bu-hero-badge">${patternName}</div>
            <div class="hc-bu-hero-title">%${overallScore} Genel Uyum Skoru</div>
            <p class="hc-bu-hero-sub">${b1} (${e1} / ${m1}) ⇄ ${b2} (${e2} / ${m2})</p>
        </div>
    `;

    const dimHtml = `
        <div class="hc-bu-dim-card">
            <div class="hc-bu-dim-head"><span>❤️ Aşk & Romantizm</span><span>%${sLove}</span></div>
            <div class="hc-bu-dim-bar"><div class="hc-bu-dim-fill" style="width: ${sLove}%; background: #ec4899;"></div></div>
        </div>
        <div class="hc-bu-dim-card">
            <div class="hc-bu-dim-head"><span>🗣️ İletişim & Anlayış</span><span>%${sTalk}</span></div>
            <div class="hc-bu-dim-bar"><div class="hc-bu-dim-fill" style="width: ${sTalk}%; background: #0ea5e9;"></div></div>
        </div>
        <div class="hc-bu-dim-card">
            <div class="hc-bu-dim-head"><span>🔥 Cinsel Çekim & Tutku</span><span>%${sPassion}</span></div>
            <div class="hc-bu-dim-bar"><div class="hc-bu-dim-fill" style="width: ${sPassion}%; background: #ef4444;"></div></div>
        </div>
        <div class="hc-bu-dim-card">
            <div class="hc-bu-dim-head"><span>💍 Evlilik & Uzun Vade</span><span>%${sMarriage}</span></div>
            <div class="hc-bu-dim-bar"><div class="hc-bu-dim-fill" style="width: ${sMarriage}%; background: #8b5cf6;"></div></div>
        </div>
    `;

    document.getElementById('hc-bu-hero').innerHTML = heroHtml;
    document.getElementById('hc-bu-dim-grid').innerHTML = dimHtml;
    document.getElementById('hc-uyum-desc').innerHTML = desc;

    document.getElementById('hc-burc-uyumu-result').classList.add('visible');
    document.getElementById('hc-burc-uyumu-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}


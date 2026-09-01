function hcEuGetSignFromDate(dStr) {
    if (!dStr) return null;
    const parts = dStr.split('-').map(Number);
    const m = parts[1], d = parts[2];
    if ((m === 3 && d >= 21) || (m === 4 && d <= 19)) return "Koç";
    if ((m === 4 && d >= 20) || (m === 5 && d <= 20)) return "Boğa";
    if ((m === 5 && d >= 21) || (m === 6 && d <= 20)) return "İkizler";
    if ((m === 6 && d >= 21) || (m === 7 && d <= 22)) return "Yengeç";
    if ((m === 7 && d >= 23) || (m === 8 && d <= 22)) return "Aslan";
    if ((m === 8 && d >= 23) || (m === 9 && d <= 22)) return "Başak";
    if ((m === 9 && d >= 23) || (m === 10 && d <= 22)) return "Terazi";
    if ((m === 10 && d >= 23) || (m === 11 && d <= 21)) return "Akrep";
    if ((m === 11 && d >= 22) || (m === 12 && d <= 21)) return "Yay";
    if ((m === 12 && d >= 22) || (m === 1 && d <= 19)) return "Oğlak";
    if ((m === 1 && d >= 20) || (m === 2 && d <= 18)) return "Kova";
    return "Balık";
}

function hcEuUpdateSign(personNum) {
    const dVal = document.getElementById('hc-eu-d' + personNum).value;
    const sign = hcEuGetSignFromDate(dVal);
    if (sign) {
        document.getElementById('hc-eu-sign' + personNum).value = sign;
    }
}

function hcEvlilikUyumHesapla() {
    const b1 = document.getElementById('hc-eu-sign1').value;
    const b2 = document.getElementById('hc-eu-sign2').value;

    const signs = ["Koç", "Boğa", "İkizler", "Yengeç", "Aslan", "Başak", "Terazi", "Akrep", "Yay", "Oğlak", "Kova", "Balık"];
    const elements = {
        "Koç": "Ateş", "Aslan": "Ateş", "Yay": "Ateş",
        "Boğa": "Toprak", "Başak": "Toprak", "Oğlak": "Toprak",
        "İkizler": "Hava", "Terazi": "Hava", "Kova": "Hava",
        "Yengeç": "Su", "Akrep": "Su", "Balık": "Su"
    };

    const i1 = signs.indexOf(b1);
    const i2 = signs.indexOf(b2);
    let distance = Math.abs(i1 - i2);
    if (distance > 6) distance = 12 - distance;

    const e1 = elements[b1];
    const e2 = elements[b2];

    let overallScore = 0;
    let sHome = 0, sTrust = 0, sConflict = 0, sFinance = 0;
    let marriageTitle = "";
    let desc = "";

    if (distance === 0) {
        marriageTitle = `Aynı Burç Evliliği (${b1} & ${b1})`;
        sHome = 92; sTrust = 95; sConflict = 82; sFinance = 90;
        overallScore = 90;
        desc = `İkiniz de <strong>${b1}</strong> burcusunuz! Yaşam alışkanlıklarınız, evdeki beklentileriniz ve dünya görüşünüz tamamen örtüşür. Birbirinizin duygusal iniş çıkışlarını anında anlar ve empati gösterirsiniz. Evlilikte 'ben' yerine 'biz' olmayı başardığınızda, ömür boyu birbirinizin en büyük sırdaşı ve güvencesi olursunuz.`;
    } else if (distance === 4) {
        marriageTitle = `Kusursuz Üçgen Rezonansı (${e1} - ${e1} Evliliği)`;
        sHome = 96; sTrust = 95; sConflict = 94; sFinance = 95;
        overallScore = 95;
        desc = `Aynı element grubunda (<strong>${e1}</strong>) yer alan burçlarsınız. Evliliğinizde doğal bir akış, huzur ve koşulsuz anlayış hakimdir. Birbirinizi değiştirmeye çalışmadan, olduğunuz gibi seversiniz. Eviniz herkesin gıptayla baktığı, sıcak ve bereketli bir yuvaya dönüşür.`;
    } else if (distance === 6) {
        marriageTitle = "7. Ev Evlilik Aksı (Tamamlayıcı Karşıt Burçlar)";
        sHome = 88; sTrust = 92; sConflict = 85; sFinance = 92;
        overallScore = 91;
        desc = `Zodyakta birbirinizin tam karşısında (7. İlişki ve Evlilik Evinizde) yer alıyorsunuz (<strong>${b1}</strong> ⇄ <strong>${b2}</strong>). Astrolojide en güçlü evlilik yerleşimlerinden biridir. Birbirinizin eksik yanlarını adeta bir yapboz gibi tamamlarsınız. Karşılıklı saygı ve sevgiyle sarsılmaz bir birliktelik kurarsınız.`;
    } else if (distance === 2) {
        marriageTitle = `Sekstil Uyum (${e1} - ${e2} Birlikteliği)`;
        sHome = 92; sTrust = 90; sConflict = 94; sFinance = 90;
        overallScore = 92;
        desc = `Burçlarınız arasında uyumlu bir sekstil bağ var. Evlilikte iletişiminiz çok güçlüdür; karşılaştığınız her türlü krizi konuşarak, ortak akılla ve sakinlikle çözersiniz. Birbirinizin hem eşi hem de en yakın hayat arkadaşısınız.`;
    } else if (distance === 3) {
        marriageTitle = "Kare Açı (Dinamik ve Geliştirici Evlilik)";
        sHome = 76; sTrust = 78; sConflict = 70; sFinance = 78;
        overallScore = 76;
        desc = `Burçlarınız arasında 90° kare açı bulunuyor. Yaşam tarzlarınız veya kararları uygulama hızınız farklı olabilir. Bu durum evliliğe yüksek bir heyecan ve dinamizm katar. Birbirinizin sınırlarına saygı gösterip sabırla dinlediğinizde çok köklü bir olgunluk kazanırsınız.`;
    } else {
        marriageTitle = "Farklı Elementler & Zengin Aile Temeli";
        sHome = 78; sTrust = 80; sConflict = 76; sFinance = 78;
        overallScore = 78;
        desc = `Farklı elementlere sahipsiniz. Evlilikte görev dağılımını iyi yapmak ve birbirinizin güçlü yönlerinden faydalanmak yuvayı çok dengeli ve sağlam kılacaktır.`;
    }

    const heroHtml = `
        <div class="hc-ev-hero-card">
            <div class="hc-ev-hero-badge">${marriageTitle}</div>
            <div class="hc-ev-hero-title">%${overallScore} Evlilik ve Yuva Uyumu</div>
            <p class="hc-ev-hero-sub">1. Kişi: <strong>${b1}</strong> (${e1}) ⇄ 2. Kişi: <strong>${b2}</strong> (${e2})</p>
        </div>
    `;

    const dimHtml = `
        <div class="hc-ev-dim-card">
            <div class="hc-ev-dim-head"><span>🏡 Yaşam Tarzı & Yuva Huzuru</span><span>%${sHome}</span></div>
            <div class="hc-ev-dim-bar"><div class="hc-ev-dim-fill" style="width: ${sHome}%; background: #10b981;"></div></div>
        </div>
        <div class="hc-ev-dim-card">
            <div class="hc-ev-dim-head"><span>💍 Sadakat, Sevgi & Derin Güven</span><span>%${sTrust}</span></div>
            <div class="hc-ev-dim-bar"><div class="hc-ev-dim-fill" style="width: ${sTrust}%; background: #ec4899;"></div></div>
        </div>
        <div class="hc-ev-dim-card">
            <div class="hc-ev-dim-head"><span>🗣️ İletişim & Kriz Yönetimi</span><span>%${sConflict}</span></div>
            <div class="hc-ev-dim-bar"><div class="hc-ev-dim-fill" style="width: ${sConflict}%; background: #0ea5e9;"></div></div>
        </div>
        <div class="hc-ev-dim-card">
            <div class="hc-ev-dim-head"><span>💰 Ortak Vizyon & Finansal Uyum</span><span>%${sFinance}</span></div>
            <div class="hc-ev-dim-bar"><div class="hc-ev-dim-fill" style="width: ${sFinance}%; background: #f59e0b;"></div></div>
        </div>
    `;

    document.getElementById('hc-ev-hero').innerHTML = heroHtml;
    document.getElementById('hc-ev-dim-grid').innerHTML = dimHtml;
    document.getElementById('hc-eu-desc').innerHTML = desc;

    document.getElementById('hc-eu-result').classList.add('visible');
    document.getElementById('hc-eu-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}


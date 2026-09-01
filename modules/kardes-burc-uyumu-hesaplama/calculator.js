function hcKardesUyumHesapla() {
    const b1 = document.getElementById('hc-ku-sign1').value;
    const b2 = document.getElementById('hc-ku-sign2').value;

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
    let sPlay = 0, sSupport = 0, sRivalry = 0, sFriend = 0;
    let patternTitle = "";
    let desc = "";

    if (distance === 0) {
        patternTitle = `Aynı Burç Kardeşliği (${b1} & ${b1} Aynası)`;
        sPlay = 95; sSupport = 92; sRivalry = 85; sFriend = 96;
        overallScore = 94;
        desc = `İki kardeş de <strong>${b1}</strong> burcunda! Aynı mizaç ve tepkilere sahip oldukları için oyun kurarken ve sır paylaşırken birbirlerini adeta tek bir bakışla anlarlar. Birlikte büyürken aynı zevkleri paylaşırlar. Ebeveynlerin dikkat etmesi gereken tek konu, oyuncak ve ilgi paylaşımında adaleti hissettirmektir. Ömür boyu birbirlerinin en büyük sırdaşı ve koruyucusu olurlar.`;
    } else if (distance === 4) {
        patternTitle = `Üçgen Açı (${e1} - ${e1} Rezonansı - Doğal Müttefikler)`;
        sPlay = 96; sSupport = 95; sRivalry = 92; sFriend = 96;
        overallScore = 95;
        desc = `Kardeşler aynı element grubunda (<strong>${e1}</strong>) yer alıyor. Enerjileri birbirini mükemmel tamamlar. Aralarında neredeyse hiç kıskançlık yaşanmaz; biri düşse diğeri hemen elinden tutar. Birlikte oynadıkları oyunlar ve giriştikleri projeler her zaman çok neşeli ve uyumludur.`;
    } else if (distance === 2) {
        patternTitle = `Sekstil Uyum (${e1} - ${e2} Dansı - Eğlenceli Takım)`;
        sPlay = 94; sSupport = 90; sRivalry = 90; sFriend = 93;
        overallScore = 92;
        desc = `Kardeşlerin burçları arasında tatlı bir 60° sekstil bağ var. Biri harika fikirler üretirken diğeri o fikirleri hayata geçirebilir. Birlikteyken evin neşesi katlanır; eğlenceli ve destekleyici bir takım oluştururlar.`;
    } else if (distance === 6) {
        patternTitle = "Karşıt Burçlar (Zıt Kutupların Kardeşliği)";
        sPlay = 85; sSupport = 88; sRivalry = 78; sFriend = 88;
        overallScore = 86;
        desc = `Kardeşler zodyakta tam karşı karşıyadır (<strong>${b1}</strong> ve <strong>${b2}</strong>). Biri çok dışa dönükken diğeri sakin olabilir. Küçükken zıtlaşsalar da büyüdükçe birbirlerinin eksik yanlarını tamamlayan ayrılmaz bir ikiliye dönüşürler.`;
    } else if (distance === 3) {
        patternTitle = "Kare Açı (Dinamik ve Rekabetçi Kardeşlik)";
        sPlay = 82; sSupport = 80; sRivalry = 70; sFriend = 82;
        overallScore = 79;
        desc = `Kardeşler arasında 90° kare açı bulunuyor. Mizaçları ve ilgi alanları oldukça farklıdır. Bu durum ev içinde zaman zaman sevimli rekabetlere ve inatlaşmalara yol açabilir. Ebeveynlerin her birinin özgün yeteneklerini ayrı ayrı takdir etmesi bağı çok güçlendirir.`;
    } else {
        patternTitle = "Farklı Elementler & Zenginleştirici Kardeşlik Bağı";
        sPlay = 80; sSupport = 82; sRivalry = 78; sFriend = 80;
        overallScore = 80;
        desc = `Kardeşler farklı elementlere sahiptir. Birbirlerine bambaşka bakış açıları kazandırır ve hayatı çok yönlü öğrenmelerine yardımcı olurlar.`;
    }

    const heroHtml = `
        <div class="hc-kar-hero-card">
            <div class="hc-kar-hero-badge">${patternTitle}</div>
            <div class="hc-kar-hero-title">%${overallScore} Kardeşlik Bağı Skoru</div>
            <p class="hc-kar-hero-sub">1. Kardeş: <strong>${b1}</strong> (${e1}) ⇄ 2. Kardeş: <strong>${b2}</strong> (${e2})</p>
        </div>
    `;

    const dimHtml = `
        <div class="hc-kar-dim-card">
            <div class="hc-kar-dim-head"><span>🎮 Oyun, İletişim & Eğlence</span><span>%${sPlay}</span></div>
            <div class="hc-kar-dim-bar"><div class="hc-kar-dim-fill" style="width: ${sPlay}%; background: #0ea5e9;"></div></div>
        </div>
        <div class="hc-kar-dim-card">
            <div class="hc-kar-dim-head"><span>🛡️ Aile İçi Dayanışma & Destek</span><span>%${sSupport}</span></div>
            <div class="hc-kar-dim-bar"><div class="hc-kar-dim-fill" style="width: ${sSupport}%; background: #10b981;"></div></div>
        </div>
        <div class="hc-kar-dim-card">
            <div class="hc-kar-dim-head"><span>⚖️ Paylaşım & Rekabet Yönetimi</span><span>%${sRivalry}</span></div>
            <div class="hc-kar-dim-bar"><div class="hc-kar-dim-fill" style="width: ${sRivalry}%; background: #f59e0b;"></div></div>
        </div>
        <div class="hc-kar-dim-card">
            <div class="hc-kar-dim-head"><span>🤝 Ömürlük Dostluk & Sadakat</span><span>%${sFriend}</span></div>
            <div class="hc-kar-dim-bar"><div class="hc-kar-dim-fill" style="width: ${sFriend}%; background: #8b5cf6;"></div></div>
        </div>
    `;

    document.getElementById('hc-kar-hero').innerHTML = heroHtml;
    document.getElementById('hc-kar-dim-grid').innerHTML = dimHtml;
    document.getElementById('hc-ku-desc').innerHTML = desc;

    document.getElementById('hc-ku-result').classList.add('visible');
    document.getElementById('hc-ku-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}


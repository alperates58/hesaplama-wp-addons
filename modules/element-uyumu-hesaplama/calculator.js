function hcElementUyumuHesapla() {
    const raw1 = document.getElementById('hc-elem-sel1').value.split(':');
    const raw2 = document.getElementById('hc-elem-sel2').value.split(':');

    const e1 = raw1[0], sign1 = raw1[1];
    const e2 = raw2[0], sign2 = raw2[1];

    let skor = 0;
    let sPassion = 0, sSecurity = 0, sMental = 0, sEmotional = 0;
    let pairTitle = "";
    let desc = "";

    if (e1 === e2) {
        skor = 90;
        if (e1 === "Ateş") {
            pairTitle = "Ateş + Ateş: Çifte Alev ve Saf Tutku";
            sPassion = 99; sSecurity = 75; sMental = 88; sEmotional = 82;
            desc = `İkiniz de <strong>Ateş</strong> elementisiniz. Birbirinizin hızını, cesaretini ve yaşam coşkusunu anında anlarsınız. İlişkinizde heyecan, macera ve tutku hiç bitmez. Ancak iki ateşin birleşimi zaman zaman ego savaşlarına ve anlık öfke patlamalarına yol açabilir. Birbirinizi yönetmeye çalışmak yerine ortak maceralara koştuğunuzda harika bir ikili olursunuz.`;
        } else if (e1 === "Toprak") {
            pairTitle = "Toprak + Toprak: Sarsılmaz Kaya ve Ömürlük Güven";
            sPassion = 78; sSecurity = 99; sMental = 85; sEmotional = 90;
            desc = `İkiniz de <strong>Toprak</strong> elementisiniz. Düzen, sadakat, maddi istikrar ve gelecek planlarınız kusursuz bir uyum içindedir. Karşılıklı verdiğiniz sözler sarsılmazdır. Ancak ilişkinin monotonlaşmaması için zaman zaman rutinin dışına çıkmalı ve hayatın spontane sürprizlerine yer açmalısınız.`;
        } else if (e1 === "Hava") {
            pairTitle = "Hava + Hava: Sonsuz Zihinsel Akış ve Özgürlük";
            sPassion = 82; sSecurity = 78; sMental = 99; sEmotional = 80;
            desc = `İkiniz de <strong>Hava</strong> elementisiniz. Saatlerce süren entelektüel sohbetler, ortak espriler ve sosyal etkinlikler ilişkinizin omurgasıdır. Birbirinizi asla kısıtlamaz, tam bir özgürlük ve saygı alanı tanırsınız.`;
        } else {
            pairTitle = "Su + Su: Sonsuz Okyanus ve Telepatik Bağ";
            sPassion = 88; sSecurity = 85; sMental = 80; sEmotional = 99;
            desc = `İkiniz de <strong>Su</strong> elementisiniz. Kelimelere ihtiyaç duymadan, bakışlarla ve hislerle anlaşırsınız. Derin empati, şefkat ve koşulsuz sevgiyle birbirinizin ruhunu sararsınız. Duygusal dalgalanmalarda birbirinizi aşağı çekmemek için aralarda mantıklı ve sakin kalmaya özen göstermelisiniz.`;
        }
    } else if ((e1 === "Ateş" && e2 === "Hava") || (e1 === "Hava" && e2 === "Ateş")) {
        skor = 95;
        pairTitle = "Ateş + Hava: Parlak Kıvılcım ve İlham Veren Dans";
        sPassion = 95; sSecurity = 82; sMental = 96; sEmotional = 85;
        desc = `<strong>Ateş ve Hava</strong> kombinasyonu, zodyağın en canlı ve ilham dolu etkileşimidir. Hava zihinsel fikirler ve vizyon üretir, Ateş ise bu fikirlere tutku ve yaşam enerjisi katar. Birbirinizi sürekli cesaretlendirir ve hayatı bir macera gibi yaşarsınız. Asla sıkılmayacağınız, sürekli parlayan bir bağınız vardır.`;
    } else if ((e1 === "Toprak" && e2 === "Su") || (e1 === "Su" && e2 === "Toprak")) {
        skor = 94;
        pairTitle = "Toprak + Su: Verimli Toprak ve Hayat Veren Nehir";
        sPassion = 86; sSecurity = 96; sMental = 85; sEmotional = 96;
        desc = `<strong>Toprak ve Su</strong> birleşimi, bereketin ve sonsuz bağlılığın simgesidir. Su toprağı besler ve canlandırır; Toprak ise suya sağlam bir yatak ve güvenli bir yön sunar. Duygusal derinlik ile pratik yaşam becerileri mükemmel harmanlanır. Birlikte huzurlu bir yuva ve kalıcı bir gelecek inşa edersiniz.`;
    } else if ((e1 === "Ateş" && e2 === "Toprak") || (e1 === "Toprak" && e2 === "Ateş")) {
        skor = 78;
        pairTitle = "Ateş + Toprak: Volkanik Isı ve Şekil Alan Maden";
        sPassion = 85; sSecurity = 80; sMental = 75; sEmotional = 74;
        desc = `<strong>Ateş ve Toprak</strong> buluşması, tutku ile disiplinin birleşmesidir. Ateş'in vizyonu ve Toprak'ın somutlaştırma gücü bir araya geldiğinde dünyada büyük başarılar elde edebilirsiniz. Ancak Ateş çok sabırsız, Toprak ise çok temkinli olabilir. Birbirinizin hızına saygı gösterdiğinizde çok güçlü bir ortaklık doğar.`;
    } else if ((e1 === "Hava" && e2 === "Su") || (e1 === "Su" && e2 === "Hava")) {
        skor = 75;
        pairTitle = "Hava + Su: Yağmur Bulutları ve Derin Dalgalar";
        sPassion = 76; sSecurity = 74; sMental = 85; sEmotional = 82;
        desc = `<strong>Hava ve Su</strong> kombinasyonu, akıl ile sezgilerin diyaloğudur. Hava olayları mantıkla analiz etmek isterken, Su kalbiyle hisseder. Hava duyguları kelimelere dökmeyi öğretir, Su ise hayata derinlik katar. Birbirinizin dilini öğrendiğinizde olağanüstü zengin bir bağ oluşur.`;
    } else {
        skor = 68;
        pairTitle = (e1 === "Ateş" || e2 === "Ateş") ? "Ateş + Su: Buharlaşan Tutku ve Zıt Kutuplar" : "Hava + Toprak: Fırtına ve Dağlar";
        sPassion = 82; sSecurity = 68; sMental = 74; sEmotional = 70;
        desc = `Bu element kombinasyonu zıt kutupların manyetik çekimini taşır. Birbirinizde olmayan taraflar ilk başta büyüleyici bir merak uyandırır. Dengeyi korumak karşılıklı anlayış ve hoşgörü gerektirir; bunu başardığınızda birbirinizin en büyük öğretmeni ve tamamlayıcısı olursunuz.`;
    }

    const heroHtml = `
        <div class="hc-elem-hero-card">
            <div class="hc-elem-hero-badge">${pairTitle}</div>
            <div class="hc-elem-hero-title">%${skor} Doğal Enerji Uyumu</div>
            <p class="hc-elem-hero-sub">1. Kişi: <strong>${sign1}</strong> (${e1}) ⇄ 2. Kişi: <strong>${sign2}</strong> (${e2})</p>
        </div>
    `;

    const dimHtml = `
        <div class="hc-elem-dim-card">
            <div class="hc-elem-dim-head"><span>🔥 Tutku, Çekim & Coşku</span><span>%${sPassion}</span></div>
            <div class="hc-elem-dim-bar"><div class="hc-elem-dim-fill" style="width: ${sPassion}%; background: #ef4444;"></div></div>
        </div>
        <div class="hc-elem-dim-card">
            <div class="hc-elem-dim-head"><span>🌱 Güvenlik, Sadakat & İstikrar</span><span>%${sSecurity}</span></div>
            <div class="hc-elem-dim-bar"><div class="hc-elem-dim-fill" style="width: ${sSecurity}%; background: #10b981;"></div></div>
        </div>
        <div class="hc-elem-dim-card">
            <div class="hc-elem-dim-head"><span>💨 Zihinsel Akış & İletişim</span><span>%${sMental}</span></div>
            <div class="hc-elem-dim-bar"><div class="hc-elem-dim-fill" style="width: ${sMental}%; background: #0ea5e9;"></div></div>
        </div>
        <div class="hc-elem-dim-card">
            <div class="hc-elem-dim-head"><span>💧 Duygusal Beslenme & Şefkat</span><span>%${sEmotional}</span></div>
            <div class="hc-elem-dim-bar"><div class="hc-elem-dim-fill" style="width: ${sEmotional}%; background: #8b5cf6;"></div></div>
        </div>
    `;

    document.getElementById('hc-elem-hero').innerHTML = heroHtml;
    document.getElementById('hc-elem-dim-grid').innerHTML = dimHtml;
    document.getElementById('hc-elem-desc').innerHTML = desc;

    document.getElementById('hc-element-uyumu-result').classList.add('visible');
    document.getElementById('hc-element-uyumu-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}


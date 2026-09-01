function hcYukselenUyumHesapla() {
    const b1 = document.getElementById('hc-yu-sign1').value;
    const b2 = document.getElementById('hc-yu-sign2').value;

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
    let sMagnetism = 0, sSocial = 0, sEnergy = 0, sComfort = 0;
    let patternName = "";
    let desc = "";

    if (distance === 0) {
        patternName = "Güneş - Yükselen Kavuşumu (1. Ev Teması)";
        sMagnetism = 98; sSocial = 95; sEnergy = 92; sComfort = 95;
        overallScore = 95;
        desc = `Sizin Güneşiniz ile partnerinizin Yükseleni aynı burçta (<strong>${b1}</strong>)! Partnerinizin dış dünyaya yansıttığı enerji, sizin en temel benliğinizdir. İlk karşılaştığınız andan itibaren muazzam bir tanıdıklık, fiziksel çekim ve hayranlık hissedersiniz. Partneriniz sizin özünüzü çok parlak gösterir, siz de partnerinize özgüven katarsınız.`;
    } else if (distance === 4) {
        patternName = `Üçgen Açı (${e1} - ${e1} Rezonansı - 5/9. Evler)`;
        sMagnetism = 94; sSocial = 92; sEnergy = 95; sComfort = 93;
        overallScore = 93;
        desc = `Sizin Güneşiniz ile partnerinizin Yükseleni aynı elementte (<strong>${e1}</strong>) üçgen açı oluşturuyor. Partnerinizin beden dili, konuşma tarzı ve aurası size çok çekici ve doğal gelir. Birlikteyken çok neşeli, özgüvenli ve karizmatik bir çift oluşturursunuz. Sosyal ortamlarda gözler daima üzerinizde olur.`;
    } else if (distance === 6) {
        patternName = "Güneş - Alçalan / Yükselen Karşıtlığı (7. Ev Evlilik Aksı)";
        sMagnetism = 99; sSocial = 88; sEnergy = 90; sComfort = 88;
        overallScore = 91;
        desc = `Sizin Güneşiniz (<strong>${b1}</strong>), partnerinizin Yükseleninin tam karşısında (<strong>${b2}</strong>), yani 7. İlişki ve Evlilik Evinde parlıyor! Bu, astrolojideki en güçlü 'Ruh Eşi / Diğer Yarım' yerleşimlerinden biridir. İlk andan itibaren adeta birbirinize kilitlenirsiniz. Partneriniz sizi aradığı hayat arkadaşı olarak görür.`;
    } else if (distance === 2) {
        patternName = `Sekstil Uyum (${e1} - ${e2} Dansı - 3/11. Evler)`;
        sMagnetism = 88; sSocial = 96; sEnergy = 88; sComfort = 90;
        overallScore = 90;
        desc = `Güneşiniz ile partnerinizin Yükseleni arasında tatlı ve akıcı bir sekstil bağ var. Birlikteyken kendinizi çok rahat ifade eder, arkadaş grubunda veya topluluk önünde çok uyumlu bir imaj çizersiniz. Partneriniz sizin hedeflerinize destek olurken, siz de partnerinizin toplumdaki ışığını artırırsınız.`;
    } else if (distance === 3) {
        patternName = "Kare Açı (4/10. Köşe Evler - Tutkulu Çekim)";
        sMagnetism = 85; sSocial = 72; sEnergy = 85; sComfort = 70;
        overallScore = 78;
        desc = `Güneş ve Yükselen arasında 90° kare açı bulunuyor. Partnerinizin dışarıya sergilediği ilk imaj veya tepkileri bazen sizin öz tarzınızla zıtlaşabilir. Ancak bu durum ilişkinin başından itibaren yüksek bir merak, rekabet ve çekim yaratır. Birbirinizi tanıdıkça bu enerji yüksek bir motivasyon kaynağına dönüşür.`;
    } else if (distance === 5) {
        patternName = "Quincunx Açısı (6/8. Evler - Gizemli Çekim)";
        sMagnetism = 78; sSocial = 72; sEnergy = 76; sComfort = 74;
        overallScore = 75;
        desc = `Güneşiniz partnerinizin Yükselenine 150° açı yapıyor. Birbirinizin alışkanlıklarını ve dışa dönük davranışlarını anlamak için biraz zaman gerekebilir. Ancak bu farklılık ilişkinin heyecanını sürekli taze tutar; partneriniz size bambaşka dünyaların kapısını aralar.`;
    } else {
        patternName = "Komşu Burçlar (2/12. Ev Aksı)";
        sMagnetism = 76; sSocial = 78; sEnergy = 75; sComfort = 77;
        overallScore = 76;
        desc = `Güneş ve Yükselen komşu burçlardadır. Partneriniz dış dünyada sizin bir adım önünüzde veya arkanızda duran deneyimleri temsil eder. Birbirinizin sınırlarına saygı gösterdiğinizde çok dengeli ve sakin bir sosyal uyum yakalayabilirsiniz.`;
    }

    const heroHtml = `
        <div class="hc-yu-hero-card">
            <div class="hc-yu-hero-badge">${patternName}</div>
            <div class="hc-yu-hero-title">%${overallScore} Cazibe ve İmaj Skoru</div>
            <p class="hc-yu-hero-sub">Sizin Güneşiniz: <strong>${b1}</strong> (${e1}) ⇄ Partnerinizin Yükseleni: <strong>${b2}</strong> (${e2})</p>
        </div>
    `;

    const dimHtml = `
        <div class="hc-yu-dim-card">
            <div class="hc-yu-dim-head"><span>⚡ İlk Görüşte Çekim & Manyetizma</span><span>%${sMagnetism}</span></div>
            <div class="hc-yu-dim-bar"><div class="hc-yu-dim-fill" style="width: ${sMagnetism}%; background: #ec4899;"></div></div>
        </div>
        <div class="hc-yu-dim-card">
            <div class="hc-yu-dim-head"><span>🌟 Sosyal İmaj & Çift Karizması</span><span>%${sSocial}</span></div>
            <div class="hc-yu-dim-bar"><div class="hc-yu-dim-fill" style="width: ${sSocial}%; background: #0ea5e9;"></div></div>
        </div>
        <div class="hc-yu-dim-card">
            <div class="hc-yu-dim-head"><span>🔥 Fiziksel Dinamizm & Enerji</span><span>%${sEnergy}</span></div>
            <div class="hc-yu-dim-bar"><div class="hc-yu-dim-fill" style="width: ${sEnergy}%; background: #ef4444;"></div></div>
        </div>
        <div class="hc-yu-dim-card">
            <div class="hc-yu-dim-head"><span>🛡️ Ortak Güven & Rahatlık</span><span>%${sComfort}</span></div>
            <div class="hc-yu-dim-bar"><div class="hc-yu-dim-fill" style="width: ${sComfort}%; background: #8b5cf6;"></div></div>
        </div>
    `;

    document.getElementById('hc-yu-hero').innerHTML = heroHtml;
    document.getElementById('hc-yu-dim-grid').innerHTML = dimHtml;
    document.getElementById('hc-yu-desc').innerHTML = desc;

    document.getElementById('hc-yu-result').classList.add('visible');
    document.getElementById('hc-yu-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}


function hcSansNoktasiHesapla() {
    const sunBase = parseInt(document.getElementById('hc-sn-sun-sign').value);
    const sunDeg = parseInt(document.getElementById('hc-sn-sun-deg').value || 0);
    const moonBase = parseInt(document.getElementById('hc-sn-moon-sign').value);
    const moonDeg = parseInt(document.getElementById('hc-sn-moon-deg').value || 0);
    const ascBase = parseInt(document.getElementById('hc-sn-asc-sign').value);
    const ascDeg = parseInt(document.getElementById('hc-sn-asc-deg').value || 0);
    const birthTime = document.getElementById('hc-sn-time').value;

    const sunLong = sunBase + sunDeg;
    const moonLong = moonBase + moonDeg;
    const ascLong = ascBase + ascDeg;

    let partOfFortune;
    if (birthTime === "day") {
        partOfFortune = ascLong + moonLong - sunLong;
    } else {
        partOfFortune = ascLong + sunLong - moonLong;
    }

    // Normalize to 0-360
    while (partOfFortune < 0) partOfFortune += 360;
    while (partOfFortune >= 360) partOfFortune -= 360;

    const signs = ["Koç", "Boğa", "İkizler", "Yengeç", "Aslan", "Başak", "Terazi", "Akrep", "Yay", "Oğlak", "Kova", "Balık"];
    const signIndex = Math.floor(partOfFortune / 30);
    const finalDeg = Math.floor(partOfFortune % 30);
    const finalSign = signs[signIndex];

    const interpretations = {
        "Koç": "Şansınız, kendi yolunuzu çizmekte ve cesur adımlar atmaktadır. Rekabetçi ortamlarda başarı sağlarsınız.",
        "Boğa": "Şansınız, maddi değerler inşa etmekte ve huzurlu bir yaşam kurmaktadır. Sabır size kazandırır.",
        "İkizler": "Şansınız, bilgi paylaşımında ve iletişim ağlarındadır. Zekanız en büyük sermayenizdir.",
        "Yengeç": "Şansınız, ailevi değerlerde ve duygusal bağlardadır. Sezgileriniz size doğru kapıları açar.",
        "Aslan": "Şansınız, sahnede olmakta ve yaratıcılığınızı sergilemektedir. Kendinize güvenin.",
        "Başak": "Şansınız, detaylarda ve hizmet üretmektedir. Çalışkanlığınız sizi zirveye taşır.",
        "Terazi": "Şansınız, ortaklıklarda ve dengeli ilişkilerdedir. Diplomasi size kazanç sağlar.",
        "Akrep": "Şansınız, krizleri fırsata çevirmekte ve derin araştırmalardadır. Gücünüz gizeminizde saklı.",
        "Yay": "Şansınız, uzak diyarlarda ve felsefi keşiflerdedir. İyimserlik kapıları açar.",
        "Oğlak": "Şansınız, kariyer basamaklarında ve disiplinli çalışmaktadır. Saygınlık kazanırsınız.",
        "Kova": "Şansınız, toplumsal projelerde ve özgün fikirlerdedir. Geleceği siz kurarsınız.",
        "Balık": "Şansınız, spiritüel alanlarda ve ilham dolu işlerdedir. Akışa güvenmek size şans getirir."
    };

    let detailedContent = `
        <p><strong>Şans Noktası Analizi:</strong> Şans Noktanız <strong>${finalDeg}° ${finalSign}</strong> burcunda bulunuyor.</p>
        <p><strong>Bolluk Temanız:</strong> ${interpretations[finalSign]}</p>
        <p><strong>Kaderin Hediyesi:</strong> Şans Noktası (Pars Fortunae), ruhsal, fiziksel ve maddi olarak en kolay tatmin bulduğunuz noktadır. Bu yerleşim, hayatta 'en az çabayla en çok verimi' nereden alacağınızı fısıldar.</p>
        <p><strong>2026 Şans Gündemi:</strong> 2026 yılında Jüpiter'in Aslan burcuna geçişi, özellikle ${finalSign === 'Aslan' || finalSign === 'Koç' || finalSign === 'Yay' ? 'şansınızı katlayacak' : 'yeni fırsatlar doğuracak'}. Bu yıl risk almaktan çekinmeyin ve Şans Noktanızın temsil ettiği alana odaklanın.</p>
        <p><strong>Tavsiye:</strong> Şans Noktanızın olduğu burcun yönetici gezegeni, şansınızı nasıl realize edeceğinizi gösterir. O gezegeni de haritanızda incelemeyi unutmayın.</p>
    `;

    document.getElementById('hc-sn-value').innerText = `${finalDeg}° ${finalSign}`;
    document.getElementById('hc-sn-desc').innerHTML = detailedContent;
    document.getElementById('hc-sn-result').classList.add('visible');
}

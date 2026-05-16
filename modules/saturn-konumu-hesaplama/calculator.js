function hcSaturnKonumuHesapla() {
    const birthDate = document.getElementById('hc-sap-birth').value;
    const birthTime = document.getElementById('hc-sap-time').value;

    if (!birthDate || !birthTime) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const date = new Date(birthDate + 'T' + birthTime);
    function getJD(d) { return (d.getTime() / 86400000) - (d.getTimezoneOffset() / 1440) + 2440587.5; }
    const jd = getJD(date);
    const n = jd - 2451545.0;

    // Saturn mean elements
    let L = (49.944 + 0.0334597 * n) % 360;
    let M = (316.967 + 0.0334442 * n) % 360;
    
    // Simplified correction
    let lambda = L + 6.39 * Math.sin(M * Math.PI / 180);
    lambda = lambda % 360;
    if (lambda < 0) lambda += 360;

    const signs = ["Koç", "Boğa", "İkizler", "Yengeç", "Aslan", "Başak", "Terazi", "Akrep", "Yay", "Oğlak", "Kova", "Balık"];
    const signIndex = Math.floor(lambda / 30);
    const degree = (lambda % 30).toFixed(2);
    const signName = signs[signIndex];

    const saturnInterpretations = {
        "Koç": "Satürn Koç'ta: Sabır ve disiplinle kendi yolunu çizme dersleri. Cesaretin test edildiği alanlar.",
        "Boğa": "Satürn Boğa'da: Maddi güven inşa etme, sabır ve kalıcılık dersleri. Değerleri yapılandırma.",
        "İkizler": "Satürn İkizler'de: Zihinsel disiplin, odaklanma ve derinlikli iletişim dersleri. Bilgiyi somutlaştırma.",
        "Yengeç": "Satürn Yengeç'te: Duygusal sorumluluk, aile bağlarını yapılandırma ve içsel güvenlik dersleri.",
        "Aslan": "Satürn Aslan'da: Yaratıcı özgüven, otorite ve sahicilik dersleri. Kendi ışığını disiplinle yansıtma.",
        "Başak": "Satürn Başak'ta: Hizmet, verimlilik ve detaylı çalışma disiplini. Mükemmelliği somutlaştırma.",
        "Terazi": "Satürn Terazi'de (Yücelimde): İlişkilerde sorumluluk, adalet ve denge dersleri. Ciddi ortaklıklar.",
        "Akrep": "Satürn Akrep'te: Derin dönüşüm, kriz yönetimi ve güç kullanımı disiplini. Duygusal dayanıklılık.",
        "Yay": "Satürn Yay'da: İnançları sorgulama, bilgelik ve etik değerleri yapılandırma dersleri. Geniş perspektif.",
        "Oğlak": "Satürn Oğlak'ta (Kendi Evinde): Büyük sorumluluk, hırs, otorite ve kalıcı yapılar inşa etme disiplini.",
        "Kova": "Satürn Kova'da (Kendi Evinde): Toplumsal sorumluluk, yenilikçi yapılar ve bağımsızlık disiplini.",
        "Balık": "Satürn Balık'ta: Ruhsal disiplin, merhameti yapılandırma ve hayalleri somutlaştırma dersleri."
    };

    document.getElementById('hc-res-sap-val').innerText = `${degree}° ${signName}`;
    document.getElementById('hc-res-sap-desc').innerText = `Doğduğunuz anda Satürn ${signName} burcunun ${degree} derecesinde bulunuyordu. Satürn, astrolojide sorumlulukları, disiplini, kısıtlamaları, dersleri ve karmayı temsil eder: ${saturnInterpretations[signName]}`;
    document.getElementById('hc-saturn-pos-result').classList.add('visible');
}

function hcKuzeyAyDugumuHesapla() {
    const dateStr = document.getElementById('hc-knode-date').value;
    if (!dateStr) { alert('Lütfen tarih seçin.'); return; }

    function getNodePos(d) {
        function getJD(date) { return (date.getTime() / 86400000) - (date.getTimezoneOffset() / 1440) + 2440587.5; }
        const jd = getJD(d);
        const T = (jd - 2451545.0) / 36525;
        let omega = (125.0445 - 1934.1363 * T) % 360;
        if (omega < 0) omega += 360;
        return omega;
    }

    const signs = ["Koç", "Boğa", "İkizler", "Yengeç", "Aslan", "Başak", "Terazi", "Akrep", "Yay", "Oğlak", "Kova", "Balık"];
    const current = new Date(dateStr + 'T12:00:00');
    const pos = getNodePos(current);
    const sign = signs[Math.floor(pos / 30)];

    const interpretations = {
        "Koç": "Bireyselliği öğrenmek, cesaret göstermek ve kendi yolunu çizmek.",
        "Boğa": "Maddi güvenliği sağlamak, sabırlı olmak ve kalıcı değerler üretmek.",
        "İkizler": "Bilgi paylaşmak, iletişim kurmak ve meraklı kalmak.",
        "Yengeç": "Duygusal bağlar kurmak, şefkat göstermek ve aile değerlerini anlamak.",
        "Aslan": "Yaratıcılığını sergilemek, sahneye çıkmak ve özgüven geliştirmek.",
        "Başak": "Hizmet etmek, detaylara odaklanmak ve düzen kurmak.",
        "Terazi": "İlişkilerde dengeyi bulmak, diplomasi ve işbirliği yapmak.",
        "Akrep": "Dönüşümü kabul etmek, derinlik kazanmak ve tutkularını anlamak.",
        "Yay": "Bilgelik aramak, özgürleşmek ve geniş vizyon sahibi olmak.",
        "Oğlak": "Sorumluluk almak, disiplinli çalışmak ve toplumsal başarı kazanmak.",
        "Kova": "Toplumsal fayda sağlamak, özgün olmak ve insancıl idealler peşinde koşmak.",
        "Balık": "Ruhsallığa yönelmek, bırakmayı öğrenmek ve empati geliştirmek."
    };

    document.getElementById('hc-knode-val').innerText = sign;
    document.getElementById('hc-knode-desc').innerText = `Kuzey Ay Düğümü (KAD) ruhunuzun bu dünyadaki rotasını gösterir. Sizin KAD'ınız ${sign} burcunda. Bu yaşamdaki kadersel amacınız: ${interpretations[sign]}`;

    document.getElementById('hc-kuzey-node-result').classList.add('visible');
}

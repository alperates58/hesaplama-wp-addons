function hcGuneyAyDugumuHesapla() {
    const dateStr = document.getElementById('hc-gnode-date').value;
    if (!dateStr) { alert('Lütfen tarih seçin.'); return; }

    function getNodePos(d) {
        function getJD(date) { return (date.getTime() / 86400000) - (date.getTimezoneOffset() / 1440) + 2440587.5; }
        const jd = getJD(d);
        const T = (jd - 2451545.0) / 36525;
        let omega = (125.0445 - 1934.1363 * T) % 360;
        if (omega < 0) omega += 360;
        return (omega + 180) % 360;
    }

    const signs = ["Koç", "Boğa", "İkizler", "Yengeç", "Aslan", "Başak", "Terazi", "Akrep", "Yay", "Oğlak", "Kova", "Balık"];
    const current = new Date(dateStr + 'T12:00:00');
    const pos = getNodePos(current);
    const sign = signs[Math.floor(pos / 30)];

    const interpretations = {
        "Koç": "Aşırı bencilce davranma, sabırsızlık ve düşünmeden hareket etme eğilimi.",
        "Boğa": "Değişime direnç gösterme, maddi şeylere aşırı tutunma ve inatçılık.",
        "İkizler": "Yüzeysellik, dedikodu ve bir konuya odaklanamama.",
        "Yengeç": "Aşırı duygusallık, bağımlı ilişkiler ve geçmişe takılı kalma.",
        "Aslan": "Ego sorunları, sürekli onaylanma ihtiyacı ve kibir.",
        "Başak": "Mükemmeliyetçilik, aşırı eleştirellik ve hastalık hastası olma.",
        "Terazi": "Kararsızlık, hayır diyememe ve başkalarına bağımlı olma.",
        "Akrep": "Kontrol tutkusu, intikam duygusu ve aşırı şüphecilik.",
        "Yay": "Aşırı fanatizm, dogmatik düşünceler ve sorumsuzluk.",
        "Oğlak": "Aşırı hırs, duygusal soğukluk ve katı kurallar.",
        "Kova": "Aşırı mesafeli olma, ukalalık ve topluma uyum sağlayamama.",
        "Balık": "Kurban psikolojisi, gerçeklerden kaçma ve belirsizlik."
    };

    document.getElementById('hc-gnode-val').innerText = sign;
    document.getElementById('hc-gnode-desc').innerText = `Güney Ay Düğümü (GAD) geçmişten getirdiğiniz alışkanlıkları ve geride bırakmanız gereken kalıpları temsil eder. Sizin GAD'ınız ${sign} burcunda. Bu yaşamda aşmanız gereken gölge yanlarınız: ${interpretations[sign]}`;

    document.getElementById('hc-guney-node-result').classList.add('visible');
}

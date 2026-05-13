function hcGezegenselSkorHesapla() {
    const sun1 = document.getElementById('hc-gs-sun1').value;
    const moon1 = document.getElementById('hc-gs-moon1').value;
    const asc1 = document.getElementById('hc-gs-asc1').value;

    const sun2 = document.getElementById('hc-gs-sun2').value;
    const moon2 = document.getElementById('hc-gs-moon2').value;
    const asc2 = document.getElementById('hc-gs-asc2').value;

    const elementMap = {
        "koc": "Ateş", "aslan": "Ateş", "yay": "Ateş",
        "boga": "Toprak", "basak": "Toprak", "oglak": "Toprak",
        "ikizler": "Hava", "terazi": "Hava", "kova": "Hava",
        "yengec": "Su", "akrep": "Su", "balik": "Su"
    };

    function getUyumScore(s1, s2) {
        const e1 = elementMap[s1];
        const e2 = elementMap[s2];
        if (s1 === s2) return 95;
        if (e1 === e2) return 85;
        if ((e1 === "Ateş" && e2 === "Hava") || (e1 === "Hava" && e2 === "Ateş")) return 90;
        if ((e1 === "Toprak" && e2 === "Su") || (e1 === "Su" && e2 === "Toprak")) return 88;
        return 60;
    }

    const sunScore = getUyumScore(sun1, sun2);
    const moonScore = getUyumScore(moon1, moon2);
    const ascScore = getUyumScore(asc1, asc2);

    const totalScore = Math.round((sunScore * 0.4) + (moonScore * 0.4) + (ascScore * 0.2));

    let desc = "";
    if (totalScore >= 85) {
        desc = "Yıldızlarınız tam bir uyum içinde dans ediyor! Hem özünüz (Güneş), hem duygularınız (Ay), hem de dış dünyaya verdiğiniz imaj (Yükselen) birbirini mükemmel tamamlıyor. Kadersel bir birliktelik potansiyeliniz çok yüksek.";
    } else if (totalScore >= 70) {
        desc = "Güçlü ve dengeli bir ilişki. Bazı noktalarda farklılıklar olsa da, genel enerjiniz birbirini destekliyor. İletişim ve anlayışla her türlü zorluğu aşabilirsiniz.";
    } else {
        desc = "Birbirinizden çok farklı dünyaların insanlarısınız. Bu durum ilişkinizi zorlayıcı kılsa da, aslında birbirinizin en büyük öğretmeni olabilirsiniz. Sabır ve emek bu bağın anahtarıdır.";
    }

    let detailedContent = `
        <p><strong>Kapsamlı Analiz Sonucu:</strong> ${desc}</p>
        <p><strong>Alt Skor Dağılımı:</strong></p>
        <ul>
            <li><strong>Karakter Uyumu (Güneş):</strong> %${sunScore}</li>
            <li><strong>Duygusal Uyum (Ay):</strong> %${moonScore}</li>
            <li><strong>Fiziksel/İmaj Uyumu (Yükselen):</strong> %${ascScore}</li>
        </ul>
        <p><strong>2026 Gezegensel Etki:</strong> 2026 yılında gökyüzündeki büyük dizilimler, özellikle 'hibrit' uyumlara sahip çiftler için büyük kapılar açacak. Sizin skorunuzun bileşenleri, bu yıl birlikte atacağınız adımların kalıcılığını gösteriyor. Özellikle sonbahar aylarında ilişkinizdeki 'ortak değerler' üzerine yoğunlaşmanız size büyük bir şans getirebilir.</p>
        <p><strong>Tavsiye:</strong> Uyum skoru sadece bir başlangıçtır; gerçek aşk, iki insanın birbirini her gün yeniden seçmesiyle büyür.</p>
    `;

    document.getElementById('hc-gs-value').innerText = `% ${totalScore}`;
    document.getElementById('hc-gs-desc').innerHTML = detailedContent;
    document.getElementById('hc-gs-result').classList.add('visible');
}

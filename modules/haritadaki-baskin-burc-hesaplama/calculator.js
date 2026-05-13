function hcBaskinBurcHesapla() {
    const weights = {
        sun: document.getElementById('hc-hb-sun').value,
        moon: document.getElementById('hc-hb-moon').value,
        asc: document.getElementById('hc-hb-asc').value,
        mercury: document.getElementById('hc-hb-mercury').value,
        venus: document.getElementById('hc-hb-venus').value,
        mars: document.getElementById('hc-hb-mars').value
    };

    const points = {
        "koc": 0, "boga": 0, "ikizler": 0, "yengec": 0, "aslan": 0, "basak": 0,
        "terazi": 0, "akrep": 0, "yay": 0, "oglak": 0, "kova": 0, "balik": 0
    };

    points[weights.sun] += 3;
    points[weights.moon] += 3;
    points[weights.asc] += 3;
    points[weights.mercury] += 1;
    points[weights.venus] += 1;
    points[weights.mars] += 1;

    let dominantSign = "";
    let maxPoints = -1;

    for (let sign in points) {
        if (points[sign] > maxPoints) {
            maxPoints = points[sign];
            dominantSign = sign;
        }
    }

    const signNames = {
        "koc": "Koç", "boga": "Boğa", "ikizler": "İkizler", "yengec": "Yengeç",
        "aslan": "Aslan", "basak": "Başak", "terazi": "Terazi", "akrep": "Akrep",
        "yay": "Yay", "oglak": "Oğlak", "kova": "Kova", "balik": "Balık"
    };

    let detailedDesc = `
        <p><strong>Baskın Burç Analizi:</strong> Haritanızda en yüksek puana sahip olan burç <strong>${signNames[dominantSign]}</strong> olarak belirlendi. Bu, Güneş burcunuz farklı olsa bile, hayattaki temel motivasyonlarınızın ve tepkilerinizin bu burcun özelliklerini taşıdığı anlamına gelir.</p>
        <p><strong>Karakter Etkisi:</strong> Baskın burcunuz, kişiliğinizin 'alt tonunu' belirler. Örneğin Güneşiniz Terazi ama baskın burcunuz Akrep ise, dışarıdan uyumlu görünmenize rağmen iç dünyanızda çok daha tutkulu, araştırmacı ve kararlı bir yapıya sahipsiniz demektir.</p>
        <p><strong>2026 Projeksiyonu:</strong> 2026 yılında gökyüzündeki transitler, baskın burcunuzun olduğu hayat alanını tetikleyecek. Bu yıl kendi potansiyelinizi daha iyi kullanabilir ve karakterinizin güçlü yanlarını (liderlik, sabır, zeka veya sezgi) profesyonel hayatta başarıya dönüştürebilirsiniz.</p>
        <p><strong>Puan Dağılımı Notu:</strong> Bu hesaplama; Güneş, Ay ve Yükselen gibi köşe noktalarına daha fazla ağırlık vererek yapılmıştır. Haritanızda bir stelyum (bir burçta 3'ten fazla gezegen) varsa, o burcun etkisi hayatınızda kader belirleyici olacaktır.</p>
    `;

    document.getElementById('hc-hb-value').innerText = signNames[dominantSign];
    document.getElementById('hc-hb-desc').innerHTML = detailedDesc;
    document.getElementById('hc-hb-result').classList.add('visible');
}

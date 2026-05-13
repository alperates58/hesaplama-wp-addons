function hcYukselenUyumHesapla() {
    const sign1 = document.getElementById('hc-yu-sign1').value;
    const sign2 = document.getElementById('hc-yu-sign2').value;

    const elementMap = {
        "koc": "Ateş", "aslan": "Ateş", "yay": "Ateş",
        "boga": "Toprak", "basak": "Toprak", "oglak": "Toprak",
        "ikizler": "Hava", "terazi": "Hava", "kova": "Hava",
        "yengec": "Su", "akrep": "Su", "balik": "Su"
    };

    const e1 = elementMap[sign1];
    const e2 = elementMap[sign2];

    let score = 50;
    let desc = "";

    if (e1 === e2) {
        score = 95;
        desc = "İnanılmaz bir ilk görüşte aşk potansiyeli! Sizin özünüz ile partnerinizin dışa vurduğu enerji tam bir uyum içinde. Birlikteyken çevrenize çok güçlü ve karizmatik bir ışık yayıyorsunuz.";
    } else if ((e1 === "Ateş" && e2 === "Hava") || (e1 === "Hava" && e2 === "Ateş")) {
        score = 90;
        desc = "Çok sosyal ve dikkat çekici bir ikilisiniz. İletişiminiz çok akıcı ve dış dünyada birlikteyken kendinizi çok özgür hissediyorsunuz. Partnerinizin yükseleni sizin enerjinizi besliyor.";
    } else if ((e1 === "Toprak" && e2 === "Su") || (e1 === "Su" && e2 === "Toprak")) {
        score = 85;
        desc = "Güven veren ve saygın bir çift imajı çiziyorsunuz. Partnerinizin dış dünyadaki tavrı sizin içsel huzurunuzu destekliyor. Uzun vadeli ve ciddi bir birliktelik için harika bir zemin.";
    } else {
        score = 65;
        desc = "Farklı enerjilerin çekimi... Partnerinizin dışarıya verdiği 'maske' sizin özünüzle bazen çatışabilir, ancak bu durum birbirinizi keşfetmeniz için harika bir macera sunuyor.";
    }

    let detailedContent = `
        <p><strong>Cazibe ve İmaj Analizi:</strong> ${desc}</p>
        <p><strong>Sosyal Etkiniz:</strong> Sizin (${sign1.toUpperCase()}) enerjiniz ile partnerinizin yükseleni (${sign2.toUpperCase()}) birleştiğinde, çevrenizde ${e1 === e2 ? "lider ve parlak" : "dengeleyici ve estetik"} bir etki yaratıyorsunuz.</p>
        <p><strong>2026 Sosyal Gündemi:</strong> 2026 yılında sosyal çevreniz genişleyecek. Partnerinizle birlikte katılacağınız davetler, etkinlikler ve organizasyonlar ilişkinize yeni bir ivme kazandırabilir. Bu yıl 'ortak imajınız' üzerine çalışmak (tarz değişikliği, ortak projeler) size şans getirecektir.</p>
        <p><strong>Tavsiye:</strong> İç dünyanızdaki uyumu dış dünyaya yansıtırken samimi olmaya özen gösterin. En büyük çekim, dürüstlüktedir.</p>
    `;

    document.getElementById('hc-yu-value').innerText = `% ${score}`;
    document.getElementById('hc-yu-desc').innerHTML = detailedContent;
    document.getElementById('hc-yu-result').classList.add('visible');
}

function hcAyDugumUyumHesapla() {
    const sign1 = document.getElementById('hc-adu-sign1').value;
    const sign2 = document.getElementById('hc-adu-sign2').value;

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

    if (sign1 === sign2) {
        score = 98;
        desc = "Aynı kadersel yöne doğru yürüyorsunuz! Bu dünyadaki tekamül yolculuğunuzda birbirinize rehberlik etmek için bir araya gelmişsiniz. Ortak amaçlarınız sizi ömür boyu bir arada tutabilir.";
    } else if (e1 === e2) {
        score = 85;
        desc = "Benzer yöntemlerle gelişim sağlıyorsunuz. Partnerinizin kadersel hedefleri sizin gelişim alanlarınızı destekliyor. Birlikteyken ruhsal olarak çok daha hızlı büyüyebilirsiniz.";
    } else if ((e1 === "Ateş" && e2 === "Hava") || (e1 === "Hava" && e2 === "Ateş")) {
        score = 90;
        desc = "İlham verici bir kader ortaklığı. Biriniz vizyon sağlarken diğeri o vizyonu gerçeğe dönüştürmek için gereken cesareti veriyor. Sosyal ve ruhsal olarak parlayan bir çiftsiniz.";
    } else {
        score = 70;
        desc = "Farklı kadersel yollarınız olsa da, birbirinize 'zıtların öğretisini' sunuyorsunuz. Bu ilişki size hiç bilmediğiniz yönlerinizi keşfetme fırsatı verecektir.";
    }

    let detailedContent = `
        <p><strong>Ruhsal Tekamül Analizi:</strong> ${desc}</p>
        <p><strong>Kuzey Ay Düğümünüzün Mesajı:</strong> Sizin Kuzey Ay Düğümünüz ${sign1.toUpperCase()}, bu hayatta öğrenmeniz gereken en önemli dersin ${e1 === "Ateş" ? "cesaret ve bireysellik" : e1 === "Toprak" ? "istikrar ve üretim" : e1 === "Hava" ? "bilgi ve paylaşım" : "duygusal derinlik ve teslimiyet"} olduğunu söylüyor.</p>
        <p><strong>2026 Kadersel Döngüsü:</strong> 2026 yılında Ay Düğümlerinin burç değiştirmesi, kadersel karşılaşmaları tetikleyecek. Partnerinizle olan bağınızda 'karar anları' yaşanabilir. Bu yıl birlikte alacağınız kararlar, gelecek 18 yılınızı etkileyebilir. İç sesinize güvenin.</p>
        <p><strong>Tavsiye:</strong> Kader, biraz da bizim seçimlerimizdir. Partnerinizle aynı yöne bakmak için ortak bir ideal belirleyin.</p>
    `;

    document.getElementById('hc-adu-value').innerText = `% ${score}`;
    document.getElementById('hc-adu-desc').innerHTML = detailedContent;
    document.getElementById('hc-adu-result').classList.add('visible');
}

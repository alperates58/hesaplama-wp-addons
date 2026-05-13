function hcKironUyumHesapla() {
    const sign1 = document.getElementById('hc-ki-sign1').value;
    const sign2 = document.getElementById('hc-ki-sign2').value;

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
        desc = "Benzer yaralara ve şifa yöntemlerine sahipsiniz. Birbirinizin acısını kelimeler olmadan anlıyor ve en derin seviyede destek oluyorsunuz. Bu ilişki her ikiniz için de büyük bir iyileşme fırsatı.";
    } else if (e1 === e2) {
        score = 90;
        desc = "Duygusal destek mekanizmalarınız çok uyumlu. Partnerinizin varlığı sizin ruhsal yorgunluklarınızı dindiriyor. Birlikteyken kendinizi güvende ve anlaşılmış hissediyorsunuz.";
    } else if ((e1 === "Toprak" && e2 === "Su") || (e1 === "Su" && e2 === "Toprak")) {
        score = 92;
        desc = "Besleyici ve şifacı bir bağ. Biriniz duygusal derinlik sunarken diğeriniz o derinliği somut bir huzura dönüştürüyor. Ruhsal yaralarınızı saracak en güvenli limandasınız.";
    } else {
        score = 75;
        desc = "Farklı şifa yöntemleriniz var ama bu durum birbirinize yeni bakış açıları katmanızı sağlıyor. Partnerinizin farklı yaklaşımı, sizin kendi içinizdeki kör noktaları görmenize yardımcı olabilir.";
    }

    let detailedContent = `
        <p><strong>Şifa ve Empati Analizi:</strong> ${desc}</p>
        <p><strong>Ruhsal Yaralar ve Destek:</strong> Kiron burcunuz ${sign1.toUpperCase()}, sizin hayatta özellikle ${e1 === "Ateş" ? "özgüven ve cesaret" : e1 === "Toprak" ? "maddi güvenlik ve istikrar" : e1 === "Hava" ? "iletişim ve zeka" : "duygusal aidiyet"} konularında hassas olduğunuzu gösteriyor. Partneriniz bu alanlarda size en büyük desteği verecek kişidir.</p>
        <p><strong>2026 Şifa Gündemi:</strong> 2026 yılında Kiron'un Koç burcundaki son transitleri, bireysel yaralarımızı sarmak için bize son bir şans verecek. Partnerinizle birlikte spiritüel bir yolculuğa çıkmak, terapi almak veya sadece birbirinize zaman ayırmak bu yılın en büyük şifası olacaktır.</p>
        <p><strong>Tavsiye:</strong> Yaralarımız bizi zayıf değil, bilge yapar. Partnerinizin yaralarını birer 'altın leke' (Kintsugi) olarak görün ve onları sevgiyle onarın.</p>
    `;

    document.getElementById('hc-ki-value').innerText = `% ${score}`;
    document.getElementById('hc-ki-desc').innerHTML = detailedContent;
    document.getElementById('hc-ki-result').classList.add('visible');
}

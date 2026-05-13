function hcJupiterUyumHesapla() {
    const sign1 = document.getElementById('hc-ju-sign1').value;
    const sign2 = document.getElementById('hc-ju-sign2').value;

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
        score = 90;
        desc = "Hayat amaçlarınız ve büyüme hedefleriniz çok benzer. Birlikteyken kendinizi çok daha güçlü ve şanslı hissediyorsunuz. Dünyayı aynı pencereden keşfediyorsunuz.";
    } else if ((e1 === "Ateş" && e2 === "Hava") || (e1 === "Hava" && e2 === "Ateş")) {
        score = 94;
        desc = "Büyük bir vizyon ve macera ruhu! Birbirinizin ufkunu açıyor, hayata karşı umut ve neşeyle bakıyorsunuz. Seyahatler ve felsefi paylaşımlar sizi bir arada tutan en güçlü bağlar.";
    } else if ((e1 === "Toprak" && e2 === "Su") || (e1 === "Su" && e2 === "Toprak")) {
        score = 88;
        desc = "Sakin ama sağlam bir büyüme. Maddi ve manevi olarak birbirinizi besliyor, kalıcı başarılar inşa ediyorsunuz. Birlikteyken kendinizi çok güvende hissedersiniz.";
    } else {
        score = 65;
        desc = "Gelişim ve şans anlayışınız farklı olabilir. Biriniz risk alarak büyümeyi severken diğeri daha temkinli olabilir. Birbirinizin 'bereket' anlayışına saygı duymalısınız.";
    }

    let detailedContent = `
        <p><strong>Şans ve Bolluk Analizi:</strong> ${desc}</p>
        <p><strong>Büyüme Tarzınız:</strong> Jüpiter burcunuz ${sign1.toUpperCase()}, sizin hayatta ${e1 === "Ateş" ? "cesur adımlarla" : e1 === "Toprak" ? "sabırlı bir emekle" : e1 === "Hava" ? "bilgi ve çevreyle" : "duygusal derinlikle"} büyüdüğünüzü gösteriyor.</p>
        <p><strong>2026 Jüpiter Gündemi:</strong> 2026 yılında Jüpiter'in Aslan burcuna geçişi, sizin ikili ilişkilerinizde 'neşeyi ve yaratıcılığı' parlatacak. Bu yıl partnerinizle birlikte büyük bir kutlama yapabilir, yurt dışı seyahati planlayabilir veya ortak bir başarıya imza atabilirsiniz. Şansın sizinle olduğu bir yıl!</p>
        <p><strong>Tavsiye:</strong> Bolluk, paylaştıkça artar. Birbirinizin başarılarını yürekten destekleyin ve ortak hayalleriniz için cömert olun.</p>
    `;

    document.getElementById('hc-ju-value').innerText = `% ${score}`;
    document.getElementById('hc-ju-desc').innerHTML = detailedContent;
    document.getElementById('hc-ju-result').classList.add('visible');
}

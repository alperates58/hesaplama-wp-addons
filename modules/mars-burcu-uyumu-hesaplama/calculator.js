function hcMarsUyumHesapla() {
    const sign1 = document.getElementById('hc-mu-sign1').value;
    const sign2 = document.getElementById('hc-mu-sign2').value;

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
        score = 85;
        desc = "Enerji seviyeleriniz ve mücadele yöntemleriniz çok benzer. Birlikte bir hedefe odaklandığınızda durdurulamaz bir güç olabilirsiniz. Ancak öfke anlarında birbirinizi çok fazla tetiklememeye dikkat etmelisiniz.";
    } else if ((e1 === "Ateş" && e2 === "Hava") || (e1 === "Hava" && e2 === "Ateş")) {
        score = 90;
        desc = "Çok dinamik ve motive edici bir uyum. Birinizin enerjisi diğerinin fikirlerini gerçeğe dönüştürmesini sağlıyor. Tartışmalarınız bile öğretici ve geliştirici olabilir.";
    } else if ((e1 === "Ateş" && e2 === "Su") || (e1 === "Su" && e2 === "Ateş")) {
        score = 40;
        desc = "Yüksek tansiyon ve buharlaşma riski! Tutku çok yüksek olabilir ama kriz anlarında birbirinizi yorma potansiyeliniz de var. Sabır ve anlayış bu ilişkideki en büyük silahınız olmalı.";
    } else {
        score = 70;
        desc = "Fiziksel enerji ve eylem planlarınızda farklılıklar olsa da, ortak bir hedef belirlediğinizde birbirinizi tamamlayabilirsiniz.";
    }

    let detailedContent = `
        <p><strong>Eylem ve Tutku Analizi:</strong> ${desc}</p>
        <p><strong>Mücadele Tarzınız:</strong> Mars burcunuz ${sign1.toUpperCase()}, sizin kriz anlarında ${e1 === "Ateş" ? "doğrudan saldırıya" : e1 === "Toprak" ? "stratejik bekleyişe" : e1 === "Hava" ? "sözsel tartışmaya" : "duygusal tepkiye"} meyilli olduğunuzu gösteriyor.</p>
        <p><strong>2026 Mars Gündemi:</strong> 2026 yılında Mars'ın burç değiştirmeleri, sizin fiziksel aktivitelerinizde ve hırslarınızda yeni bir ivme yaratacak. Partnerinizle birlikte spor yapmak veya ortak bir fiziksel proje (bahçe işleri, tadilat vb.) yürütmek enerjinizi boşaltmanıza ve bağınızı güçlendirmenize yardımcı olur.</p>
        <p><strong>Tavsiye:</strong> Enerjinizi birbirinize karşı değil, dış dünyaya karşı ortak bir güç olarak kullanın.</p>
    `;

    document.getElementById('hc-mu-value').innerText = `% ${score}`;
    document.getElementById('hc-mu-desc').innerHTML = detailedContent;
    document.getElementById('hc-mu-result').classList.add('visible');
}

function hcLilitUyumHesapla() {
    const sign1 = document.getElementById('hc-lu-sign1').value;
    const sign2 = document.getElementById('hc-lu-sign2').value;

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
        score = 96;
        desc = "Birbirinizin en derin, bastırılmış arzularını anlıyorsunuz. Bu ilişki çok güçlü bir çekim ve 'yasak' olanın cazibesini taşıyor. Birlikteyken kendinizi tamamen özgür ama bir o kadar da takıntılı hissedebilirsiniz.";
    } else if (e1 === e2) {
        score = 88;
        desc = "Benzer gölge yanlara sahipsiniz. Birbirinizin korkularını ve arzularını tetikliyorsunuz. Bu durum hem çok dönüştürücü hem de bazen yorucu olabilir. Ancak aranızdaki çekim çok derin ve gerçektir.";
    } else if ((e1 === "Ateş" && e2 === "Hava") || (e1 === "Hava" && e2 === "Ateş")) {
        score = 92;
        desc = "Tutkunun ve zihinsel uyarılmanın mükemmel karışımı. Birbirinizi sürekli provoke ediyor ve heyecanı canlı tutuyorsunuz. İlişkinizde asla monotonluk olmayacaktır.";
    } else {
        score = 65;
        desc = "Farklı arzu dilleri... Birbirinizin gizli yanlarını keşfetmek zaman alabilir. Ancak bir kez o derinliğe indiğinizde, geri dönüşü olmayan bir kadersel bağ oluşabilir.";
    }

    let detailedContent = `
        <p><strong>Derin Tutku Analizi:</strong> ${desc}</p>
        <p><strong>Gölge Yanınız:</strong> Lilit burcunuz ${sign1.toUpperCase()}, sizin ilişkilerde ${e1 === "Ateş" ? "kontrol etme arzusuna" : e1 === "Toprak" ? "aşırı sahiplenmeye" : e1 === "Hava" ? "zihinsel oyunlara" : "duygusal manipülasyona"} meyilli olabileceğinizi gösteriyor.</p>
        <p><strong>2026 Lilit Gündemi:</strong> 2026 yılında Lilit'in Terazi burcundaki geçişi, ilişkilerde 'adalet ve denge' sınavlarını getirecek. Partnerinizle olan güç savaşlarını bir kenara bırakıp, bu derin tutkuyu birbirinizi şifalandırmak için kullanmalısınız. Gizli sırlar bu yıl açığa çıkabilir; dürüstlük en büyük koruyucunuz olacaktır.</p>
        <p><strong>Tavsiye:</strong> Karanlığı aydınlatmanın tek yolu ona bakmaktır. Partnerinizle korkularınız hakkında açıkça konuşun.</p>
    `;

    document.getElementById('hc-lu-value').innerText = `% ${score}`;
    document.getElementById('hc-lu-desc').innerHTML = detailedContent;
    document.getElementById('hc-lu-result').classList.add('visible');
}

function hcEvlilikUyumHesapla() {
    const sign1 = document.getElementById('hc-eu-sign1').value;
    const sign2 = document.getElementById('hc-eu-sign2').value;

    const signElements = {
        "koc": "Ateş", "aslan": "Ateş", "yay": "Ateş",
        "boga": "Toprak", "basak": "Toprak", "oglak": "Toprak",
        "ikizler": "Hava", "terazi": "Hava", "kova": "Hava",
        "yengec": "Su", "akrep": "Su", "balik": "Su"
    };

    const element1 = signElements[sign1];
    const element2 = signElements[sign2];

    let score = 50;
    let desc = "";

    if (element1 === element2) {
        score = 85;
        desc = "Aynı elementten gelen iki ruh olarak birbirinizi çok iyi anlıyorsunuz. Evliliğinizde ortak değerler ve benzer tepkiler sizi bir arada tutan en güçlü bağ olacaktır.";
    } else if ((element1 === "Ateş" && element2 === "Hava") || (element1 === "Hava" && element2 === "Ateş")) {
        score = 95;
        desc = "Hava ateşi körükler! Harika bir uyum. Evliliğiniz dinamik, sosyal ve heyecan verici geçecektir. Birbirinizin vizyonunu genişleten bir çiftsiniz.";
    } else if ((element1 === "Toprak" && element2 === "Su") || (element1 === "Su" && element2 === "Toprak")) {
        score = 90;
        desc = "Su toprağı besler. Çok verimli ve huzurlu bir evlilik potansiyeli. Birbirinize duygusal ve maddi anlamda tam destek olan, güven veren bir çiftsiniz.";
    } else if ((element1 === "Ateş" && element2 === "Su") || (element1 === "Su" && element2 === "Ateş")) {
        score = 45;
        desc = "Ateş ve su... Birbirinizi buharlaştırabilir veya söndürebilirsiniz. Evlilikte denge kurmak için çok çaba sarf etmeniz gerekecek. Duygusal dalgalanmalara karşı sabırlı olmalısınız.";
    } else if ((element1 === "Toprak" && element2 === "Ateş") || (element1 === "Ateş" && element2 === "Toprak")) {
        score = 60;
        desc = "Toprak ateşi hapseder veya ateş toprağı ısıtır. Pratiklik ve heyecan arasında bir denge kurmanız gerekiyor. Evliliğinizde görev paylaşımı çok önemli olacaktır.";
    } else {
        score = 70;
        desc = "Hava ve toprak/su dengesi. Mantık ve duygu/madde arasında gidip gelen bir ilişki. Birbirinize yeni perspektifler katabilirsiniz ama ortak bir dil bulmak zaman alabilir.";
    }

    // Özel burç eşleşmeleri (Eski dostlar vb.)
    if (sign1 === sign2) score = 80;

    let detailedContent = `
        <p><strong>Genel Uyum Analizi:</strong> ${desc}</p>
        <p><strong>Evlilikteki Güçlü Yanlarınız:</strong> ${element1} ve ${element2} elementlerinin birleşimi, evliliğinizde özellikle 'sadakat' ve 'iletişim' konularında belirli bir zemin oluşturur. Eğer karşılıklı saygı ve sevgi varsa, bu oranlar sadece birer rehberdir.</p>
        <p><strong>2026 Evlilik Tavsiyesi:</strong> 2026 yılındaki gökyüzü hareketleri, evliliklerde 'ortak finans' ve 'ev değişimi' konularını tetikleyecek. Bu yıl birbirinize karşı daha esnek olmalı ve özellikle Jüpiter'in Aslan geçişi sırasında (Yaz 2026) romantizme daha fazla vakit ayırmalısınız.</p>
        <p><strong>Olası Zorluklar:</strong> Farklı element yapılarından dolayı ortaya çıkabilecek çatışmaları, birbirinizin burç özelliklerini (Modalite ve Nitelik) anlayarak aşabilirsiniz.</p>
    `;

    document.getElementById('hc-eu-value').innerText = `% ${score}`;
    document.getElementById('hc-eu-desc').innerHTML = detailedContent;
    document.getElementById('hc-eu-result').classList.add('visible');
}

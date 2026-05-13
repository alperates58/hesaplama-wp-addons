function hcMerkurUyumHesapla() {
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
        score = 95;
        desc = "Aynı dili konuşuyorsunuz! Düşünce yapınız ve mantık yürütme şekliniz birbirine çok yakın. Saatlerce sohbet etseniz bile asla sıkılmazsınız.";
    } else if ((e1 === "Hava" && e2 === "Ateş") || (e1 === "Ateş" && e2 === "Hava")) {
        score = 90;
        desc = "Çok ilham verici ve hızlı bir iletişim. Biriniz fikir atıyor, diğeri onu geliştiriyor. Birlikteyken zihniniz sürekli aktif ve üretken.";
    } else if ((e1 === "Toprak" && e2 === "Su") || (e1 === "Su" && e2 === "Toprak")) {
        score = 88;
        desc = "Derin ve anlamlı bir iletişim bağı. Kelimelerden çok hislerle anlaşıyorsunuz. Birbirinizi dinleme ve anlama yeteneğiniz çok yüksek.";
    } else {
        score = 65;
        desc = "Düşünce hızlarınız farklı olabilir. Biriniz çok hızlı karar verirken diğeriniz her detayı incelemek isteyebilir. İletişimde 'netlik' sizin için anahtar kelime.";
    }

    let detailedContent = `
        <p><strong>Zihinsel Rezonans Analizi:</strong> ${desc}</p>
        <p><strong>İletişim Tarzınız:</strong> Merkür burcunuz ${sign1.toUpperCase()}, sizin ${e1 === "Ateş" ? "doğrudan ve dürüst" : e1 === "Toprak" ? "pratik ve sonuç odaklı" : e1 === "Hava" ? "meraklı ve analitik" : "sezgisel ve empatik"} bir iletişim diline sahip olduğunuzu gösteriyor.</p>
        <p><strong>2026 Bilgi Gündemi:</strong> 2026 yılında Merkür'ün hava burçlarındaki geçişi, sizin sosyal medya ve dijital iletişim alanındaki etkinliğinizi artıracak. Partnerinizle birlikte yeni bir dil öğrenmek veya bir kursa katılmak zihinsel bağınızı tazeleyecektir.</p>
        <p><strong>Tavsiye:</strong> İyi bir iletişimci olmanın ilk kuralı, iyi bir dinleyici olmaktır. Partnerinizin sessizliğini de anlamaya çalışın.</p>
    `;

    document.getElementById('hc-mu-value').innerText = `% ${score}`;
    document.getElementById('hc-mu-desc').innerHTML = detailedContent;
    document.getElementById('hc-mu-result').classList.add('visible');
}

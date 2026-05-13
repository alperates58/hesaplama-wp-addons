function hcArkadaslikUyumHesapla() {
    const sign1 = document.getElementById('hc-au-sign1').value;
    const sign2 = document.getElementById('hc-au-sign2').value;

    const signQualities = {
        "koc": "Ateş", "aslan": "Ateş", "yay": "Ateş",
        "boga": "Toprak", "basak": "Toprak", "oglak": "Toprak",
        "ikizler": "Hava", "terazi": "Hava", "kova": "Hava",
        "yengec": "Su", "akrep": "Su", "balik": "Su"
    };

    const element1 = signQualities[sign1];
    const element2 = signQualities[sign2];

    let score = 50;
    let desc = "";

    if (element1 === element2) {
        score = 90;
        desc = "Aynı dünyaların insanısınız! Birlikteyken kendinizi çok rahat hissediyorsunuz. Ortak ilgi alanlarınız ve benzer mizacınız sayesinde arkadaşlığınız çok uzun ömürlü olabilir.";
    } else if ((element1 === "Ateş" && element2 === "Hava") || (element1 === "Hava" && element2 === "Ateş")) {
        score = 95;
        desc = "Mükemmel bir sosyal ikili! Biriniz fikir üretiyor, diğeriniz harekete geçiyor. Birlikteyken çok eğlenir ve çevrenize enerji saçarsınız.";
    } else if ((element1 === "Toprak" && element2 === "Su") || (element1 === "Su" && element2 === "Toprak")) {
        score = 85;
        desc = "Birbirinize güven veren, dertleşebileceğiniz ve sadık bir arkadaşlık. Birbirinizin duygusal ihtiyaçlarını anlıyor ve destek oluyorsunuz.";
    } else {
        score = 65;
        desc = "Farklı bakış açılarına sahipsiniz ama bu arkadaşlık birbirinizi geliştirebilir. Birbirinizin eksik yanlarını tamamlıyorsunuz, ancak iletişimde daha sabırlı olmalısınız.";
    }

    let detailedContent = `
        <p><strong>Sosyal Sinerji:</strong> ${desc}</p>
        <p><strong>Birlikte Ne Yapmalısınız?</strong> ${element1} ve ${element2} elementlerinin birleşimi, sizin için en iyi aktivitenin 'yeni yerler keşfetmek' veya 'derin sohbetler etmek' olduğunu gösteriyor.</p>
        <p><strong>2026 Arkadaşlık Gündemi:</strong> 2026 yılı arkadaş gruplarında bazı testler getirebilir. Özellikle retro dönemlerinde birbirinize karşı daha anlayışlı olmanız gerekecek. Yaz aylarında birlikte yapacağınız bir tatil veya seyahat, bağlarınızı daha da güçlendirebilir.</p>
        <p><strong>Unutmayın:</strong> Arkadaşlıkta uyum, sadece burçlarla değil, paylaşılan anılar ve karşılıklı fedakarlıkla büyür.</p>
    `;

    document.getElementById('hc-au-value').innerText = `% ${score}`;
    document.getElementById('hc-au-desc').innerHTML = detailedContent;
    document.getElementById('hc-au-result').classList.add('visible');
}

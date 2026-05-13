function hcSaturnUyumHesapla() {
    const sign1 = document.getElementById('hc-su-sign1').value;
    const sign2 = document.getElementById('hc-su-sign2').value;

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
        desc = "Sorumluluk bilinciniz ve disiplin anlayışınız çok benzer. Zor zamanlarda birbirinize nasıl destek olacağınızı biliyorsunuz. İlişkinizde kurallar ve sınırlar konusunda doğal bir uzlaşı içindesiniz.";
    } else if ((e1 === "Toprak" && e2 === "Su") || (e1 === "Su" && e2 === "Toprak")) {
        score = 90;
        desc = "Duygusal ve maddi güvenlik arayışınız birbirini tamamlıyor. Biriniz yapıyı kurarken diğeri ona anlam katıyor. Uzun vadeli, sağlam temelli bir birliktelik potansiyeli.";
    } else if ((e1 === "Ateş" && e2 === "Hava") || (e1 === "Hava" && e2 === "Ateş")) {
        score = 80;
        desc = "Hayat sınavlarına karşı birlikte strateji geliştirebilen bir ikilisiniz. Biriniz ilham veriyor, diğeri o ilhamı disipline ediyor. Ancak kısıtlamalar konusunda birbirinize karşı daha esnek olmalısınız.";
    } else {
        score = 60;
        desc = "Disiplin ve ciddiyet anlayışınızda farklılıklar olabilir. Biriniz daha katı kurallara sahipken diğeri daha esnek olabilir. Ortak bir 'sorumluluk' dili geliştirmeniz gerekiyor.";
    }

    let detailedContent = `
        <p><strong>Sadakat ve Dayanıklılık Analizi:</strong> ${desc}</p>
        <p><strong>Sınavlarla Başa Çıkma:</strong> Satürn burcunuz ${sign1.toUpperCase()}, sizin hayatın zorlukları karşısında ${e1 === "Ateş" ? "savaşçı bir ruhla" : e1 === "Toprak" ? "sabırlı bir dirençle" : e1 === "Hava" ? "akılcı çözümlerle" : "duygusal bir derinlikle"} durduğunuzu gösteriyor.</p>
        <p><strong>2026 Satürn Gündemi:</strong> 2026 yılında Satürn'ün Koç burcuna geçişi, sizin ikili ilişkilerinizde 'yeniden yapılanma' dönemini başlatacak. Eski ve çalışmayan kalıpları yıkıp, daha dürüst ve sağlam bir temel kurmak için gökyüzü sizi destekliyor. Bu yıl birbirinize verdiğiniz sözlerin ağırlığı her zamankinden daha önemli olacak.</p>
        <p><strong>Tavsiye:</strong> Gerçek sevgi, sadece iyi günlerde değil, fırtınalarda da yan yana durabilmektir. Satürn'ün bilgeliğiyle ilişkinizi olgunlaştırın.</p>
    `;

    document.getElementById('hc-su-value').innerText = `% ${score}`;
    document.getElementById('hc-su-desc').innerHTML = detailedContent;
    document.getElementById('hc-su-result').classList.add('visible');
}

function hcAyUyumHesapla() {
    const sign1 = document.getElementById('hc-ayu-sign1').value;
    const sign2 = document.getElementById('hc-ayu-sign2').value;

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
        desc = "Duygusal dilleriniz tamamen aynı! Birbirinizin iç dünyasını en yalın haliyle anlıyor, aynı şeylerle huzur buluyorsunuz. Ev içindeki uyumunuz mükemmel olacaktır.";
    } else if ((e1 === "Su" && e2 === "Toprak") || (e1 === "Toprak" && e2 === "Su")) {
        score = 88;
        desc = "Birbirinizi duygusal olarak besleyen ve sağlamlaştıran bir bağ. Biri güven veriyor, diğeri şefkat gösteriyor. Çok huzurlu bir yaşam alanı kurabilirsiniz.";
    } else if ((e1 === "Ateş" && e2 === "Hava") || (e1 === "Hava" && e2 === "Ateş")) {
        score = 92;
        desc = "Duygusal dünyanız çok canlı ve paylaşımcı. Birbirinizin moralini yükseltiyor, heyecanınızı paylaşıyorsunuz. Birlikteyken kendinizi çok özgür hissedersiniz.";
    } else {
        score = 60;
        desc = "Duygusal tepkileriniz çok farklı olabilir. Biriniz içine kapanırken diğeriniz konuşmak isteyebilir. Birbirinizin 'güvenlik ihtiyacını' anlamak için empati kurmalısınız.";
    }

    let detailedContent = `
        <p><strong>Duygusal Sinerji Analizi:</strong> ${desc}</p>
        <p><strong>İçsel İhtiyaçlarınız:</strong> Ay burcunuz ${sign1.toUpperCase()}, sizin duygusal olarak 'güvende' hissetmek için ${e1 === "Su" ? "derin bağlara" : e1 === "Toprak" ? "maddi/fiziksel düzene" : e1 === "Ateş" ? "heyecan ve onaya" : "zihinsel paylaşıma"} ihtiyaç duyduğunuzu gösteriyor.</p>
        <p><strong>2026 Duygusal Gündemi:</strong> 2026 yılında Ay burcunuzu etkileyen tutulmalar, ev ve aile hayatınızda bazı dönüşümleri tetikleyebilir. Partnerinizle duygusal dürüstlük kurmak, bu süreci bir 'iyileşme' dönemine çevirecektir.</p>
        <p><strong>Tavsiye:</strong> Ay burcu uyumu, 'ev' olabilmekle ilgilidir. Birbirinizin en korunmasız hallerine sevgiyle ev sahipliği yapın.</p>
    `;

    document.getElementById('hc-ayu-value').innerText = `% ${score}`;
    document.getElementById('hc-ayu-desc').innerHTML = detailedContent;
    document.getElementById('hc-ayu-result').classList.add('visible');
}

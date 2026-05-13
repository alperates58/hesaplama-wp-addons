function hcRuhEsiUyumHesapla() {
    const sign1 = document.getElementById('hc-re-sign1').value;
    const sign2 = document.getElementById('hc-re-sign2').value;

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

    // Ruh eşi mantığı: Genelde tamamlayıcı elementler veya aynı element
    if (e1 === e2) {
        score = 88;
        desc = "Benzer frekanslarda titreşiyorsunuz. Birbirinizin ruhsal dilini konuşuyorsunuz. Hayata bakışınızdaki bu benzerlik, sessizce anlaşabilmenizi sağlıyor.";
    } else if ((e1 === "Su" && e2 === "Toprak") || (e1 === "Toprak" && e2 === "Su")) {
        score = 92;
        desc = "Ruhsal olarak birbirinizi besleyen, kadersel bir tamamlanma yaşıyorsunuz. Biriniz hayal kurarken diğeriniz o hayalleri somutlaştırmak için orada.";
    } else if ((e1 === "Ateş" && e2 === "Hava") || (elementMap[sign1] === "Hava" && elementMap[sign2] === "Ateş")) {
        score = 96;
        desc = "Birbirinizin ruhundaki ateşi ve vizyonu parlatan bir bağ. Birlikteyken kendinizi aşabilir, dünya üzerinde büyük etkiler bırakabilirsiniz.";
    } else {
        score = 75;
        desc = "Zıtlıkların çekimi ve kadersel öğretiler... Birbirinize bu hayatta en çok ihtiyaç duyduğunuz dersleri vermek için bir araya gelmiş olabilirsiniz.";
    }

    let detailedContent = `
        <p><strong>Kadersel Bağ Analizi:</strong> ${desc}</p>
        <p><strong>Ruh Eşi Belirtileri:</strong> Aranızdaki bağ sadece burç uyumu değil, birbirinizin gözlerine baktığınızda hissettiğiniz 'tanıdıklık' duygusuyla ilgilidir. Bu burç kombinasyonu, geçmiş yaşamlarınızdan gelen çözülmemiş temaları bu hayatta sevgiyle şifalandırmak için mükemmel bir fırsat sunuyor.</p>
        <p><strong>2026 Ruhsal Mesajı:</strong> 2026 yılında Neptün ve Plüton'un burç değiştirmesiyle birlikte, kadersel ilişkilerde 'uyanış' dönemi başlıyor. Partnerinizle birlikte spiritüel bir yolculuğa çıkmak, meditasyon yapmak veya ortak bir ideal uğruna çalışmak bağınızı ölümsüzleştirecektir.</p>
        <p><strong>Tavsiye:</strong> Ruh eşi olmak, sorunsuz bir ilişki demek değildir; birlikte büyümeye gönüllü olmak demektir. Birbirinizin 'gölge' yanlarını sevgiyle kucaklayın.</p>
    `;

    document.getElementById('hc-re-value').innerText = `% ${score}`;
    document.getElementById('hc-re-desc').innerHTML = detailedContent;
    document.getElementById('hc-re-result').classList.add('visible');
}

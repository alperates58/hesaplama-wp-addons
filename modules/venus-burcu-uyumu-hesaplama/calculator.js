function hcVenusUyumHesapla() {
    const sign1 = document.getElementById('hc-vu-sign1').value;
    const sign2 = document.getElementById('hc-vu-sign2').value;

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
        score = 92;
        desc = "Aşk dilleriniz aynı! Birbirinizin romantik beklentilerini ve estetik zevklerini çok iyi anlıyorsunuz. Birlikteyken kendinizi çok değerli ve seviliyor hissedersiniz.";
    } else if ((e1 === "Ateş" && e2 === "Hava") || (e1 === "Hava" && e2 === "Ateş")) {
        score = 96;
        desc = "İlham verici bir romantizm. Birbirinizin tutkusunu körüklüyor ve hayallerinizi paylaşıyorsunuz. Sosyal hayatta parlayan bir çiftsiniz.";
    } else if ((e1 === "Toprak" && e2 === "Su") || (e1 === "Su" && e2 === "Toprak")) {
        score = 88;
        desc = "Güvenli ve şefkatli bir aşk. Birbirinize olan bağlılığınız zamanla güçleniyor. Huzuru ve bereketi birlikte inşa edebilirsiniz.";
    } else {
        score = 65;
        desc = "Sevgi anlayışınız farklı olabilir. Biriniz daha somut adımlar beklerken diğeriniz daha özgürlükçü olabilir. Birbirinizin değer sistemini anlamaya çalışın.";
    }

    let detailedContent = `
        <p><strong>Romantik Sinerji Analizi:</strong> ${desc}</p>
        <p><strong>Aşk Diliniz:</strong> Venüs burcunuz ${sign1.toUpperCase()}, sizin aşkta özellikle ${e1 === "Ateş" ? "heyecan ve tutku" : e1 === "Toprak" ? "sadakat ve somut hediyeler" : e1 === "Hava" ? "zihinsel bağ ve flört" : "duygusal derinlik ve şefkat"} aradığınızı gösteriyor.</p>
        <p><strong>2026 Aşk Gündemi:</strong> 2026 yılında Venüs'ün geri hareketi (retro) dönemlerinde ilişkilerde 'eski temalar' gündeme gelebilir. Ancak Yaz aylarındaki Jüpiter desteği, romantik hayatınızda büyük bir genişleme ve mutluluk vaat ediyor. Partnerinizle ortak bir sanatsal hobi edinmek için harika bir yıl.</p>
        <p><strong>Tavsiye:</strong> Aşk, karşıdakini olduğu gibi kabul etmektir. Venüs'ün zarif enerjisini ilişkinize yansıtmak için nazik ve cömert olun.</p>
    `;

    document.getElementById('hc-vu-value').innerText = `% ${score}`;
    document.getElementById('hc-vu-desc').innerHTML = detailedContent;
    document.getElementById('hc-vu-result').classList.add('visible');
}

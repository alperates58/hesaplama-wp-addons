function hcKardesUyumHesapla() {
    const sign1 = document.getElementById('hc-ku-sign1').value;
    const sign2 = document.getElementById('hc-ku-sign2').value;

    const signTypes = {
        "koc": "Ateş", "aslan": "Ateş", "yay": "Ateş",
        "boga": "Toprak", "basak": "Toprak", "oglak": "Toprak",
        "ikizler": "Hava", "terazi": "Hava", "kova": "Hava",
        "yengec": "Su", "akrep": "Su", "balik": "Su"
    };

    const e1 = signTypes[sign1];
    const e2 = signTypes[sign2];

    let score = 50;
    let desc = "";

    if (e1 === e2) {
        score = 88;
        desc = "Birbirinizin en yakın arkadaşısınız! Aynı şeylere gülüyor, benzer oyunlardan keyif alıyorsunuz. Aranızdaki bağ hayat boyu sarsılmaz bir güven üzerine kurulu.";
    } else if ((e1 === "Ateş" && e2 === "Hava") || (e1 === "Hava" && e2 === "Ateş")) {
        score = 94;
        desc = "Çok dinamik ve yaratıcı bir kardeşlik. Birlikteyken asla sıkılmazsınız. Birbirinizin ufkunu açan, sürekli yeni maceralara atılan bir ikilisiniz.";
    } else if ((e1 === "Toprak" && e2 === "Su") || (e1 === "Su" && e2 === "Toprak")) {
        score = 86;
        desc = "Duygusal olarak birbirinize çok bağlısınız. Zor zamanlarda birbirinizin limanı oluyor, her zaman birbirinizi kolluyorsunuz.";
    } else {
        score = 65;
        desc = "Zıt kutuplar birbirini çeker! Karakterleriniz çok farklı olsa da bu durum birbirinizi tamamlamanızı sağlıyor. Küçük rekabetler aranızdaki sevgiyi besleyen birer oyun gibi.";
    }

    let detailedContent = `
        <p><strong>Kardeşlik Dinamiği:</strong> ${desc}</p>
        <p><strong>Birlikte Gelişim:</strong> ${sign1.toUpperCase()} ve ${sign2.toUpperCase()} kombinasyonu, aile içinde hem dengeyi hem de neşeyi temsil eder. ${e1 === e2 ? "Ortak hobiler" : "Farklı yeteneklerin birleşimi"} sizi sosyal hayatınızda da güçlü bir ekip yapacaktır.</p>
        <p><strong>2026 Kardeşlik Mesajı:</strong> 2026 yılı kardeşler arasında 'paylaşım' ve 'ortak seyahat' temalarını vurguluyor. Bu yıl birlikte yapacağınız bir gezi veya ortak bir hobi, aranızdaki buzları eritebilir veya bağı daha da güçlendirebilir.</p>
        <p><strong>Tavsiye:</strong> Birbirinizin farklılıklarına saygı duymak, kardeşlik bağınızı her türlü fırtınada ayakta tutacak tek şeydir.</p>
    `;

    document.getElementById('hc-ku-value').innerText = `% ${score}`;
    document.getElementById('hc-ku-desc').innerHTML = detailedContent;
    document.getElementById('hc-ku-result').classList.add('visible');
}

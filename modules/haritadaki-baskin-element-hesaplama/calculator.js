function hcBaskinElementHesapla() {
    const weights = {
        sun: document.getElementById('hc-he-sun').value,
        moon: document.getElementById('hc-he-moon').value,
        asc: document.getElementById('hc-he-asc').value,
        mercury: document.getElementById('hc-he-mercury').value,
        venus: document.getElementById('hc-he-venus').value,
        mars: document.getElementById('hc-he-mars').value
    };

    const elementPoints = { "Ateş": 0, "Toprak": 0, "Hava": 0, "Su": 0 };

    const signToElement = {
        "koc": "Ateş", "aslan": "Ateş", "yay": "Ateş",
        "boga": "Toprak", "basak": "Toprak", "oglak": "Toprak",
        "ikizler": "Hava", "terazi": "Hava", "kova": "Hava",
        "yengec": "Su", "akrep": "Su", "balik": "Su"
    };

    function addPoints(sign, p) {
        const element = signToElement[sign];
        elementPoints[element] += p;
    }

    addPoints(weights.sun, 3);
    addPoints(weights.moon, 3);
    addPoints(weights.asc, 3);
    addPoints(weights.mercury, 1);
    addPoints(weights.venus, 1);
    addPoints(weights.mars, 1);

    let dominantElement = "";
    let maxP = -1;
    for (let el in elementPoints) {
        if (elementPoints[el] > maxP) {
            maxP = elementPoints[el];
            dominantElement = el;
        }
    }

    let elementDesc = {
        "Ateş": "Hareketli, cesur, inisiyatif alan ve coşkulu bir mizaç. Hayata karşı tutkulusunuz.",
        "Toprak": "Pratik, sabırlı, güvenilir ve somut sonuçlara odaklanan bir mizaç. Ayaklarınız yere sağlam basıyor.",
        "Hava": "Zihinsel, sosyal, meraklı ve iletişim odaklı bir mizaç. Bilgi ve fikirler sizin için en değerli hazinedir.",
        "Su": "Sezgisel, empatik, derin ve duygusal bir mizaç. Çevrenizdeki enerjileri ve duyguları çok iyi anlıyorsunuz."
    };

    let detailedDesc = `
        <p><strong>Baskın Element Analizi:</strong> Haritanızda en yoğun element <strong>${dominantElement}</strong> olarak belirlendi.</p>
        <p><strong>Mizaç Özellikleriniz:</strong> ${elementDesc[dominantElement]}</p>
        <p><strong>Element Dengesi:</strong> Haritadaki element dengesi, hayata verdiğimiz genel tepkileri belirler. Örneğin baskın elementiniz ${dominantElement} ise, kriz anlarında veya yeni bir işe başlarken bu elementin doğasına uygun davranırsınız.</p>
        <p><strong>2026 Tavsiyesi:</strong> 2026 yılında gökyüzü enerjileri daha çok 'Hava ve Ateş' odaklı olacak. Eğer baskın elementiniz ${dominantElement} ise, bu yılın enerjisine uyum sağlamak için ${dominantElement === 'Su' || dominantElement === 'Toprak' ? 'daha esnek ve hareketli olmaya çalışın' : 'enerjinizi daha verimli kullanın'}.</p>
        <p><strong>Not:</strong> Eksik olan elementlerinizi, partneriniz veya yakın arkadaşlarınız üzerinden tamamlayabilirsiniz. Bu 'elementer çekim' ilişkilerinizdeki dengeyi açıklar.</p>
    `;

    document.getElementById('hc-he-value').innerText = dominantElement;
    document.getElementById('hc-he-desc').innerHTML = detailedDesc;
    document.getElementById('hc-he-result').classList.add('visible');
}

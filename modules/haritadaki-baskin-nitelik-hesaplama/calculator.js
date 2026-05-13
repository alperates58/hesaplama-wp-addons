function hcBaskinNitelikHesapla() {
    const weights = {
        sun: document.getElementById('hc-hn-sun').value,
        moon: document.getElementById('hc-hn-moon').value,
        asc: document.getElementById('hc-hn-asc').value,
        mercury: document.getElementById('hc-hn-mercury').value,
        venus: document.getElementById('hc-hn-venus').value,
        mars: document.getElementById('hc-hn-mars').value
    };

    const modalityPoints = { "Öncü": 0, "Sabit": 0, "Değişken": 0 };

    const signToModality = {
        "koc": "Öncü", "yengec": "Öncü", "terazi": "Öncü", "oglak": "Öncü",
        "boga": "Sabit", "aslan": "Sabit", "akrep": "Sabit", "kova": "Sabit",
        "ikizler": "Değişken", "basak": "Değişken", "yay": "Değişken", "balik": "Değişken"
    };

    function addPoints(sign, p) {
        const modality = signToModality[sign];
        modalityPoints[modality] += p;
    }

    addPoints(weights.sun, 3);
    addPoints(weights.moon, 3);
    addPoints(weights.asc, 3);
    addPoints(weights.mercury, 1);
    addPoints(weights.venus, 1);
    addPoints(weights.mars, 1);

    let dominantModality = "";
    let maxP = -1;
    for (let mod in modalityPoints) {
        if (modalityPoints[mod] > maxP) {
            maxP = modalityPoints[mod];
            dominantModality = mod;
        }
    }

    let modalityDesc = {
        "Öncü": "Liderlik etmeyi, yeni projelere başlamayı ve inisiyatif almayı seven bir yapı. Hayatı başlatan ve yön veren sizsiniz.",
        "Sabit": "İstikrarlı, kararlı, başladığı işi bitiren ve değerlerini koruyan bir yapı. Sarsılmaz bir azme ve dayanıklılığa sahipsiniz.",
        "Değişken": "Esnek, uyumlu, çok yönlü ve değişimden beslenen bir yapı. Şartlara hızla ayak uydurabilir ve her durumu idare edebilirsiniz."
    };

    let detailedDesc = `
        <p><strong>Baskın Nitelik Analizi:</strong> Haritanızda en yoğun nitelik <strong>${dominantModality}</strong> olarak belirlendi.</p>
        <p><strong>Eylem Tarzınız:</strong> ${modalityDesc[dominantModality]}</p>
        <p><strong>Karakter Dinamiği:</strong> Baskın niteliğiniz, olaylar karşısındaki ilk tepkinizi belirler. ${dominantModality === 'Öncü' ? 'Yeni bir şeyleri tetiklemek sizin doğanızda var.' : dominantModality === 'Sabit' ? 'Bir şeyi sürdürmek ve sağlamlaştırmak sizin en güçlü yanınız.' : 'Sürekli yenilenmek ve akışa uymak sizi hayatta tutan şey.'}</p>
        <p><strong>2026 Tavsiyesi:</strong> 2026 yılındaki gökyüzü hareketleri, özellikle ${dominantModality === 'Değişken' ? 'çok yönlü yeteneklerinizi kullanmanızı' : dominantModality === 'Öncü' ? 'yeni iş girişimlerinde bulunmanızı' : 'mevcut kazanımlarınızı korumanızı'} destekliyor. Bu yıl karakterinizin bu baskın yönünü profesyonel hayatta bir strateji olarak kullanın.</p>
        <p><strong>Not:</strong> Eksik olan niteliğinizi tamamlamak için o niteliğe sahip kişilerle ekip kurmak, hayat başarınızı artıracaktır.</p>
    `;

    document.getElementById('hc-hn-value').innerText = dominantModality;
    document.getElementById('hc-hn-desc').innerHTML = detailedDesc;
    document.getElementById('hc-hn-result').classList.add('visible');
}

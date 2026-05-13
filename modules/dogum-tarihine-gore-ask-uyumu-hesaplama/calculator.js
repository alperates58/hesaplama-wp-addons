function hcAskDtUyumHesapla() {
    const d1 = document.getElementById('hc-adt-date1').value;
    const d2 = document.getElementById('hc-adt-date2').value;

    if (!d1 || !d2) {
        alert('Lütfen her iki tarihi de giriniz.');
        return;
    }

    function getSign(dateStr) {
        const date = new Date(dateStr);
        const m = date.getMonth() + 1;
        const d = date.getDate();
        if ((m == 3 && d >= 21) || (m == 4 && d <= 19)) return "Koç";
        if ((m == 4 && d >= 20) || (m == 5 && d <= 20)) return "Boğa";
        if ((m == 5 && d >= 21) || (m == 6 && d <= 20)) return "İkizler";
        if ((m == 6 && d >= 21) || (m == 7 && d <= 22)) return "Yengeç";
        if ((m == 7 && d >= 23) || (m == 8 && d <= 22)) return "Aslan";
        if ((m == 8 && d >= 23) || (m == 9 && d <= 22)) return "Başak";
        if ((m == 9 && d >= 23) || (m == 10 && d <= 22)) return "Terazi";
        if ((m == 10 && d >= 23) || (m == 11 && d <= 21)) return "Akrep";
        if ((m == 11 && d >= 22) || (m == 12 && d <= 21)) return "Yay";
        if ((m == 12 && d >= 22) || (m == 1 && d <= 19)) return "Oğlak";
        if ((m == 1 && d >= 20) || (m == 2 && d <= 18)) return "Kova";
        return "Balık";
    }

    const sign1 = getSign(d1);
    const sign2 = getSign(d2);

    const elements = {
        "Koç": "Ateş", "Aslan": "Ateş", "Yay": "Ateş",
        "Boğa": "Toprak", "Başak": "Toprak", "Oğlak": "Toprak",
        "İkizler": "Hava", "Terazi": "Hava", "Kova": "Hava",
        "Yengeç": "Su", "Akrep": "Su", "Balık": "Su"
    };

    const e1 = elements[sign1];
    const e2 = elements[sign2];

    let score = 70;
    let text = "";

    if (e1 === e2) {
        score = 90;
        text = "Ruhsal frekanslarınız o kadar benzer ki, birbirinizi kelimeler olmadan anlayabiliyorsunuz. Romantizm sizin için doğal bir akış.";
    } else if ((e1 === "Ateş" && e2 === "Hava") || (e1 === "Hava" && e2 === "Ateş")) {
        score = 95;
        text = "Tutku ve ilhamın dansı! İlişkiniz sürekli yenilenen bir enerjiye sahip. Birlikteyken çok yaratıcı ve mutlusunuz.";
    } else if ((e1 === "Toprak" && e2 === "Su") || (e1 === "Su" && e2 === "Toprak")) {
        score = 85;
        text = "Sakin, derin ve güven veren bir aşk. Birbirinizin duygusal yaralarını sarabilir ve çok sağlam bir gelecek kurabilirsiniz.";
    } else {
        score = 60;
        text = "Farklı dünyaların çekimi... Aranızdaki zıtlıklar başta çekici gelse de, uzun vadede birbirinizin dilini öğrenmek için emek vermelisiniz.";
    }

    let detailedContent = `
        <p><strong>Aşk Analizi:</strong> ${sign1} ve ${sign2} birlikteliği, gökyüzünde ilginç bir sinerji yaratıyor. ${text}</p>
        <p><strong>2026 Romantizm Notu:</strong> 2026 yılındaki Venüs geçişleri, sizin ilişkinizde 'dürüstlük' ve 'ortak hayaller' temasını ön plana çıkaracak. Bahar aylarında ilişkinizde yeni bir sayfa açılabilir.</p>
        <p><strong>İpucu:</strong> Birbirinizin farklılıklarını birer zenginlik olarak görün. Aşk, benzerliklerden ziyade farklılıkların uyumudur.</p>
    `;

    document.getElementById('hc-adt-value').innerText = `% ${score}`;
    document.getElementById('hc-adt-desc').innerHTML = detailedContent;
    document.getElementById('hc-adt-result').classList.add('visible');
}

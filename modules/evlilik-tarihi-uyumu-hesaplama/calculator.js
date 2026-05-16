/**
 * Evlilik Tarihi Uyumu Hesaplama
 */

function hcEvlilikTarihiUyumuHesapla() {
    const wDateStr = document.getElementById('hc-wedding-date').value;
    const p1Birth = document.getElementById('hc-w-p1-birth').value;
    const p2Birth = document.getElementById('hc-w-p2-birth').value;

    if (!wDateStr || !p1Birth || !p2Birth) {
        alert("Lütfen tüm tarihleri doldurun.");
        return;
    }

    const wDate = new Date(wDateStr);
    const year = wDate.getFullYear();
    const month = wDate.getMonth() + 1;
    const day = wDate.getDate();

    let score = 75; // Başlangıç puanı
    let alerts = [];

    // 2026 Retrograde Kontrolleri (Önemli)
    if (year === 2026) {
        // Merkür Retroları 2026
        if ((month === 2 && day >= 25) || (month === 3 && day <= 20)) alerts.push("Merkür Retrosu: İmzalar ve iletişimde aksaklıklar olabilir.");
        if ((month === 6 && day >= 29) || (month === 7 && day <= 23)) alerts.push("Merkür Retrosu: Evrak işlerinde dikkatli olunmalı.");
        if ((month === 10 && day >= 24) || (month === 11 && day <= 13)) alerts.push("Merkür Retrosu: Planlarda son dakika değişiklikleri olabilir.");

        // Venüs Retrosu 2026 (Aşk ve Evlilik için en kritik olan)
        // 2026'da Venüs Retrosu: 3 Ekim - 14 Kasım
        if ((month === 10 && day >= 3) || (month === 11 && day <= 14)) {
            score -= 30;
            alerts.push("<strong>Kritik: Venüs Retrosu!</strong> Evlilik ve aşk gezegeni retrodayken evlenmek önerilmez.");
        }
        
        // Mars Retrosu 2026 (Aksiyon ve Tutku)
        // 2026 sonu Mars retrosu başlar
        if (month === 12 && day >= 10) alerts.push("Mars Retrosu: Enerji ve motivasyon düşük olabilir.");
    }

    // Numerolojik Uyum (Günün Sayısı)
    const getNum = (d) => {
        let s = d.replace(/-/g, '');
        let sum = s.split('').reduce((a, b) => parseInt(a) + parseInt(b), 0);
        while (sum > 9) sum = sum.toString().split('').reduce((a, b) => parseInt(a) + parseInt(b), 0);
        return sum;
    };

    const wNum = getNum(wDateStr);
    if (wNum === 6) {
        score += 15;
        alerts.push("Günün Sayısı 6: Evlilik ve aile için en şanslı sayı!");
    } else if (wNum === 2 || wNum === 9) {
        score += 10;
        alerts.push(`Günün Sayısı ${wNum}: Duygusal derinlik ve tamamlanma vaat ediyor.`);
    }

    if (score > 100) score = 100;
    if (score < 0) score = 0;

    document.getElementById('hc-wedding-score').innerText = "%" + score;

    let html = "<h4>Analiz Detayları</h4>";
    if (alerts.length > 0) {
        html += "<ul>" + alerts.map(a => `<li>${a}</li>`).join('') + "</ul>";
    } else {
        html += "<p>Seçilen tarihte büyük bir astrolojik engel bulunmuyor. Genel enerjiler olumlu.</p>";
    }

    html += `<div class="hc-wedding-tip"><strong>Tavsiye:</strong> Evlilik gününün numerolojik değeri ${wNum}. Bu sayı ilişkinizin temel enerjisini yansıtacaktır.</div>`;

    document.getElementById('hc-wedding-analysis').innerHTML = html;
    document.getElementById('hc-evlilik-tarihi-uyumu-result').classList.add('visible');
}

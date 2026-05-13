function hcBurcDereceHesapla() {
    const birthdate = document.getElementById('hc-bder-birthdate').value;
    if (!birthdate) {
        alert('Lütfen doğum tarihinizi giriniz.');
        return;
    }

    const date = new Date(birthdate);
    const month = date.getMonth() + 1;
    const day = date.getDate();

    const signs = [
        { name: "Koç", start: [3, 21], end: [4, 19] },
        { name: "Boğa", start: [4, 20], end: [5, 20] },
        { name: "İkizler", start: [5, 21], end: [6, 20] },
        { name: "Yengeç", start: [6, 21], end: [7, 22] },
        { name: "Aslan", start: [7, 23], end: [8, 22] },
        { name: "Başak", start: [8, 23], end: [9, 22] },
        { name: "Terazi", start: [9, 23], end: [10, 22] },
        { name: "Akrep", start: [10, 23], end: [11, 21] },
        { name: "Yay", start: [11, 22], end: [12, 21] },
        { name: "Oğlak", start: [12, 22], end: [1, 19] },
        { name: "Kova", start: [1, 20], end: [2, 18] },
        { name: "Balık", start: [2, 19], end: [3, 20] }
    ];

    let currentSign = null;
    for (const sign of signs) {
        if ((month === sign.start[0] && day >= sign.start[1]) || (month === sign.end[0] && day <= sign.end[1])) {
            currentSign = sign;
            break;
        }
    }
    if (!currentSign) currentSign = signs[11];

    const startDate = new Date(date.getFullYear(), currentSign.start[0] - 1, currentSign.start[1]);
    if (date < startDate) startDate.setFullYear(startDate.getFullYear() - 1);
    
    // Basitleştirilmiş derece: her gün yaklaşık 1 derece
    const diffDays = Math.floor((date - startDate) / (1000 * 60 * 60 * 24));
    let degree = diffDays % 30;

    let degreeType = "Normal Derece";
    let degreeDesc = "Burcun genel enerjisini dengeyle taşıyorsunuz.";

    if (degree === 0) {
        degreeType = "Kritik Derece (0°)";
        degreeDesc = "Bir burcun 0 derecesi, o burcun enerjisinin en taze, en saf ve en ham halini temsil eder. Yeni başlangıçlar yapma potansiyeliniz çok yüksektir.";
    } else if (degree === 29) {
        degreeType = "Anaretik Derece (29°)";
        degreeDesc = "29 derece bir burcun son derecesidir ve 'Kriz Derecesi' olarak bilinir. Bu derece, o burcun tüm derslerini tamamlamış ama bir sonraki aşamaya geçmek için sabırsızlanan bir enerjiyi temsil eder. Hayatınızda ani bitişler ve başlangıçlar sık görülebilir.";
    } else if ([13, 26].includes(degree) && ["Koç", "Yengeç", "Terazi", "Oğlak"].includes(currentSign.name)) {
        degreeType = "Kritik Derece";
        degreeDesc = "Öncü burçlar için 13 ve 26 dereceler ekstra hassasiyet ve güç ifade eder.";
    }

    let detailedDesc = `
        <p><strong>Derece Tipi:</strong> ${degreeType}</p>
        <p><strong>Astrolojik Yorum:</strong> ${degreeDesc}</p>
        <p><strong>Detaylı Analiz:</strong> Burç dereceniz olan ${degree}°, Güneş'inizin o burçtaki seyahatinde ne kadar yol kat ettiğini gösterir. İlk derecelerdeki Güneş (0-10°), burcun özelliklerini yeni öğrenen ve heyecanla uygulayan bir enerjidir. Orta dereceler (10-20°), burcun özelliklerini en olgun ve verimli haliyle kullanır. Son dereceler (20-29°) ise burcun tüm bilgeliğini toplamış ama artık bir sonraki burca geçmeye hazırlanan, bazen yorgun ama çok deneyimli bir enerjidir.</p>
        <p>2026 yılındaki gezegen geçişleri, sizin bu tam derecenizle açılar yaptıkça hayatınızda önemli kırılma noktaları oluşturacaktır. Özellikle 2026'daki tutulmaların bu dereceye yakın olması, kadersel değişimleri tetikleyebilir.</p>
    `;

    document.getElementById('hc-bder-value').innerText = `${degree}° ${currentSign.name}`;
    document.getElementById('hc-bder-desc').innerHTML = detailedDesc;
    document.getElementById('hc-bder-result').classList.add('visible');
}

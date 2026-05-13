function hcBurcDekanHesapla() {
    const birthdate = document.getElementById('hc-bd-birthdate').value;
    if (!birthdate) {
        alert('Lütfen doğum tarihinizi giriniz.');
        return;
    }

    const date = new Date(birthdate);
    const month = date.getMonth() + 1;
    const day = date.getDate();

    const signs = [
        { name: "Koç", start: [3, 21], end: [4, 19], rulers: ["Mars", "Güneş", "Jüpiter"] },
        { name: "Boğa", start: [4, 20], end: [5, 20], rulers: ["Venüs", "Merkür", "Satürn"] },
        { name: "İkizler", start: [5, 21], end: [6, 20], rulers: ["Merkür", "Venüs", "Uranüs"] },
        { name: "Yengeç", start: [6, 21], end: [7, 22], rulers: ["Ay", "Plüton", "Neptün"] },
        { name: "Aslan", start: [7, 23], end: [8, 22], rulers: ["Güneş", "Jüpiter", "Mars"] },
        { name: "Başak", start: [8, 23], end: [9, 22], rulers: ["Merkür", "Satürn", "Venüs"] },
        { name: "Terazi", start: [9, 23], end: [10, 22], rulers: ["Venüs", "Uranüs", "Merkür"] },
        { name: "Akrep", start: [10, 23], end: [11, 21], rulers: ["Plüton", "Neptün", "Ay"] },
        { name: "Yay", start: [11, 22], end: [12, 21], rulers: ["Jüpiter", "Mars", "Güneş"] },
        { name: "Oğlak", start: [12, 22], end: [1, 19], rulers: ["Satürn", "Venüs", "Merkür"] },
        { name: "Kova", start: [1, 20], end: [2, 18], rulers: ["Uranüs", "Merkür", "Venüs"] },
        { name: "Balık", start: [2, 19], end: [3, 20], rulers: ["Neptün", "Ay", "Plüton"] }
    ];

    let currentSign = null;
    for (const sign of signs) {
        const startMonth = sign.start[0];
        const startDay = sign.start[1];
        const endMonth = sign.end[0];
        const endDay = sign.end[1];

        if ((month === startMonth && day >= startDay) || (month === endMonth && day <= endDay)) {
            currentSign = sign;
            break;
        }
    }

    if (!currentSign) {
        // Balık-Koç sınırı için özel durum
        currentSign = signs[11];
    }

    // Derece tahmini (Basitleştirilmiş: Burcun ilk gününden itibaren kaçıncı gün)
    const startDate = new Date(date.getFullYear(), currentSign.start[0] - 1, currentSign.start[1]);
    if (date < startDate) startDate.setFullYear(startDate.getFullYear() - 1);
    
    const diffDays = Math.floor((date - startDate) / (1000 * 60 * 60 * 24));
    let dekanIndex = 0;
    if (diffDays >= 10 && diffDays < 20) dekanIndex = 1;
    else if (diffDays >= 20) dekanIndex = 2;

    const dekanValue = dekanIndex + 1;
    const subRuler = currentSign.rulers[dekanIndex];

    const dekanTexts = {
        1: "1. Dekan: Saf Enerji. Burcun temel özelliklerini en saf ve yoğun haliyle taşırsınız.",
        2: "2. Dekan: Karmaşık Yapı. Burcun özelliklerine alt yöneticinin getirdiği farklı bir derinlik eklenir.",
        3: "3. Dekan: Ruhsal Olgunluk. Burcun enerjisini daha vizyoner ve deneyimli bir boyutta yaşarsınız."
    };

    let detailedDesc = `
        <p><strong>${dekanTexts[dekanValue]}</strong></p>
        <p><strong>Alt Yönetici Gezegeniniz:</strong> ${subRuler}</p>
        <p><strong>Analiz:</strong> ${currentSign.name} burcunun ${dekanValue}. dekanında doğmuş olmanız, karakterinize ${subRuler} gezegeninin etkilerini de katar. Örneğin, bir Koç burcu olup 2. dekanda doğduysanız (Güneş etkisi), normal bir Koç'tan daha asil, gururlu ve yaratıcı bir yapıya sahip olabilirsiniz.</p>
        <p>Dekanlar, 'neden aynı burçtaki insanlar birbirine benzemiyor?' sorusunun cevabıdır. Sizin dekanınız, yeteneklerinizi hangi alanda daha etkili kullanabileceğinizi gösterir. ${subRuler} gezegeninin haritanızdaki konumu, sizin hayat amacınızı gerçekleştirmenizdeki en büyük yardımcınız olacaktır.</p>
        <p>2026 yılı projeksiyonlarına göre, alt yöneticiniz ${subRuler}'ın gökyüzündeki hareketleri, sizin dekanınıza özel şanslı veya zorlayıcı dönemleri belirleyecektir. Bu yıl özellikle kişisel disiplin ve özgünlük temaları hayatınızda ön planda olacak.</p>
    `;

    document.getElementById('hc-bd-value').innerText = `${currentSign.name} - ${dekanValue}. Dekan`;
    document.getElementById('hc-bd-desc').innerHTML = detailedDesc;
    document.getElementById('hc-bd-result').classList.add('visible');
}

function hcCinElementUyumuHesapla() {
    const y1 = parseInt(document.getElementById('hc-ceu-year1').value);
    const y2 = parseInt(document.getElementById('hc-ceu-year2').value);

    if (!y1 || !y2) {
        alert('Lütfen her iki doğum yılını da girin.');
        return;
    }

    const getElement = (year) => {
        const lastDigit = year % 10;
        if (lastDigit === 0 || lastDigit === 1) return { name: "Metal", id: "metal" };
        if (lastDigit === 2 || lastDigit === 3) return { name: "Su", id: "water" };
        if (lastDigit === 4 || lastDigit === 5) return { name: "Ağaç", id: "wood" };
        if (lastDigit === 6 || lastDigit === 7) return { name: "Ateş", id: "fire" };
        if (lastDigit === 8 || lastDigit === 9) return { name: "Toprak", id: "earth" };
    };

    const e1 = getElement(y1);
    const e2 = getElement(y2);

    const relations = {
        wood: { feeds: "fire", destroyedBy: "metal", destroys: "earth" },
        fire: { feeds: "earth", destroyedBy: "water", destroys: "metal" },
        earth: { feeds: "metal", destroyedBy: "wood", destroys: "water" },
        metal: { feeds: "water", destroyedBy: "fire", destroys: "wood" },
        water: { feeds: "wood", destroyedBy: "metal", destroys: "fire" }
    };

    let resultText = `<p>1. Kişi: <strong>${e1.name}</strong> elementi.</p>`;
    resultText += `<p>2. Kişi: <strong>${e2.name}</strong> elementi.</p>`;
    resultText += `<hr>`;

    if (e1.id === e2.id) {
        resultText += `<p><strong>Uyum: Dengeli ve Güçlü.</strong> İkiniz de aynı elemente sahipsiniz. Bu durum birbirinizi çok iyi anlamanızı sağlar ancak bazen rekabet veya durağanlık yaratabilir.</p>`;
    } else if (relations[e1.id].feeds === e2.id) {
        resultText += `<p><strong>Uyum: Besleyici (Mükemmel).</strong> 1. kişi (${e1.name}), 2. kişiyi (${e2.name}) besliyor ve destekliyor. Bu çok uyumlu ve verimli bir ilişkidir.</p>`;
    } else if (relations[e2.id].feeds === e1.id) {
        resultText += `<p><strong>Uyum: Destekleyici (Mükemmel).</strong> 2. kişi (${e2.name}), 1. kişiyi (${e1.name}) besliyor ve canlandırıyor. Birbirinizi tamamlayan harika bir ikilisiniz.</p>`;
    } else if (relations[e1.id].destroys === e2.id) {
        resultText += `<p><strong>Uyum: Zorlayıcı.</strong> 1. kişi (${e1.name}), 2. kişiyi (${e2.name}) baskılayabilir. Bu ilişkide dengeyi bulmak için daha fazla çaba ve anlayış gerekir.</p>`;
    } else if (relations[e2.id].destroys === e1.id) {
        resultText += `<p><strong>Uyum: Kontrolcü.</strong> 2. kişi (${e2.name}), 1. kişiyi (${e1.name}) denetliyor veya sınırlıyor olabilir. Sabır ve açık iletişim anahtardır.</p>`;
    } else {
        resultText += `<p><strong>Uyum: Nötr / Dolaylı.</strong> Elementleriniz arasında doğrudan bir çatışma veya besleme döngüsü yok. İlişkiniz kendi dinamiklerinizle şekillenecektir.</p>`;
    }

    document.getElementById('hc-ceu-content').innerHTML = resultText;
    document.getElementById('hc-cin-element-uyum-result').classList.add('visible');
}

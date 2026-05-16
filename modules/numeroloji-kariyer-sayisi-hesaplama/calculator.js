function hcCareerNumberHesapla() {
    const name = document.getElementById('hc-cn-name').value.trim().toUpperCase();

    if (!name) {
        alert('Lütfen tam adınızı girin.');
        return;
    }

    const charMap = {
        'A': 1, 'J': 1, 'S': 1, 'Ş': 1,
        'B': 2, 'K': 2, 'T': 2,
        'C': 3, 'Ç': 3, 'L': 3, 'U': 3, 'Ü': 3,
        'D': 4, 'M': 4, 'V': 4,
        'E': 5, 'N': 5, 'W': 5,
        'F': 6, 'O': 6, 'Ö': 6, 'X': 6,
        'G': 7, 'Ğ': 7, 'P': 7, 'Y': 7,
        'H': 8, 'Q': 8, 'Z': 8,
        'I': 9, 'İ': 9, 'R': 9
    };

    function sumDigits(num) {
        let sum = 0;
        while (num > 0 || sum > 9) {
            if (num === 0) { num = sum; sum = 0; }
            sum += num % 10;
            num = Math.floor(num / 10);
        }
        return sum;
    }

    let total = 0;
    for (let char of name) {
        if (charMap[char]) total += charMap[char];
    }

    const careerNumber = sumDigits(total);

    const careerDescriptions = {
        1: "Liderlik, girişimcilik, yöneticilik. Kendi işini kurmak veya bağımsız projeler yönetmek.",
        2: "Diplomasi, danışmanlık, halkla ilişkiler. Ekip çalışması gerektiren hassas roller.",
        3: "Yazarlık, tasarım, sahne sanatları, pazarlama. Yaratıcı ifade gerektiren işler.",
        4: "Mühendislik, mimarlık, bankacılık, veri analizi. Düzen ve sistem kurma işleri.",
        5: "Satış, seyahat, medya, etkinlik yönetimi. Hareket ve dinamizm içeren roller.",
        6: "Eğitim, sağlık, insan kaynakları, sanat yönetimi. Hizmet ve sorumluluk odaklı işler.",
        7: "Araştırma, bilim, teknoloji, felsefe. Analiz ve derin uzmanlık gerektiren alanlar.",
        8: "Finans, hukuk, gayrimenkul, büyük ölçekli yönetim. Güç ve organizasyon gerektiren roller.",
        9: "İnsani yardım, küresel iletişim, sanat, şifa. Evrensel fayda sağlayan meslekler."
    };

    document.getElementById('hc-res-cn-val').innerText = careerNumber;
    document.getElementById('hc-res-cn-desc').innerText = careerDescriptions[careerNumber] || "";
    document.getElementById('hc-numeroloji-kariyer-sayisi-hesaplama-result').classList.add('visible');
}

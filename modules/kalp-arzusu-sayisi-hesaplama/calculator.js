function hcSoulUrgeNumberHesapla() {
    const name = document.getElementById('hc-sun-name').value.trim().toUpperCase();

    if (!name) {
        alert('Lütfen tam adınızı girin.');
        return;
    }

    const vowels = "AEIİOÖUÜ";
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
            if (num === 0) {
                num = sum;
                sum = 0;
            }
            sum += num % 10;
            num = Math.floor(num / 10);
        }
        return sum;
    }

    let soulUrgeSum = 0;
    for (let char of name) {
        if (vowels.includes(char) && charMap[char]) {
            soulUrgeSum += charMap[char];
        }
    }

    let soulUrgeNumber = sumDigits(soulUrgeSum);

    const descriptions = {
        1: "Ruhunuz bağımsızlık, özgünlük ve liderlik için yanıp tutuşuyor. Kendi yolunuzu çizmek istersiniz.",
        2: "Ruhunuz huzur, sevgi ve uyum arayışında. Başkalarıyla derin bağlar kurmak en büyük arzunuz.",
        3: "Ruhunuz yaratıcılık, neşe ve kendini ifade etme ihtiyacı duyuyor. Hayatı kutlamak istersiniz.",
        4: "Ruhunuz güvenlik, düzen ve kalıcılık istiyor. Sağlam bir temel üzerine hayat kurmak istersiniz.",
        5: "Ruhunuz macera, değişim ve özgürlük için can atıyor. Deneyimlemek ve keşfetmek istersiniz.",
        6: "Ruhunuz sevmek, sevilmek ve hizmet etmek istiyor. Aile ve toplumsal uyum en büyük önceliğiniz.",
        7: "Ruhunuz bilgelik, sessizlik ve hakikati bulma peşinde. Hayatın anlamını sorgulamak istersiniz.",
        8: "Ruhunuz güç, başarı ve maddi kontrol arzusu taşıyor. Büyük işler başarmak ve yönetmek istersiniz.",
        9: "Ruhunuz evrensel sevgi, merhamet ve yardım etme isteğiyle dolu. Dünyayı güzelleştirmek istersiniz."
    };

    document.getElementById('hc-res-sun-val').innerText = soulUrgeNumber;
    document.getElementById('hc-res-sun-desc').innerText = descriptions[soulUrgeNumber] || "";
    document.getElementById('hc-kalp-arzusu-sayisi-hesaplama-result').classList.add('visible');
}

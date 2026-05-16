function hcMaturityNumberHesapla() {
    const name = document.getElementById('hc-mn-name').value.trim().toUpperCase();
    const birthStr = document.getElementById('hc-mn-birth').value;

    if (!name || !birthStr) {
        alert('Lütfen adınızı ve doğum tarihinizi girin.');
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
            if (num === 0) {
                num = sum;
                sum = 0;
            }
            sum += num % 10;
            num = Math.floor(num / 10);
        }
        return sum;
    }

    // Yaşam Yolu Sayısı
    const birthDate = new Date(birthStr);
    const day = birthDate.getDate();
    const month = birthDate.getMonth() + 1;
    const year = birthDate.getFullYear();
    const lifePath = sumDigits(sumDigits(day) + sumDigits(month) + sumDigits(year));

    // İfade Sayısı (Tam İsim)
    let expressionSum = 0;
    for (let char of name) {
        if (charMap[char]) {
            expressionSum += charMap[char];
        }
    }
    const expressionNumber = sumDigits(expressionSum);

    // Olgunluk Sayısı
    let maturityNumber = sumDigits(lifePath + expressionNumber);

    const descriptions = {
        1: "Yaş aldıkça liderlik vasıflarınız ve bağımsızlığınız güçlenecek.",
        2: "Hayatın ilerleyen dönemlerinde uyum, huzur ve iş birliği odağınız olacak.",
        3: "Olgunluk döneminizde yaratıcılık ve sosyal ifade ön planda olacak.",
        4: "Daha kararlı, düzenli ve güven inşa eden bir döneme gireceksiniz.",
        5: "Hayatın ikinci yarısında özgürlük, değişim ve yeni keşifler sizi bekliyor.",
        6: "Aile bağlarının, sorumlulukların ve toplumsal hizmetin güçlendiği bir dönem.",
        7: "Ruhsal arayış, bilgelik ve derinleşmenin yaşanacağı bir olgunluk.",
        8: "Maddi başarı, güç yönetimi ve otoritenin pekiştiği yıllar.",
        9: "Evrensel sevgi, bilgelik ve insanlığa hizmet odaklı bir tamamlanma."
    };

    document.getElementById('hc-res-mn-val').innerText = maturityNumber;
    document.getElementById('hc-res-mn-desc').innerText = descriptions[maturityNumber] || "";
    document.getElementById('hc-olgunluk-sayisi-hesaplama-result').classList.add('visible');
}

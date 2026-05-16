function hcBabyNumerologyHesapla() {
    const nameStr = document.getElementById('hc-bin-name').value.trim().toUpperCase();

    if (!nameStr) {
        alert('Lütfen bir isim girin.');
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

    let totalSum = 0;
    for (let char of nameStr) {
        if (charMap[char]) {
            totalSum += charMap[char];
        }
    }

    let babyNumber = sumDigits(totalSum);

    const descriptions = {
        1: "Özgür ruhlu, yaratıcı ve liderlik potansiyeli yüksek bir çocuk.",
        2: "Hassas, uyumlu ve paylaşmayı seven bir karakter.",
        3: "Neşeli, sosyal ve kendini ifade etme yeteneği güçlü.",
        4: "Disiplinli, düzenli ve güven veren bir çocukluk.",
        5: "Meraklı, enerjik ve öğrenmeye çok açık bir zihin.",
        6: "Sorumluluk sahibi, şefkatli ve aile bağları kuvvetli.",
        7: "Derin düşünen, gözlemci ve sezgileri kuvvetli.",
        8: "Hırslı, güçlü iradeli ve başarma odaklı.",
        9: "Merhametli, insancıl ve geniş bir hayal dünyası olan."
    };

    document.getElementById('hc-res-bin-val').innerText = babyNumber;
    document.getElementById('hc-res-bin-desc').innerText = descriptions[babyNumber] || "";
    document.getElementById('hc-bebek-ismi-numerolojisi-hesaplama-result').classList.add('visible');
}

function hcExpressionNumberHesapla() {
    const name = document.getElementById('hc-en-name').value.trim().toUpperCase();

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
            if (num === 0) {
                num = sum;
                sum = 0;
            }
            sum += num % 10;
            num = Math.floor(num / 10);
        }
        return sum;
    }

    let expressionSum = 0;
    for (let char of name) {
        if (charMap[char]) {
            expressionSum += charMap[char];
        }
    }

    let expressionNumber = sumDigits(expressionSum);

    const descriptions = {
        1: "Yaratıcı, bağımsız ve hırslı bir kişilik. Kendi yolunu çizme yeteneği.",
        2: "Barışçıl, diplomatik ve duyarlı. Ekip çalışmasına yatkınlık.",
        3: "Sanatçı ruhlu, konuşkan ve iyimser. Kendini ifade etme gücü.",
        4: "Pratik, dürüst ve çok çalışkan. Güçlü bir temel inşa etme arzusu.",
        5: "Değişimi seven, meraklı ve çok yönlü. Özgürlüğe düşkünlük.",
        6: "Sorumluluk sahibi, korumacı ve estetik anlayışı yüksek.",
        7: "Araştırmacı, sezgisel ve teknik konularda yetenekli.",
        8: "Yönetici, otorite sahibi ve maddi dünyada başarılı.",
        9: "İdealist, insancıl ve fedakar. Geniş vizyonlu."
    };

    document.getElementById('hc-res-en-val').innerText = expressionNumber;
    document.getElementById('hc-res-en-desc').innerText = descriptions[expressionNumber] || "";
    document.getElementById('hc-ifade-sayisi-hesaplama-result').classList.add('visible');
}

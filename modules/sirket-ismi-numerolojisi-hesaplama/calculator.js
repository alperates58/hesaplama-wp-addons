function hcCompanyNumerologyHesapla() {
    const nameStr = document.getElementById('hc-cn-name').value.trim().toUpperCase();

    if (!nameStr) {
        alert('Lütfen şirket ismini girin.');
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
        } else if (!isNaN(parseInt(char))) {
            totalSum += parseInt(char);
        }
    }

    let companyNumber = sumDigits(totalSum);

    const descriptions = {
        1: "Yenilikçi, öncü ve lider bir marka enerjisi. Piyasada ilk olmayı hedefler.",
        2: "Müşteri odaklı, diplomatik ve dengeli bir enerji. Hizmet sektörü için ideal.",
        3: "Yaratıcı, renkli ve iletişim odaklı bir marka. Pazarlama ve sanat için.",
        4: "Güvenilir, kurumsal ve sağlam bir enerji. İnşaat ve üretim için uygun.",
        5: "Dinamik, hızlı ve küresel bir enerji. Teknoloji ve seyahat markaları için.",
        6: "Sorumlu, şefkatli ve estetik odaklı. Sağlık ve eğitim markaları için.",
        7: "Uzman, teknik ve gizemli bir enerji. Araştırma ve yazılım firmaları için.",
        8: "Güçlü, büyük ölçekli ve finansal odaklı. Yatırım ve ticaret devleri için.",
        9: "Evrensel, insancıl ve kapsayıcı bir enerji. STK'lar ve küresel markalar için."
    };

    document.getElementById('hc-res-cn-val').innerText = companyNumber;
    document.getElementById('hc-res-cn-desc').innerText = descriptions[companyNumber] || "";
    document.getElementById('hc-sirket-ismi-numerolojisi-hesaplama-result').classList.add('visible');
}

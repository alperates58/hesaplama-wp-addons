function hcHouseNumerologyHesapla() {
    const numberStr = document.getElementById('hc-hn-number').value.trim().toUpperCase();

    if (!numberStr) {
        alert('Lütfen ev numarasını girin.');
        return;
    }

    const charMap = {
        'A': 1, 'B': 2, 'C': 3, 'Ç': 3, 'D': 4, 'E': 5, 'F': 6, 'G': 7, 'Ğ': 7, 'H': 8, 'I': 9, 'İ': 9, 'J': 1, 'K': 2, 'L': 3, 'M': 4, 'N': 5, 'O': 6, 'Ö': 6, 'P': 7, 'R': 9, 'S': 1, 'Ş': 1, 'T': 2, 'U': 3, 'Ü': 3, 'V': 4, 'Y': 7, 'Z': 8
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
    for (let char of numberStr) {
        if (!isNaN(parseInt(char))) {
            totalSum += parseInt(char);
        } else if (charMap[char]) {
            totalSum += charMap[char];
        }
    }

    let houseNumber = sumDigits(totalSum);

    const descriptions = {
        1: "Yenilikçi, lider ve bağımsız bir enerji. Kendi başına çalışanlar için ideal.",
        2: "Huzurlu, sevgi dolu ve iş birliğine dayalı bir yuva. Paylaşım ön planda.",
        3: "Sosyal, neşeli ve yaratıcı bir ortam. Misafirperverlik ve eğlence evi.",
        4: "Disiplinli, güvenli ve pratik bir enerji. Sağlam temeller ve düzen evi.",
        5: "Hareketli, değişken ve özgürlükçü bir enerji. Macera ve iletişim odaklı.",
        6: "Sorumluluk, aile ve şifa enerjisi. Yuva sıcaklığının en yüksek olduğu ev.",
        7: "Sakin, gizemli ve ruhsal bir enerji. Meditasyon ve öğrenme için uygun.",
        8: "Başarı, güç ve maddi bolluk enerjisi. Disiplin ve vizyon evi.",
        9: "Evrensel sevgi, tamamlanma ve bilgelik enerjisi. Hoşgörü ve şifa evi."
    };

    document.getElementById('hc-res-hn-val').innerText = houseNumber;
    document.getElementById('hc-res-hn-desc').innerText = descriptions[houseNumber] || "";
    document.getElementById('hc-ev-numarasi-numerolojisi-hesaplama-result').classList.add('visible');
}

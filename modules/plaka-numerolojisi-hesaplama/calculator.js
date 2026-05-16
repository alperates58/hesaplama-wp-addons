function hcPlateNumerologyHesapla() {
    const plateStr = document.getElementById('hc-pn-plate').value.trim().toUpperCase();

    if (!plateStr) {
        alert('Lütfen plakayı girin.');
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
    for (let char of plateStr) {
        if (!isNaN(parseInt(char))) {
            totalSum += parseInt(char);
        } else if (charMap[char]) {
            totalSum += charMap[char];
        }
    }

    let plateNumber = sumDigits(totalSum);

    const descriptions = {
        1: "Güçlü, lider ve dikkat çeken bir enerji. Yolculuklarda öz güven verir.",
        2: "Konforlu, sakin ve güvenli sürüş odaklı bir enerji. Şehir içi için ideal.",
        3: "Sosyal, dikkat çekici ve eğlenceli yolculukların plakası.",
        4: "Güvenilir, sağlam ve disiplinli bir sürüş enerjisi. Uzun yollar için.",
        5: "Hareketli, hızlı ve heyecanlı yolculukların enerjisi.",
        6: "Konfor, aile güvenliği ve estetik odaklı bir enerji.",
        7: "Teknolojik, gizemli ve bireysel bir sürüş deneyimi.",
        8: "Prestijli, güçlü ve otoriter bir duruş sergileyen plaka.",
        9: "Evrensel, geniş vizyonlu ve yardımsever bir enerji."
    };

    document.getElementById('hc-res-pn-plate-val').innerText = plateNumber;
    document.getElementById('hc-res-pn-plate-desc').innerText = descriptions[plateNumber] || "";
    document.getElementById('hc-plaka-numerolojisi-hesaplama-result').classList.add('visible');
}

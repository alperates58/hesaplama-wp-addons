function hcPersonalityNumberHesapla() {
    const name = document.getElementById('hc-pn-name').value.trim().toUpperCase();

    if (!name) {
        alert('Lütfen tam adınızı girin.');
        return;
    }

    const consonants = "BCÇDFGĞHKLMNPRSŞTVYZQWX";
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

    let personalitySum = 0;
    for (let char of name) {
        if (consonants.includes(char) && charMap[char]) {
            personalitySum += charMap[char];
        }
    }

    let personalityNumber = sumDigits(personalitySum);

    const descriptions = {
        1: "Güçlü, bağımsız ve öz güvenli görünüyorsunuz. İnsanlar sizi bir lider olarak görür.",
        2: "Sakin, uyumlu ve cana yakın bir imaj çiziyorsunuz. Güven veren bir duruşunuz var.",
        3: "Neşeli, yaratıcı ve sosyal biri olarak algılanıyorsunuz. Girdiğiniz ortama enerji katarsınız.",
        4: "Ciddi, güvenilir ve pratik bir görünümünüz var. İnsanlar size zor işlerde güvenir.",
        5: "Hareketli, meraklı ve enerjik görünüyorsunuz. Özgür ruhlu bir duruşunuz var.",
        6: "Sıcak, korumacı ve aile babası/annesi imajı veriyorsunuz. İnsanlar size dertlerini anlatır.",
        7: "Gizemli, entelektüel ve biraz mesafeli görünüyorsunuz. Derin bir karakteriniz var.",
        8: "Otoriter, başarılı ve iddialı bir duruşunuz var. Maddi dünyada güçlü algılanırsınız.",
        9: "İdealist, bilge ve yardımsever görünüyorsunuz. Herkese kucak açan bir enerjiniz var."
    };

    document.getElementById('hc-res-pn-val').innerText = personalityNumber;
    document.getElementById('hc-res-pn-desc').innerText = descriptions[personalityNumber] || "";
    document.getElementById('hc-kisilik-sayisi-hesaplama-result').classList.add('visible');
}

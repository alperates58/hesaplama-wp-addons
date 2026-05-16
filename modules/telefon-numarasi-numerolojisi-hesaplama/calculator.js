function hcPhoneNumerologyHesapla() {
    const numberStr = document.getElementById('hc-tn-number').value.trim();

    if (!numberStr) {
        alert('Lütfen telefon numarasını girin.');
        return;
    }

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
        }
    }

    let phoneNumber = sumDigits(totalSum);

    const descriptions = {
        1: "Güçlü ve ikna edici bir iletişim tarzı. Liderler ve girişimciler için uygun.",
        2: "Diplomatik, nazik ve yardımsever bir enerji. Aracı olanlar için ideal.",
        3: "Yaratıcı, eğlenceli ve popüler bir numara. Sosyal iletişim için mükemmel.",
        4: "Güvenilir, pratik ve ciddi bir enerji. İş dünyası ve organizasyonlar için.",
        5: "Hareketli, meraklı ve özgürlükçü bir enerji. Satış ve pazarlama için iyi.",
        6: "Sorumluluk sahibi, sıcak ve korumacı. Danışmanlık ve aile işleri için.",
        7: "Entelektüel, mesafeli ve derin bir enerji. Uzmanlar ve araştırmacılar için.",
        8: "Hırslı, güçlü ve otoriter. Ticaret ve finans dünyasında başarı getirebilir.",
        9: "İdealist, merhametli ve evrensel. İnsani yardımlar ve sanat için uygun."
    };

    document.getElementById('hc-res-tn-val').innerText = phoneNumber;
    document.getElementById('hc-res-tn-desc').innerText = descriptions[phoneNumber] || "";
    document.getElementById('hc-telefon-numarasi-numerolojisi-hesaplama-result').classList.add('visible');
}

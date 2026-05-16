function hcBirthdayNumberHesapla() {
    const birthStr = document.getElementById('hc-bn-date').value;

    if (!birthStr) {
        alert('Lütfen doğum tarihinizi girin.');
        return;
    }

    const birthDate = new Date(birthStr);
    const day = birthDate.getDate();

    function sumDigits(num) {
        // Birth Day number doesn't reduce master numbers 11 and 22 in some systems, 
        // but typically reduces to 1-9. We'll follow 1-9 for simplicity as per common modern sources.
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

    const birthdayNumber = sumDigits(day);

    const descriptions = {
        1: "Yaratıcı, bağımsız ve öncü bir kişilik.",
        2: "Hassas, diplomatik ve uyumlu bir doğa.",
        3: "Dışa dönük, neşeli ve sanatsal yetenekleri olan.",
        4: "Pratik, güvenilir ve disiplinli bir karakter.",
        5: "Özgürlüğüne düşkün, meraklı ve değişken.",
        6: "Sorumluluk sahibi, şefkatli ve aile odaklı.",
        7: "Analitik, sezgisel ve derin düşünen.",
        8: "Hırslı, güçlü ve organizasyon yeteneği yüksek.",
        9: "İnsancıl, cömert ve geniş ufuklu."
    };

    document.getElementById('hc-res-bn-val').innerText = birthdayNumber;
    document.getElementById('hc-res-bn-desc').innerText = descriptions[birthdayNumber] || "";
    document.getElementById('hc-dogum-gunu-sayisi-hesaplama-result').classList.add('visible');
}

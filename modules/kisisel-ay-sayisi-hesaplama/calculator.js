function hcKisiselAyHesapla() {
    const birthStr = document.getElementById('hc-pm-birth').value;
    const targetMonth = parseInt(document.getElementById('hc-pm-month').value);
    const targetYear = parseInt(document.getElementById('hc-pm-year').value);

    if (!birthStr || isNaN(targetMonth) || isNaN(targetYear)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const birthDate = new Date(birthStr);
    const day = birthDate.getDate();
    const month = birthDate.getMonth() + 1;

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

    // Kişisel Yıl = Doğum Günü + Doğum Ayı + Hesaplanan Yıl
    const py = sumDigits(sumDigits(day) + sumDigits(month) + sumDigits(targetYear));
    
    // Kişisel Ay = Kişisel Yıl + Hesaplanan Ay
    let personalMonth = sumDigits(py + sumDigits(targetMonth));

    const descriptions = {
        1: "Eyleme geçme, yeni fikirler ve cesaret ayı.",
        2: "Denge arayışı, duygusallık ve diplomasi ayı.",
        3: "Yaratıcılık, iletişim ve sosyal etkileşim ayı.",
        4: "Pratik işler, düzenleme ve sıkı çalışma ayı.",
        5: "Hareket, seyahat ve beklenmedik değişimler ayı.",
        6: "Sevgi, aile sorumlulukları ve şifa ayı.",
        7: "Derin düşünce, yalnızlık ve analiz ayı.",
        8: "Organizasyon, verimlilik ve finansal odak ayı.",
        9: "Bitirme, bağışlama ve insani duygular ayı."
    };

    document.getElementById('hc-res-pm-val').innerText = personalMonth;
    document.getElementById('hc-res-pm-desc').innerText = descriptions[personalMonth] || "";
    document.getElementById('hc-kisisel-ay-sayisi-hesaplama-result').classList.add('visible');
}

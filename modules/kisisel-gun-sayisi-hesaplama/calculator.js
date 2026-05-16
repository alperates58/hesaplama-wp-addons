function hcKisiselGunHesapla() {
    const birthStr = document.getElementById('hc-pd-birth').value;
    const targetStr = document.getElementById('hc-pd-target').value;

    if (!birthStr || !targetStr) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const birthDate = new Date(birthStr);
    const targetDate = new Date(targetStr);

    const bDay = birthDate.getDate();
    const bMonth = birthDate.getMonth() + 1;
    
    const tDay = targetDate.getDate();
    const tMonth = targetDate.getMonth() + 1;
    const tYear = targetDate.getFullYear();

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

    const py = sumDigits(sumDigits(bDay) + sumDigits(bMonth) + sumDigits(tYear));
    const pm = sumDigits(py + sumDigits(tMonth));
    let personalDay = sumDigits(pm + sumDigits(tDay));

    const descriptions = {
        1: "Yeni başlangıçlar, liderlik ve bağımsızlık günü.",
        2: "İlişkiler, hassasiyet ve iş birliği günü.",
        3: "Sosyal etkinlikler, neşe ve yaratıcılık günü.",
        4: "Disiplin, organizasyon ve pratiklik günü.",
        5: "Özgürlük, seyahat ve esneklik günü.",
        6: "Sorumluluk, sevgi ve uyum günü.",
        7: "Ruhsal çalışma, meditasyon ve bilgi günü.",
        8: "Maddi işler, başarı ve otorite günü.",
        9: "Tamamlama, yardımseverlik ve evrensellik günü."
    };

    document.getElementById('hc-res-pd-val').innerText = personalDay;
    document.getElementById('hc-res-pd-desc').innerText = descriptions[personalDay] || "";
    document.getElementById('hc-kisisel-gun-sayisi-hesaplama-result').classList.add('visible');
}

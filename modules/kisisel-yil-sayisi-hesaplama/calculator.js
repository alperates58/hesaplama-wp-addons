function hcKisiselYilHesapla() {
    const birthStr = document.getElementById('hc-py-birth').value;
    const targetYear = parseInt(document.getElementById('hc-py-target').value);

    if (!birthStr || isNaN(targetYear)) {
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

    // Formula: (Sum of Day) + (Sum of Month) + (Sum of Target Year)
    const dSum = sumDigits(day);
    const mSum = sumDigits(month);
    const ySum = sumDigits(targetYear);

    let personalYear = sumDigits(dSum + mSum + ySum);

    const descriptions = {
        1: "Başlangıçlar ve yeni fırsatlar yılı. Tohum ekme zamanı.",
        2: "İş birliği, sabır ve denge yılı. İlişkiler ön planda.",
        3: "Kendini ifade etme, sosyal genişleme ve yaratıcılık yılı.",
        4: "Çalışma, düzen ve temel oluşturma yılı. Disiplin zamanı.",
        5: "Değişim, özgürlük ve macera yılı. Esneklik gerektirir.",
        6: "Sorumluluk, aile ve hizmet yılı. Uyum arayışı.",
        7: "İçe dönüş, analiz ve ruhsal gelişim yılı. Dinlenme zamanı.",
        8: "Güç, bolluk ve maddi başarı yılı. Hasat zamanı.",
        9: "Tamamlanma, bırakma ve dönüşüm yılı. Temizlik zamanı."
    };

    document.getElementById('hc-res-py-val').innerText = personalYear;
    document.getElementById('hc-res-py-desc').innerText = descriptions[personalYear] || "";
    document.getElementById('hc-kisisel-yil-sayisi-hesaplama-result').classList.add('visible');
}

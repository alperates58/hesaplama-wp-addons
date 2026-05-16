function hcKarmicLessonHesapla() {
    const name = document.getElementById('hc-kl-name').value.trim().toUpperCase();

    if (!name) {
        alert('Lütfen tam adınızı girin.');
        return;
    }

    const charMap = {
        'A': 1, 'J': 1, 'S': 1, 'Ş': 1, 'B': 2, 'K': 2, 'T': 2, 'C': 3, 'Ç': 3, 'L': 3, 'U': 3, 'Ü': 3, 'D': 4, 'M': 4, 'V': 4, 'E': 5, 'N': 5, 'W': 5, 'F': 6, 'O': 6, 'Ö': 6, 'X': 6, 'G': 7, 'Ğ': 7, 'P': 7, 'Y': 7, 'H': 8, 'Q': 8, 'Z': 8, 'I': 9, 'İ': 9, 'R': 9
    };

    let present = new Set();
    for (let char of name) {
        if (charMap[char]) {
            present.add(charMap[char]);
        }
    }

    let missing = [];
    for (let i = 1; i <= 9; i++) {
        if (!present.has(i)) {
            missing.push(i);
        }
    }

    const lessonDesc = {
        1: "1 Dersi: Girişimcilik ve öz güven eksikliği. Kendi ayaklarınız üzerinde durmayı öğrenmelisiniz.",
        2: "2 Dersi: Sabır ve iş birliği eksikliği. Başkalarıyla uyum içinde çalışmayı öğrenmelisiniz.",
        3: "3 Dersi: Kendini ifade etme ve yaratıcılık eksikliği. Duygularınızı dışa vurmayı öğrenmelisiniz.",
        4: "4 Dersi: Disiplin ve pratiklik eksikliği. Düzenli çalışmayı ve istikrarı öğrenmelisiniz.",
        5: "5 Dersi: Esneklik ve değişim korkusu. Yeniliklere açık olmayı ve uyum sağlamayı öğrenmelisiniz.",
        6: "6 Dersi: Sorumluluk ve sevgi dengesi. Aile ve toplumsal bağları güçlendirmeyi öğrenmelisiniz.",
        7: "7 Dersi: İnanç ve analiz eksikliği. İç sesinizi dinlemeyi ve araştırmayı öğrenmelisiniz.",
        8: "8 Dersi: Maddi güç ve otorite yönetimi. Finansal dengeyi ve gücü kullanmayı öğrenmelisiniz.",
        9: "9 Dersi: Hoşgörü ve insancıllık eksikliği. Fedakarlığı ve evrensel sevgiyi öğrenmelisiniz."
    };

    if (missing.length > 0) {
        document.getElementById('hc-res-kl-val').innerText = missing.join(', ');
        let descHtml = "<ul>";
        missing.forEach(n => {
            descHtml += `<li>${lessonDesc[n]}</li>`;
        });
        descHtml += "</ul>";
        document.getElementById('hc-res-kl-desc').innerHTML = descHtml;
    } else {
        document.getElementById('hc-res-kl-val').innerText = "Yok";
        document.getElementById('hc-res-kl-desc').innerText = "Adınızda tüm sayılar mevcut. Belirgin bir karmik dersiniz bulunmuyor.";
    }

    document.getElementById('hc-karmik-ders-sayisi-hesaplama-result').classList.add('visible');
}

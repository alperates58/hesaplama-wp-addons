function hcDogumCicegiHesapla() {
    const month = parseInt(document.getElementById('hc-bfc-month').value);
    
    const flowers = {
        1: { name: "Karanfil", desc: "Aşk, hayranlık ve farklılık sembolüdür. Derin duygulara sahip, sadık ve samimi bir kişiliği temsil eder." },
        2: { name: "Menekşe", desc: "Sadakat, bilgelik ve alçakgönüllülük sembolüdür. Sezgisel, düşünceli ve nazik bir ruhu temsil eder." },
        3: { name: "Nergis", desc: "Yeniden doğuş, bereket ve saygı sembolüdür. İyimser, yaratıcı ve enerjik bir kişiliği temsil eder." },
        4: { name: "Papatya", desc: "Masumiyet, sadık aşk ve saflık sembolüdür. Neşeli, doğal ve dürüst bir karakteri temsil eder." },
        5: { name: "Müge (İnci Çiçeği)", desc: "Alçakgönüllülük, mutluluk ve tatlılık sembolüdür. Şefkatli, koruyucu ve güvenilir bir ruhu temsil eder." },
        6: { name: "Gül", desc: "Aşk, tutku ve güzellik sembolüdür. Duygusal, dengeli ve girdiği her ortamda parlayan bir kişiliği temsil eder." },
        7: { name: "Hezaren (Larkspur)", desc: "Güçlü bağlar, hafiflik ve sevgi sembolüdür. Açık fikirli, pozitif ve sevdiklerine bağlı bir karakteri temsil eder." },
        8: { name: "Gladyol", desc: "Karakter gücü, sadakat ve dürüstlük sembolüdür. Azimli, lider ruhlu ve güvenilir bir kişiliği temsil eder." },
        9: { name: "Yıldızpatı (Aster)", desc: "Sevgi, bilgelik ve inanç sembolüdür. Hassas, detaycı ve ruhsal derinliği olan bir karakteri temsil eder." },
        10: { name: "Kadife Çiçeği", desc: "İyimserlik, yaratıcılık ve sıcaklık sembolüdür. Çalışkan, azimli ve hayat enerjisi yüksek bir ruhu temsil eder." },
        11: { name: "Krizantem", desc: "Neşe, şefkat ve uzun ömür sembolüdür. Sadık, dürüst ve iyi kalpli bir kişiliği temsil eder." },
        12: { name: "Nergis (Zakkum)", desc: "Umut, bolluk ve özgüven sembolüdür. Cömert, kendinden emin ve koruyucu bir karakteri temsil eder." }
    };

    const myFlower = flowers[month];

    document.getElementById('hc-bfc-value').innerText = myFlower.name;
    document.getElementById('hc-bfc-desc').innerHTML = `<p>${myFlower.desc}</p>`;
    document.getElementById('hc-dogum-cicegi-result').classList.add('visible');
}

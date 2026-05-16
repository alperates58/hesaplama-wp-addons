function hcRuhsalYasHesapla() {
    let score = 0;
    for (let i = 1; i <= 5; i++) {
        const val = parseInt(document.getElementById(`hc-sa-q${i}`).value);
        score += val;
    }

    let category = "";
    let desc = "";

    if (score <= 8) {
        category = "Yeni Ruh";
        desc = "Dünyadaki deneyimleriniz henüz çok taze. Hayata karşı büyük bir merak ve heyecan duyuyorsunuz. Öğrenmeye açsınız ve her şeyi ilk kez keşfediyormuş gibi bir neşeye sahipsiniz.";
    } else if (score <= 12) {
        category = "Genç Ruh";
        desc = "Başarı, statü ve dünyada iz bırakma arzunuz ön planda. Güçlü bir iradeye sahipsiniz ve hedeflerinize ulaşmak için büyük bir enerjiyle çalışıyorsunuz. Toplumsal kuralları ve sistemi anlamaya odaklısınız.";
    } else if (score <= 16) {
        category = "Olgun Ruh";
        desc = "Duygusal derinlik, empati ve ilişkiler sizin için en önemli değerler. Maddi dünyadan çok anlam arayışına yönelmiş durumdasınız. Başkalarının acılarını hissedebilir ve şifalandırma isteği duyarsınız.";
    } else {
        category = "Bilge (Yaşlı) Ruh";
        desc = "Dünyevi hırsları çoktan aşmış durumdasınız. Olaylara çok geniş bir perspektiften bakıyor, her şeyin geçici olduğunun bilinciyle yaşıyorsunuz. İçsel huzur ve evrensel gerçeklikler sizin tek odağınız.";
    }

    document.getElementById('hc-sa-value').innerText = category;
    document.getElementById('hc-sa-desc').innerHTML = `<p>${desc}</p><p>Analiz Puanınız: ${score}/20</p>`;
    document.getElementById('hc-ruhsal-yas-result').classList.add('visible');
}

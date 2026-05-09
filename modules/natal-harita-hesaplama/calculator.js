function hcNatalHesapla() {
    const dStr = document.getElementById('hc-natal-date').value;
    const tStr = document.getElementById('hc-natal-time').value;

    if (!dStr || !tStr) { alert('Lütfen tarih ve saat girin.'); return; }

    const burclar = ["Koç", "Boğa", "İkizler", "Yengeç", "Aslan", "Başak", "Terazi", "Akrep", "Yay", "Oğlak", "Kova", "Balık"];
    
    // Using a simplified but consistent logic for Natal focus
    const date = new Date(dStr);
    const sunIdx = Math.floor((date.getMonth() * 30 + date.getDate()) / 30) % 12;
    const b = burclar[sunIdx];

    const interpretations = {
        "Koç": "Natal haritanızda güçlü bir öncülük ve cesaret enerjisi var. Hayat amacınız, kendi gücünüzü keşfetmek ve dünyaya yeni başlangıçlar getirmektir.",
        "Boğa": "Sizin için huzur, güven ve maddi istikrar çok önemli. Natal haritanız, hayatta kalıcı ve değerli olanı inşa etme potansiyelinizi gösteriyor.",
        "İkizler": "Bilgi, iletişim ve çok yönlülük sizin anahtar kelimeleriniz. Haritanız, zekanızla ve sosyal becerilerinizle fark yaratacağınızı müjdeliyor.",
        "Yengeç": "Duygusal derinlik, aile ve korumacılık ruhunuzun temelinde var. Haritanızda sevdiklerinize güvenli bir liman olma misyonu ön planda.",
        "Aslan": "Yaratıcılık, neşe ve özgüven sizin doğal ışığınız. Natal haritanız, parlamanız ve başkalarına ilham vermeniz için gereken donanıma sahip olduğunuzu gösteriyor.",
        "Başak": "Hizmet, düzen ve teknik mükemmeliyetçilik sizin gücünüz. Haritanızda dünyayı daha iyi ve işlevsel bir yer haline getirme potansiyeli var.",
        "Terazi": "Uyum, adalet ve ilişkiler sizin yaşam rotanızın merkezinde. Haritanız, dengeyi kurma ve estetik değerleri koruma yeteneğinizi vurguluyor.",
        "Akrep": "Derinlik, tutku ve dönüşüm sizin ruhsal yakıtınız. Natal haritanız, krizleri aşma ve küllerinden yeniden doğma gücünüzü simgeliyor.",
        "Yay": "Özgürlük, felsefe ve keşif arzusu sizin itici gücünüz. Haritanızda sürekli öğrenme ve ufukları genişletme misyonu var.",
        "Oğlak": "Disiplin, sorumluluk ve hırs sizin karakterinizin temel taşları. Natal haritanız, zirveye ulaşma ve kalıcı eserler bırakma iradenizi gösteriyor.",
        "Kova": "Bağımsızlık, yenilikçilik ve toplumsal vizyon sizin farkınız. Haritanızda geleceği inşa etme ve özgün yollar açma potansiyeli saklı.",
        "Balık": "Şefkat, hayal gücü ve maneviyat sizin en derin gücünüz. Natal haritanız, evrensel sevgiyi ve ruhsal şifayı dünyaya taşıma yeteneğinizi temsil ediyor."
    };

    document.getElementById('hc-natal-val').innerText = b + " Odaklı Harita";
    document.getElementById('hc-natal-desc').innerText = interpretations[b];
    document.getElementById('hc-natal-result').classList.add('visible');
}

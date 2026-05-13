function hcBurcDonemHesapla() {
    const sign = document.getElementById('hc-bd-sign').value;
    
    const periodData = {
        "koc": { dates: "21 Mart - 19 Nisan", season: "İlkbahar Başlangıcı", energy: "Tohumun çatlaması ve yaşamın uyanışı." },
        "boga": { dates: "20 Nisan - 20 Mayıs", season: "Tam İlkbahar", energy: "Doğanın yeşermesi, kök salma ve huzur." },
        "ikizler": { dates: "21 Mayıs - 20 Haziran", season: "İlkbahar Sonu", energy: "Çiçek tozlarının yayılması ve iletişim." },
        "yengec": { dates: "21 Haziran - 22 Temmuz", season: "Yaz Başlangıcı", energy: "Yaz gündönümü, koruma ve besleme." },
        "aslan": { dates: "23 Temmuz - 22 Ağustos", season: "Tam Yaz", energy: "Güneşin en sıcak hali, yaratıcılık ve parlayış." },
        "basak": { dates: "23 Ağustos - 22 Eylül", season: "Yaz Sonu", energy: "Hasat zamanı, detaylar ve hazırlık." },
        "terazi": { dates: "23 Eylül - 22 Ekim", season: "Sonbahar Başlangıcı", energy: "Gece-gündüz eşitliği, adalet ve denge." },
        "akrep": { dates: "23 Ekim - 21 Kasım", season: "Tam Sonbahar", energy: "Yaprak dökümü, derinlik ve dönüşüm." },
        "yay": { dates: "22 Kasım - 21 Aralık", season: "Sonbahar Sonu", energy: "Kışa hazırlık, vizyon ve uzak ufuklar." },
        "oglak": { dates: "22 Aralık - 19 Ocak", season: "Kış Başlangıcı", energy: "Kış gündönümü, disiplin ve zirve." },
        "kova": { dates: "20 Ocak - 18 Şubat", season: "Tam Kış", energy: "Dondurucu soğuklar, dâhice fikirler ve özgürlük." },
        "balik": { dates: "19 Şubat - 20 Mart", season: "Kış Sonu", energy: "Buzların erimesi, hayaller ve sınırsızlık." }
    };

    const data = periodData[sign];
    let detailedDesc = `
        <p><strong>Mevsimsel Döngü:</strong> ${data.season}</p>
        <p><strong>Dönem Enerjisi:</strong> ${data.energy}</p>
        <p><strong>Sınırda Doğanlar (Cusp):</strong> Eğer bu tarihlerin en başındaki veya en sonundaki 2-3 gün içinde doğduysanız, kendinizi bir sonraki veya bir önceki burcun enerjisine de yakın hissedebilirsiniz. Örneğin, 20 Mart'ta doğan bir Balık, Koç burcunun öncü ve ateşli enerjisini de taşıyor olabilir.</p>
        <p><strong>2026 Transitleri:</strong> 2026 yılında ${sign.toUpperCase()} dönemi, gökyüzündeki majör gezegen geçişleriyle (Satürn ve Jüpiter) oldukça dinamik geçecek. Bu dönemde hayatınızda önemli kararlar alabilir, yeni başlangıçlar için evrenin desteğini hissedebilirsiniz.</p>
    `;

    document.getElementById('hc-bd-value').innerText = data.dates;
    document.getElementById('hc-bd-desc').innerHTML = detailedDesc;
    document.getElementById('hc-bd-result').classList.add('visible');
}

function hcKariyerTarotHesapla() {
    const dStr = document.getElementById('hc-ctc-date').value;
    if (!dStr) {
        alert('Lütfen doğum tarihinizi girin.');
        return;
    }

    const d = new Date(dStr);
    let sum = d.getDate() + (d.getMonth() + 1) + d.getFullYear();
    while (sum > 22) {
        let t = 0;
        sum.toString().split('').forEach(v => t += parseInt(v));
        sum = t;
    }
    if (finalSum === 0) finalSum = 22; // Fix typo from thinking: sum is the variable here

    // Re-check logic to match previous modules for consistency
    let careerSum = d.getDate() + (d.getMonth() + 1) + d.getFullYear();
    while (careerSum > 22) {
        let t = 0;
        careerSum.toString().split('').forEach(v => t += parseInt(v));
        careerSum = t;
    }
    if (careerSum === 0) careerSum = 22;

    const careerCards = {
        1: { name: "Büyücü", desc: "Girişimcilik, satış, pazarlama ve yaratıcı projeler için mükemmelsiniz. Kendi işinizin patronu olmaya yatkınsınız." },
        2: { name: "Azize", desc: "Psikoloji, danışmanlık, kütüphanecilik veya gizli bilgilerin olduğu araştırmacı roller size göredir." },
        3: { name: "İmparatoriçe", desc: "Tasarım, sanat, dekorasyon, çocuklarla ilgili işler veya üretim odaklı alanlarda başarılı olursunuz." },
        4: { name: "İmparator", desc: "Yöneticilik, devlet memurluğu, askeriye veya büyük şirketlerin hiyerarşik yapıları size uygundur." },
        5: { name: "Aziz", desc: "Akademisyenlik, öğretmenlik, din adamlığı veya kurumsal rehberlik rollerinde parlayabilirsiniz." },
        6: { name: "Aşıklar", desc: "Halkla ilişkiler, insan kaynakları veya ortaklık gerektiren her türlü iş size başarı getirir." },
        7: { name: "Araba", desc: "Lojistik, taşımacılık, seyahat odaklı işler veya hedef odaklı saha satış rolleri için yaratılmışsınız." },
        8: { name: "Güç", desc: "Yönetici koçluğu, liderlik, hayvanlarla ilgili işler veya sabır gerektiren zorlu profesyonel alanlar." },
        9: { name: "Ermiş", desc: "Arşivcilik, yazarlık, felsefe veya derin odaklanma gerektiren analitik araştırma rolleri." },
        10: { name: "Kader Çarkı", desc: "Borsa, finans, turizm veya değişken piyasaların olduğu her türlü sektör size uygundur." },
        11: { name: "Adalet", desc: "Hukuk, yargı, muhasebe veya etik değerlerin ön planda olduğu denetleme rolleri." },
        12: { name: "Asılan Adam", desc: "Sanatsal yönetmenlik, alternatif tıp veya olaylara farklı bakış açısı getiren yaratıcı danışmanlıklar." },
        13: { name: "Ölüm", desc: "Kriz yönetimi, cerrahlık, sigortacılık veya eskiyi yenileyen restorasyon/dönüşüm işleri." },
        14: { name: "Denge", desc: "Diplomasi, şifa sanatları, kimya veya farklı departmanlar arası koordinasyon rolleri." },
        15: { name: "Şeytan", desc: "Yüksek finans, eğlence sektörü veya manipülasyon/ikna kabiliyeti gerektiren rekabetçi işler." },
        16: { name: "Yıkılan Kule", desc: "İnşaat, güvenlik, radikal değişim danışmanlığı veya risk analizi gerektiren zorlu görevler." },
        17: { name: "Yıldız", desc: "Yaratıcı sanatlar, astroloji, hayır kurumları veya insanlara umut veren ilham verici roller." },
        18: { name: "Ay", desc: "Yaratıcı yazarlık, gece hayatı, rüya analizi veya derin sezgi gerektiren sanatsal alanlar." },
        19: { name: "Güneş", desc: "Sahne sanatları, çocuk eğitimi, motivasyon konuşmacılığı veya parladığınız her türlü liderlik." },
        20: { name: "Mahkeme", desc: "Sosyal adalet, hukuk, uyanış çağrısı yapan gazetecilik veya büyük organizasyonel değişimler." },
        21: { name: "Dünya", desc: "Dış ticaret, uluslararası ilişkiler, turizm veya küresel çapta yürütülen büyük projeler." },
        22: { name: "Joker", desc: "Freelance işler, seyahat yazarlığı, yeni girişimler veya kuralları sizin koyduğunuz özgür meslekler." }
    };

    const myCard = careerCards[careerSum];

    document.getElementById('hc-ctc-value').innerText = myCard.name;
    document.getElementById('hc-ctc-desc').innerHTML = `<p>${myCard.desc}</p>`;
    document.getElementById('hc-kariyer-tarot-karti-result').classList.add('visible');
}

function hcCinKisiselYilHesapla() {
    const yearInput = document.getElementById('hc-cpy-year').value;
    if (!yearInput) {
        alert('Lütfen doğum yılınızı girin.');
        return;
    }

    const birthYear = parseInt(yearInput);
    const animals = ["Fare", "Öküz", "Kaplan", "Tavşan", "Ejderha", "Yılan", "At", "Keçi", "Maymun", "Horoz", "Köpek", "Domuz"];
    
    let idx = (birthYear - 1900) % 12;
    if (idx < 0) idx += 12;
    const myAnimal = animals[idx];

    // 2026 is the Year of the Horse (At) - Index 6
    const currentAnimalIdx = 6;
    let result = `<p>Sizin burcunuz: <strong>${myAnimal}</strong>.</p>`;
    result += `<p>2026 yılı <strong>At (Ateş Atı)</strong> yılıdır. İşte sizin için analizimiz:</p><hr>`;

    if (idx === 6) { // Horse
        result += `<p><strong>Kendi Yılınız (Ben Ming Nian):</strong> Bu yıl sizin için değişim ve dönüşüm yılı olacak. Geleneksel olarak 'kendi yılında' olanlar için dikkatli olunması önerilir. Riskli yatırımlardan kaçınmalı ve sağlığınıza özen göstermelisiniz.</p>`;
    } else if (idx === 2 || idx === 10) { // Tiger (2) or Dog (10) - Trine with Horse
        result += `<p><strong>Mükemmel Uyum:</strong> 2026 sizin için harika fırsatlar barındırıyor. Kariyerinizde yükselme, yeni projeler ve sosyal çevrenizde genişleme bekleyebilirsiniz. Enerjiniz çok yüksek olacak.</p>`;
    } else if (idx === 0) { // Rat - Clash with Horse
        result += `<p><strong>Zorlayıcı Enerjiler:</strong> 2026'da At yılı sizin için bazı engeller çıkarabilir. Özellikle ikili ilişkilerde ve finansal konularda sabırlı olmanız gerekebilir. Değişikliklere karşı dirençli olun.</p>`;
    } else if (idx === 1) { // Ox - Harm with Horse
        result += `<p><strong>Dikkatli Olunmalı:</strong> İletişim kazalarına ve yanlış anlaşılmalara müsait bir yıl. Sakin kalmalı ve fevri kararlar vermemelisiniz. İş hayatında istikrarlı ilerlemek en iyisidir.</p>`;
    } else if (idx === 7) { // Goat - Secret Friend of Horse
        result += `<p><strong>Şanslı ve Huzurlu:</strong> At yılı sizin için oldukça destekleyici olacak. Beklenmedik yardımlar alabilir, ailevi konularda mutluluğu yakalayabilirsiniz. İsteklerinizi gerçekleştirmek için uygun bir zaman.</p>`;
    } else {
        result += `<p><strong>Stabil ve Dengeli:</strong> 2026 sizin için büyük dalgalanmaların olmadığı, huzurlu bir yıl olacak. Mevcut işlerinize odaklanmak ve kendinizi geliştirmek için iyi bir dönemdir.</p>`;
    }

    document.getElementById('hc-cpy-content').innerHTML = result;
    document.getElementById('hc-cin-astrolojisi-kisisel-yil-result').classList.add('visible');
}

function hcStelyumHesapla() {
    const selects = document.querySelectorAll('.hc-st-planet');
    const counts = {};

    selects.forEach(s => {
        const sign = s.value;
        if (sign !== "yok") {
            counts[sign] = (counts[sign] || 0) + 1;
        }
    });

    let stelyumSign = "yok";
    let maxCount = 0;

    for (let sign in counts) {
        if (counts[sign] >= 3 && counts[sign] > maxCount) {
            maxCount = counts[sign];
            stelyumSign = sign;
        }
    }

    const signNames = {
        "koc": "Koç", "boga": "Boğa", "ikizler": "İkizler", "yengec": "Yengeç",
        "aslan": "Aslan", "basak": "Başak", "terazi": "Terazi", "akrep": "Akrep",
        "yay": "Yay", "oglak": "Oğlak", "kova": "Kova", "balik": "Balık"
    };

    let detailedContent = "";

    if (stelyumSign === "yok") {
        detailedContent = `
            <p><strong>Analiz Sonucu:</strong> Haritanızda belirgin bir stelyum (3 veya daha fazla gezegenin aynı burçta toplanması) bulunamadı. Bu durum, hayat enerjinizin farklı alanlara dengeli bir şekilde dağıldığını gösterir. Tek bir konuya takılmak yerine çok yönlü bir gelişim sergiliyorsunuz.</p>
        `;
        document.getElementById('hc-st-value').innerText = "Bulunamadı";
    } else {
        detailedContent = `
            <p><strong>Analiz Sonucu:</strong> Haritanızda <strong>${signNames[stelyumSign]}</strong> burcunda güçlü bir stelyum (kümelenme) bulunuyor! Bu burçta ${maxCount} adet gezegeninizin olması, karakterinizin ve kaderinizin bu burcun temaları etrafında şekillendiğini gösterir.</p>
            <p><strong>Stelyumun Gücü:</strong> Bir burçta stelyum olması, o burcun temsil ettiği hayat alanında 'deha' veya 'aşırı odaklanma' yaratır. Enerjinizin büyük bir kısmı bu kanaldan akar. Bu durum sizi o konuda uzman yapabileceği gibi, diğer hayat alanlarını ihmal etmenize de neden olabilir.</p>
            <p><strong>2026 Stelyum Gündemi:</strong> 2026 yılındaki gezegen geçişleri, stelyumunuzun olduğu burcu doğrudan etkileyecek. Bu yıl hayatınızın 'en önemli' kararlarını bu stelyum teması üzerinden alacaksınız. Kariyer, aşk veya kişisel gelişimde büyük bir 'patlama' veya 'dönüşüm' yaşayabilirsiniz.</p>
            <p><strong>Tavsiye:</strong> Stelyumunuzdaki gezegenlerin en 'bilge' olanını (genellikle Satürn veya Jüpiter) rehber edinin. Enerjinizi dağıtmak yerine bu güçlü odağı bir lazer gibi hedeflerinize yöneltin.</p>
        `;
        document.getElementById('hc-st-value').innerText = signNames[stelyumSign];
    }

    document.getElementById('hc-st-desc').innerHTML = detailedContent;
    document.getElementById('hc-st-result').classList.add('visible');
}

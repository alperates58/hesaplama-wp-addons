function hcYinYangHesapla() {
    const bStr = document.getElementById('hc-yy-birthdate').value;
    if (!bStr) {
        alert('Lütfen doğum tarihinizi giriniz.');
        return;
    }

    const date = new Date(bStr);
    const year = date.getFullYear();
    const month = date.getMonth() + 1;
    const day = date.getDate();

    // Çin Yeni Yılı Yaklaşık Kesimi (4 Şubat / Lichun)
    let solarYear = year;
    if (month === 1 || (month === 2 && day < 4)) {
        solarYear = year - 1;
    }

    const animals = [
        { name: "Fare (Rat)", icon: "🐀", polarity: "Yang", element: "Su" },
        { name: "Öküz (Ox)", icon: "🐂", polarity: "Yin", element: "Toprak" },
        { name: "Kaplan (Tiger)", icon: "🐅", polarity: "Yang", element: "Ağaç" },
        { name: "Tavşan (Rabbit)", icon: "🐇", polarity: "Yin", element: "Ağaç" },
        { name: "Ejderha (Dragon)", icon: "🐉", polarity: "Yang", element: "Toprak" },
        { name: "Yılan (Snake)", icon: "🐍", polarity: "Yin", element: "Ateş" },
        { name: "At (Horse)", icon: "🐎", polarity: "Yang", element: "Ateş" },
        { name: "Keçi (Goat)", icon: "🐐", polarity: "Yin", element: "Toprak" },
        { name: "Maymun (Monkey)", icon: "🐒", polarity: "Yang", element: "Metal" },
        { name: "Horoz (Rooster)", icon: "🐓", polarity: "Yin", element: "Metal" },
        { name: "Köpek (Dog)", icon: "🐕", polarity: "Yang", element: "Toprak" },
        { name: "Domuz (Pig)", icon: "🐖", polarity: "Yin", element: "Su" }
    ];

    let aIdx = (solarYear - 1900) % 12;
    if (aIdx < 0) aIdx += 12;
    const animal = animals[aIdx];

    // Göksel Kökler (Tian Gan) Çin Elementi
    const elements = ["Metal (Yang)", "Metal (Yin)", "Su (Yang)", "Su (Yin)", "Ağaç (Yang)", "Ağaç (Yin)", "Ateş (Yang)", "Ateş (Yin)", "Toprak (Yang)", "Toprak (Yin)"];
    let eIdx = (solarYear - 1900) % 10;
    if (eIdx < 0) eIdx += 10;
    const chinElement = elements[eIdx];

    // Batı Burcu Polaritesi
    let westSign = "Boğa", westPolarity = "Yin (Dişil)";
    if ((month == 3 && day >= 21) || (month == 4 && day <= 19)) { westSign = "Koç"; westPolarity = "Yang (Eril/Ateş)"; }
    else if ((month == 4 && day >= 20) || (month == 5 && day <= 20)) { westSign = "Boğa"; westPolarity = "Yin (Dişil/Toprak)"; }
    else if ((month == 5 && day >= 21) || (month == 6 && day <= 20)) { westSign = "İkizler"; westPolarity = "Yang (Eril/Hava)"; }
    else if ((month == 6 && day >= 21) || (month == 7 && day <= 22)) { westSign = "Yengeç"; westPolarity = "Yin (Dişil/Su)"; }
    else if ((month == 7 && day >= 23) || (month == 8 && day <= 22)) { westSign = "Aslan"; westPolarity = "Yang (Eril/Ateş)"; }
    else if ((month == 8 && day >= 23) || (month == 9 && day <= 22)) { westSign = "Başak"; westPolarity = "Yin (Dişil/Toprak)"; }
    else if ((month == 9 && day >= 23) || (month == 10 && day <= 22)) { westSign = "Terazi"; westPolarity = "Yang (Eril/Hava)"; }
    else if ((month == 10 && day >= 23) || (month == 11 && day <= 21)) { westSign = "Akrep"; westPolarity = "Yin (Dişil/Su)"; }
    else if ((month == 11 && day >= 22) || (month == 12 && day <= 21)) { westSign = "Yay"; westPolarity = "Yang (Eril/Ateş)"; }
    else if ((month == 12 && day >= 22) || (month == 1 && day <= 19)) { westSign = "Oğlak"; westPolarity = "Yin (Dişil/Toprak)"; }
    else if ((month == 1 && day >= 20) || (month == 2 && day <= 18)) { westSign = "Kova"; westPolarity = "Yang (Eril/Hava)"; }
    else { westSign = "Balık"; westPolarity = "Yin (Dişil/Su)"; }

    let yangScore = 50, yinScore = 50;
    if (animal.polarity === "Yang") { yangScore += 15; yinScore -= 15; } else { yinScore += 15; yangScore -= 15; }
    if (chinElement.includes("Yang")) { yangScore += 10; yinScore -= 10; } else { yinScore += 10; yangScore -= 10; }
    if (westPolarity.includes("Yang")) { yangScore += 10; yinScore -= 10; } else { yinScore += 10; yangScore -= 10; }

    const isDominantYang = yangScore >= yinScore;

    const heroHtml = `
        <div class="hc-yy-hero-card">
            <div class="hc-yy-hero-badge">☯️ Taoist Enerji Tipi: ${animal.polarity} (${isDominantYang ? 'Eril & Aktif' : 'Dişil & Alıcı'})</div>
            <div class="hc-yy-hero-title">${animal.icon} ${animal.name} (${chinElement})</div>
            <p class="hc-yy-hero-sub">Batı Burcunuz (${westSign}): <strong>${westPolarity}</strong> | Çin Zodyak Yılı: <strong>${solarYear}</strong></p>
        </div>
    `;

    const balanceHtml = `
        <div class="hc-yy-progress-wrap">
            <div class="hc-yy-bar-header">
                <span>⚪ Yang (Aktif / Eylem / Işık): %${yangScore}</span>
                <span>⚫ Yin (Sakin / Sezgi / Derinlik): %${yinScore}</span>
            </div>
            <div class="hc-yy-dual-bar">
                <div class="hc-yy-bar-yang" style="width: ${yangScore}%;"></div>
                <div class="hc-yy-bar-yin" style="width: ${yinScore}%;"></div>
            </div>
        </div>
    `;

    const descHtml = `
        <p><strong>Yin & Yang Nedir?</strong> Evrendeki her şey iki zıt ama birbirini tamamlayan enerjiden oluşur:</p>
        <p>• <strong>Yang (Eril / Güneş):</strong> Başlatıcı güç, mantık, eylem, hız, dışa dönüklük ve netliktir.</p>
        <p>• <strong>Yin (Dişil / Ay):</strong> Besleyici güç, sezgi, uyum, sabır, içsel bilgelik ve derinliktir.</p>
        <p><strong>Denge Tavsiyesi:</strong> Toplam enerjinizde <strong>%${isDominantYang ? yangScore : yinScore} ${isDominantYang ? 'Yang' : 'Yin'}</strong> baskındır. ${isDominantYang ? 'Aşırı tükenmişlikten korunmak için meditasyon, doğada vakit geçirme ve dinlenme gibi Yin aktivitelerini hayatınıza dahil etmelisiniz.' : 'Fikirlerinizi ertelemeden hayata geçirmek için spor, cesur girişimler ve hızlı karar alma gibi Yang eylemlerini güçlendirmelisiniz.'}</p>
    `;

    document.getElementById('hc-yy-hero').innerHTML = heroHtml;
    document.getElementById('hc-yy-balance').innerHTML = balanceHtml;
    document.getElementById('hc-yy-desc').innerHTML = descHtml;

    document.getElementById('hc-yin-yang-burcu-result').classList.add('visible');
    document.getElementById('hc-yin-yang-burcu-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}


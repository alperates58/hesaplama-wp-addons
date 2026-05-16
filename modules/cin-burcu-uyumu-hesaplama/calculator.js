/**
 * Çin Burcu Uyumu Hesaplama
 */

function hcCinBurcuUyumuHesapla() {
    const y1 = parseInt(document.getElementById('hc-c1-year').value);
    const y2 = parseInt(document.getElementById('hc-c2-year').value);

    if (!y1 || !y2) {
        alert("Lütfen her iki doğum yılını da girin.");
        return;
    }

    const animals = [
        { name: "Fare", trait: "Zeki, Sosyal" },
        { name: "Öküz", trait: "Güçlü, Sabırlı" },
        { name: "Kaplan", trait: "Cesur, Tutkulu" },
        { name: "Tavşan", trait: "Zarif, Nazik" },
        { name: "Ejderha", trait: "Lider, Kendine Güvenen" },
        { name: "Yılan", trait: "Bilge, Gizemli" },
        { name: "At", trait: "Enerjik, Özgür" },
        { name: "Keçi", trait: "Yaratıcı, Sanatçı" },
        { name: "Maymun", trait: "Eğlenceli, Akıllı" },
        { name: "Horoz", trait: "Dürüst, Çalışkan" },
        { name: "Köpek", trait: "Sadık, Dürüst" },
        { name: "Domuz", trait: "Cömert, Yardımsever" }
    ];

    const getIdx = (y) => (y - 4) % 12;
    const idx1 = getIdx(y1);
    const idx2 = getIdx(y2);

    const a1 = animals[idx1];
    const a2 = animals[idx2];

    const diff = Math.abs(idx1 - idx2);
    
    let score = 0;
    let description = "";

    // Üçlü Gruplar (Triads) - En İyi Uyum
    const triads = [
        [0, 4, 8], // Fare, Ejderha, Maymun
        [1, 5, 9], // Öküz, Yılan, Horoz
        [2, 6, 10], // Kaplan, At, Köpek
        [3, 7, 11]  // Tavşan, Keçi, Domuz
    ];

    let isTriad = false;
    triads.forEach(t => {
        if (t.includes(idx1) && t.includes(idx2)) isTriad = true;
    });

    if (idx1 === idx2) {
        score = 85;
        description = `Her ikiniz de <strong>${a1.name}</strong> burcusunuz. Birbirinizi çok iyi anlarsınız ama bazen aynı inatçılıkları gösterebilirsiniz.`;
    } else if (isTriad) {
        score = 100;
        description = `Mükemmel uyum! <strong>${a1.name}</strong> ve <strong>${a2.name}</strong> zodyakın 'Üçlü Uyum' grubundadır. Doğal bir anlayış ve destek vardır.`;
    } else if (diff === 6) {
        score = 20;
        description = `Zorlayıcı uyum. <strong>${a1.name}</strong> ve <strong>${a2.name}</strong> birbirinin zıttıdır. Büyük farklar çatışma yaratabilir ama gelişim fırsatı sunar.`;
    } else if (diff === 3 || diff === 9) {
        score = 45;
        description = `Zayıf uyum. <strong>${a1.name}</strong> ve <strong>${a2.name}</strong> arasında enerjisel bir gerilim olabilir. Karşılıklı özveri gerekir.`;
    } else {
        score = 70;
        description = `İyi uyum. <strong>${a1.name}</strong> ve <strong>${a2.name}</strong> arasında dengeli bir ilişki kurulabilir.`;
    }

    document.getElementById('hc-cin-uyum-score').innerText = "%" + score;
    document.getElementById('hc-cin-details').innerHTML = `
        <div class="hc-animal-pair">
            <span>${a1.name} (${a1.trait})</span>
            <span class="hc-vs">VS</span>
            <span>${a2.name} (${a2.trait})</span>
        </div>
        <div class="hc-cin-desc">${description}</div>
    `;

    document.getElementById('hc-cin-burcu-uyumu-result').classList.add('visible');
}

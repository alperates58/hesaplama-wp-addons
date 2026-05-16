function hcTarotRuhHesapla() {
    const dStr = document.getElementById('hc-trc-date').value;
    if (!dStr) {
        alert('Lütfen doğum tarihinizi girin.');
        return;
    }

    const d = new Date(dStr);
    const day = d.getDate();
    const month = d.getMonth() + 1;
    const year = d.getFullYear();

    let birthSum = day + month + year;
    while (birthSum > 22) {
        let t = 0;
        birthSum.toString().split('').forEach(v => t += parseInt(v));
        birthSum = t;
    }

    // Soul card is the reduction of the birth card
    let soulSum = birthSum;
    if (soulSum > 9) {
        let t = 0;
        soulSum.toString().split('').forEach(v => t += parseInt(v));
        soulSum = t;
    }

    const soulCards = {
        1: { name: "Büyücü (The Magician)", desc: "Ruhunuz sınırsız bir yaratma potansiyeliyle dolu. İçsel gücünüzü dış dünyaya yansıtmak için buradasınız." },
        2: { name: "Azize (The High Priestess)", desc: "Ruhunuz sessizliğin ve gizemin içindeki bilgeliği temsil ediyor. Sezgileriniz ruhsal yolculuğunuzun pusulasıdır." },
        3: { name: "İmparatoriçe (The Empress)", desc: "Ruhunuz sevgi ve bolluk enerjisiyle titreşiyor. Hayata güzellik katmak ve beslemek sizin en derin motivasyonunuzdur." },
        4: { name: "İmparator (The Emperor)", desc: "Ruhunuz düzen ve kararlılık arayışında. İçsel disiplininizle hayatınızı ve çevrenizi inşa etme gücüne sahipsiniz." },
        5: { name: "Aziz (The Hierophant)", desc: "Ruhunuz öğrenme ve öğretme aşkıyla dolu. Ruhsal gelenekler ve bilginin derinleşmesi sizin için esastır." },
        6: { name: "Aşıklar (The Lovers)", desc: "Ruhunuz uyum ve denge peşinde. Hayattaki seçimleriniz her zaman sevgi ve değerlerinizle şekilleniyor." },
        7: { name: "Araba (The Chariot)", desc: "Ruhunuz zafer ve odaklanma enerjisi taşıyor. İçsel çatışmalarınızı yöneterek hedeflerinize ulaşma gücüne sahipsiniz." },
        8: { name: "Güç (Strength)", desc: "Ruhunuzun en büyük gücü nezaket ve sabırdır. İçinizdeki vahşi enerjiyi sevgiyle terbiye edebilirsiniz." },
        9: { name: "Ermiş (The Hermit)", desc: "Ruhunuz içsel bir aydınlanma arayışında. Kendi içinizdeki ışığı bularak ruhsal olgunluğa ulaşmak sizin yolunuzdur." }
    };

    const mySoul = soulCards[soulSum];

    document.getElementById('hc-trc-value').innerText = mySoul.name;
    document.getElementById('hc-trc-desc').innerHTML = `<p>${mySoul.desc}</p>`;
    document.getElementById('hc-tarot-ruh-karti-result').classList.add('visible');
}

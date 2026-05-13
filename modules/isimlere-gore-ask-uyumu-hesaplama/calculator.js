function hcAskIsimUyumHesapla() {
    const name1 = document.getElementById('hc-ani-name1').value.trim().toLowerCase();
    const name2 = document.getElementById('hc-ani-name2').value.trim().toLowerCase();

    if (!name1 || !name2) {
        alert('Lütfen her iki ismi de giriniz.');
        return;
    }

    const alphabet = "abcçdefgğhıijklmnoöprsştuüvyz";
    const values = {
        'a': 1, 'b': 2, 'c': 3, 'ç': 4, 'd': 5, 'e': 6, 'f': 7, 'g': 8, 'ğ': 9,
        'h': 1, 'ı': 2, 'i': 3, 'j': 4, 'k': 5, 'l': 6, 'm': 7, 'n': 8, 'o': 9,
        'ö': 1, 'p': 2, 'r': 3, 's': 4, 'ş': 5, 't': 6, 'u': 7, 'ü': 8, 'v': 9,
        'y': 1, 'z': 2
    };

    function calculateNameValue(name) {
        let total = 0;
        for (let char of name) {
            if (values[char]) total += values[char];
        }
        while (total > 9) {
            total = total.toString().split('').reduce((a, b) => parseInt(a) + parseInt(b), 0);
        }
        return total;
    }

    const val1 = calculateNameValue(name1);
    const val2 = calculateNameValue(name2);

    let score = 0;
    let desc = "";

    const diff = Math.abs(val1 - val2);
    if (diff === 0) {
        score = 98;
        desc = "İsimlerinizin titreşimleri mükemmel bir rezonans içinde! Birbirinizi tamamlayan, ruhsal olarak aynı frekansta olan bir çiftsiniz.";
    } else if (diff === 1 || diff === 2) {
        score = 85;
        desc = "İsimleriniz arasında çok güçlü bir çekim var. Hayata bakış açınız ve enerjiniz birbirini destekleyen bir yapıda.";
    } else if (diff === 3 || diff === 4) {
        score = 70;
        desc = "Uyumlu bir birliktelik. Bazı konularda farklı düşünseniz de, bu farklılıklar ilişkinize renk katıyor.";
    } else {
        score = 60;
        desc = "İsim titreşimleriniz farklı melodiler çalıyor. Bu durum ilişkinizde bazen yanlış anlaşılmalara neden olsa da, birbirinizden çok şey öğrenebilirsiniz.";
    }

    let detailedContent = `
        <p><strong>Numerolojik Analiz:</strong> İsminiz olan '${name1.toUpperCase()}' numerolojide ${val1} sayısını temsil ederken, partnerinizin ismi '${name2.toUpperCase()}' ${val2} sayısını temsil ediyor.</p>
        <p><strong>Uyum Yorumu:</strong> ${desc}</p>
        <p><strong>2026 Mesajı:</strong> 2026 yılında isimlerinizin enerjisi, ortak bir yatırım veya yaratıcı bir projede birleşebilir. İletişimde 'net' olmayı ve birbirinizin ismini sevgiyle anmayı unutmayın; çünkü isimler en güçlü mantralardır.</p>
    `;

    document.getElementById('hc-ani-value').innerText = `% ${score}`;
    document.getElementById('hc-ani-desc').innerHTML = detailedContent;
    document.getElementById('hc-ani-result').classList.add('visible');
}

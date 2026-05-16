function hcLifePurposeHesapla() {
    const birthStr = document.getElementById('hc-lp-birth').value;

    if (!birthStr) {
        alert('Lütfen doğum tarihinizi girin.');
        return;
    }

    const d = new Date(birthStr);
    const day = d.getDate();
    const month = d.getMonth() + 1;
    const year = d.getFullYear();

    function reduce(num) {
        let s = 0;
        while (num > 0 || s > 9) {
            if (num === 0) { num = s; s = 0; }
            s += num % 10;
            num = Math.floor(num / 10);
        }
        return s;
    }

    const lpNumber = reduce(reduce(day) + reduce(month) + reduce(year));
    const bdNumber = reduce(day);
    
    let lifePurpose = reduce(lpNumber + bdNumber);

    const descriptions = {
        1: "Kendine güvenen bir lider olarak yeni yollar açmak ve ilham vermek.",
        2: "Huzur ve denge inşa ederek toplulukları bir araya getirmek.",
        3: "Yaratıcılığını kullanarak dünyayı neşelendirmek ve iyileştirmek.",
        4: "Güven inşa etmek, düzen kurmak ve kalıcı değerler bırakmak.",
        5: "Deneyimlerini paylaşarak başkalarının özgürleşmesine rehberlik etmek.",
        6: "Sevgi ve şifa ile sorumluluk alarak topluma hizmet etmek.",
        7: "Hakikati aramak ve bilgisini başkalarıyla paylaşarak ışık olmak.",
        8: "Maddi ve manevi bolluğu yöneterek adaleti tesis etmek.",
        9: "Evrensel sevgiyi yaymak ve insanlığı dönüştürecek işler yapmak."
    };

    document.getElementById('hc-res-lp-val').innerText = lifePurpose;
    document.getElementById('hc-res-lp-desc').innerText = descriptions[lifePurpose] || "";
    document.getElementById('hc-yasam-amaci-sayisi-hesaplama-result').classList.add('visible');
}

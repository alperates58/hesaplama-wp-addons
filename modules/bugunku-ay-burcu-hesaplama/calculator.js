function hcTodayMoonSignHesapla() {
    const dateStr = document.getElementById('hc-tm-date').value;
    if (!dateStr) { alert('Lütfen tarih seçin.'); return; }

    const date = new Date(dateStr + 'T12:00:00');
    function getJD(d) { return (d.getTime() / 86400000) - (d.getTimezoneOffset() / 1440) + 2440587.5; }
    const n = getJD(date) - 2451545.0;

    let Lm = (218.316 + 13.176396 * n) % 360;
    let Mm = (134.963 + 13.064993 * n) % 360;
    let moonL = (Lm + 6.289 * Math.sin(Mm * Math.PI / 180) + 360) % 360;

    const signs = ["Koç", "Boğa", "İkizler", "Yengeç", "Aslan", "Başak", "Terazi", "Akrep", "Yay", "Oğlak", "Kova", "Balık"];
    const signIndex = Math.floor(moonL / 30);
    const signName = signs[signIndex];

    const moonEnergy = {
        "Koç": "Enerjik, sabırsız ve hareketli bir gün. Yeni başlangıçlar için cesaret verir.",
        "Boğa": "Huzurlu, keyifli ve maddi konuların ön planda olduğu bir gün. Sabır gerektiren işler için uygun.",
        "İkizler": "Hareketli, iletişim dolu ve meraklı bir gün. Sosyalleşmek ve bilgi edinmek için ideal.",
        "Yengeç": "Hassas, korumacı ve ailevi konuların ön planda olduğu bir gün. Evde vakit geçirmek iyi gelebilir.",
        "Aslan": "Yaratıcı, özgüvenli ve dikkat çekici bir gün. Kendinizi ifade etmek ve eğlenmek için harika.",
        "Başak": "Detaycı, titiz ve çalışkan bir gün. Yarım kalan işleri tamamlamak ve düzen kurmak için uygun.",
        "Terazi": "Uyumlu, sosyal ve estetik konuların ön planda olduğu bir gün. İlişkilerde denge kurmak için ideal.",
        "Akrep": "Derin, tutkulu ve sezgisel bir gün. Araştırma yapmak ve gizli kalmış konuları çözmek için uygun.",
        "Yay": "Maceracı, iyimser ve özgürlükçü bir gün. Seyahat planları ve yeni keşifler için destekleyici.",
        "Oğlak": "Disiplinli, ciddi ve sorumlulukların ön planda olduğu bir gün. Kariyer hedefleri için çalışmak verimli olur.",
        "Kova": "Yenilikçi, sosyal ve toplumsal konuların ön planda olduğu bir gün. Farklı fikirler ve gruplar için uygun.",
        "Balık": "Sezgisel, merhametli ve hayalperest bir gün. Sanat, meditasyon ve ruhsal çalışmalar için harika."
    };

    document.getElementById('hc-tm-val').innerText = `Ay ${signName} Burcunda`;
    document.getElementById('hc-tm-desc').innerText = `Bugün Ay ${signName} burcunda ilerliyor. Günün genel enerjisi: ${moonEnergy[signName]}`;
    document.getElementById('hc-today-moon-result').classList.add('visible');
}

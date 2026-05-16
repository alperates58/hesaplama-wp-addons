function hcKisiselGunHesapla() {
    const birthStr = document.getElementById('hc-pd-birth').value;
    const targetStr = document.getElementById('hc-pd-target').value;
    if (!birthStr || !targetStr) { alert('Lütfen tüm alanları doldurun.'); return; }

    const birthDate = new Date(birthStr);
    const targetDate = new Date(targetStr);
    
    function reduce(num) {
        let s = num.toString();
        while (s.length > 1) {
            let sum = 0;
            for (let char of s) sum += parseInt(char);
            s = sum.toString();
        }
        return parseInt(s);
    }

    const bDay = birthDate.getDate();
    const bMonth = birthDate.getMonth() + 1;
    const tYear = targetDate.getFullYear();
    const tMonth = targetDate.getMonth() + 1;
    const tDay = targetDate.getDate();
    
    // Personal Year
    let pySum = bDay + bMonth;
    let yearS = tYear.toString();
    for (let char of yearS) pySum += parseInt(char);
    const py = reduce(pySum);
    
    // Personal Month
    const pm = reduce(py + tMonth);
    
    // Personal Day = Personal Month + Target Day
    const result = reduce(pm + tDay);

    const interpretations = {
        1: "Yeni başlangıçlar ve bireysel başarı günü. Liderlik etmek için uygun zaman.",
        2: "Uyum ve hassasiyet günü. Başkalarıyla işbirliği yapmak önem kazanır.",
        3: "İletişim ve neşe günü. Yaratıcı projeler ve sosyal etkinlikler için ideal.",
        4: "Çalışma ve istikrar günü. Yarım kalan işleri tamamlamak için pratik adımlar atın.",
        5: "Değişim ve özgürlük günü. Beklenmedik haberler veya seyahatler gündeme gelebilir.",
        6: "Sevgi ve şifa günü. Ev, aile ve sevdiklerinizle ilgilenmek huzur verir.",
        7: "Ruhsal farkındalık ve bilgi günü. Yalnız kalıp düşünmek ve araştırma yapmak iyi gelir.",
        8: "Bereket ve otorite günü. Maddi planlar ve kariyer hedefleri için şanslı bir gün.",
        9: "Tamamlanma ve arınma günü. Hayatınızdan çıkarmanız gereken şeylere odaklanın."
    };

    document.getElementById('hc-pd-val').innerText = result;
    document.getElementById('hc-pd-desc').innerText = interpretations[result];

    document.getElementById('hc-personal-day-result').classList.add('visible');
}

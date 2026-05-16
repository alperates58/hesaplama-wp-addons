function hcKisiselAyHesapla() {
    const birthStr = document.getElementById('hc-pm-birth').value;
    const targetStr = document.getElementById('hc-pm-target').value;
    if (!birthStr || !targetStr) { alert('Lütfen tüm alanları doldurun.'); return; }

    const birthDate = new Date(birthStr);
    const targetDate = new Date(targetStr + "-01");
    
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
    
    // Personal Year first
    let pySum = bDay + bMonth;
    let yearS = tYear.toString();
    for (let char of yearS) pySum += parseInt(char);
    const py = reduce(pySum);
    
    // Personal Month = Personal Year + Target Month
    const result = reduce(py + tMonth);

    const interpretations = {
        1: "Harekete geçme ve liderlik ayı. Yeni fikirleri hayata geçirmek için harika.",
        2: "Bekleme ve gözlem ayı. Detaylara dikkat etmek ve sabırlı olmak kazandırır.",
        3: "Sosyal genişleme ve yaratıcılık ayı. Kendinizi ifade etmekten çekinmeyin.",
        4: "Pratik işler ve organizasyon ayı. Yarım kalmış işleri bitirmek için ideal.",
        5: "Hareketlilik ve sürprizler ayı. Rutinin dışına çıkmak iyi gelebilir.",
        6: "Huzur ve sorumluluk ayı. Sevdiklerinizle vakit geçirmek önceliğiniz olmalı.",
        7: "Düşünme ve analiz ayı. Kalabalıklardan uzaklaşıp kendinizi dinleyin.",
        8: "Verim ve güç ayı. Maddi konularda kararlı adımlar atma zamanı.",
        9: "Bitiş ve arınma ayı. Size yük olan her şeyi serbest bırakın."
    };

    document.getElementById('hc-pm-val').innerText = result;
    document.getElementById('hc-pm-desc').innerText = interpretations[result];

    document.getElementById('hc-personal-month-result').classList.add('visible');
}

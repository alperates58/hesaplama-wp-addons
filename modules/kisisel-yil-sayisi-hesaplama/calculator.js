function hcKisiselYilHesapla() {
    const birthStr = document.getElementById('hc-py-birth').value;
    const yearStr = document.getElementById('hc-py-year').value;
    if (!birthStr || !yearStr) { alert('Lütfen tüm alanları doldurun.'); return; }

    const birthDate = new Date(birthStr);
    const targetYear = parseInt(yearStr);
    
    function reduce(num) {
        let s = num.toString();
        while (s.length > 1) {
            let sum = 0;
            for (let char of s) sum += parseInt(char);
            s = sum.toString();
        }
        return parseInt(s);
    }

    const day = birthDate.getDate();
    const month = birthDate.getMonth() + 1;
    
    // Personal Year = Day + Month + Target Year
    let sum = day + month;
    let yearS = targetYear.toString();
    for (let char of yearS) sum += parseInt(char);
    
    const result = reduce(sum);

    const interpretations = {
        1: "Yeni başlangıçlar, bağımsızlık ve eylem yılı. Yeni projelere başlamak için mükemmel zaman.",
        2: "İşbirliği, denge ve sabır yılı. İlişkilere odaklanma ve diplomasi zamanı.",
        3: "Yaratıcılık, sosyal etkileşim ve kendini ifade etme yılı. Neşe ve büyüme dönemi.",
        4: "Disiplin, çalışma ve temel atma yılı. Düzen kurmak ve sorumluluk almak gerek.",
        5: "Değişim, özgürlük ve macera yılı. Esnek olma ve yeni fırsatları değerlendirme zamanı.",
        6: "Sorumluluk, aile ve hizmet yılı. Ev yaşamı ve sevdiklerinize odaklanma dönemi.",
        7: "İçe dönüş, analiz ve ruhsal gelişim yılı. Dinlenme, öğrenme ve meditasyon zamanı.",
        8: "Güç, başarı ve maddi kazanç yılı. Kariyerde ilerleme ve emeklerin karşılığını alma dönemi.",
        9: "Tamamlanma, bırakma ve dönüşüm yılı. Eski olanı bitirme ve yeni döngüye hazırlanma zamanı."
    };

    document.getElementById('hc-py-val').innerText = result;
    document.getElementById('hc-py-desc').innerText = interpretations[result];

    document.getElementById('hc-personal-year-result').classList.add('visible');
}

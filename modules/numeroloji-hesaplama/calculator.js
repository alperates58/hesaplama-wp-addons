function hcFullNumHesapla() {
    const name = document.getElementById('hc-full-name').value.trim().toUpperCase();
    const dateStr = document.getElementById('hc-full-date').value;

    if (!name || !dateStr) { alert('Lütfen adınızı ve doğum tarihinizi girin.'); return; }

    const map = { 'A': 1, 'J': 1, 'S': 1, 'Ş': 1, 'B': 2, 'K': 2, 'T': 2, 'C': 3, 'Ç': 3, 'L': 3, 'U': 3, 'Ü': 3, 'D': 4, 'M': 4, 'V': 4, 'E': 5, 'N': 5, 'F': 6, 'O': 6, 'Ö': 6, 'G': 7, 'Ğ': 7, 'P': 7, 'H': 8, 'Z': 8, 'I': 9, 'İ': 9, 'R': 9 };
    const vowels = { 'A': 1, 'E': 5, 'I': 9, 'İ': 9, 'O': 6, 'Ö': 6, 'U': 3, 'Ü': 3 };

    function reduce(num) {
        if (num === 11 || num === 22 || num === 33) return num;
        if (num < 10) return num;
        return reduce(num.toString().split('').reduce((a, b) => parseInt(a) + parseInt(b), 0));
    }

    // Yaşam Yolu
    const dateDigits = dateStr.replace(/-/g, '').split('').map(Number);
    const lp = reduce(dateDigits.reduce((a, b) => a + b, 0));

    // Kader
    let kTotal = 0;
    for (let char of name) if (map[char]) kTotal += map[char];
    const destiny = reduce(kTotal);

    // Ruh
    let rTotal = 0;
    for (let char of name) if (vowels[char]) rTotal += vowels[char];
    const soul = reduce(rTotal);

    document.getElementById('hc-val-lp').innerText = lp;
    document.getElementById('hc-val-destiny').innerText = destiny;
    document.getElementById('hc-val-soul').innerText = soul;

    const desc = `
        <p><strong>Numerolojik Analiziniz Tamamlandı!</strong></p>
        <p>Yaşam Yolu sayınız <strong>${lp}</strong>, bu hayatta hangi ana rotayı izleyeceğinizi gösterir. Kader sayınız <strong>${destiny}</strong>, isminizin size yüklediği misyonu ve potansiyeli temsil eder. Ruh sayınız <strong>${soul}</strong> ise en derin arzularınızı ve içsel motivasyonunuzu yansıtır.</p>
        <p>Bu üç ana sayının birleşimi, sizin hem zihinsel hem de ruhsal yapınızın haritasını oluşturur. Yaşam yolunuzdaki engelleri kaderinizin getirdiği yeteneklerle aşabilir, ruhunuzun arzularını gerçekleştirmek için isminizin enerjisinden güç alabilirsiniz. 2026 yılı enerjileriyle bu sayıların frekansı, sizin için yeni kapılar açacak potansiyele sahiptir.</p>
    `;

    document.getElementById('hc-full-desc').innerHTML = desc;
    document.getElementById('hc-numeroloji-result').classList.add('visible');
}

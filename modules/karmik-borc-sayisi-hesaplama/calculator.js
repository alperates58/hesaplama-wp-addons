function hcKarmicDebtHesapla() {
    const name = document.getElementById('hc-kd-name').value.trim().toUpperCase();
    const birthStr = document.getElementById('hc-kd-birth').value;

    if (!name || !birthStr) {
        alert('Lütfen adınızı ve doğum tarihinizi girin.');
        return;
    }

    const birthDate = new Date(birthStr);
    const day = birthDate.getDate();
    const month = birthDate.getMonth() + 1;
    const year = birthDate.getFullYear();

    const karmicNumbers = [13, 14, 16, 19];
    let found = [];

    // Check Day, Month, Year sums
    if (karmicNumbers.includes(day)) found.push(day);
    if (karmicNumbers.includes(month)) found.push(month);
    
    function getIntermediateSum(num) {
        let s = 0;
        while (num > 0) {
            s += num % 10;
            num = Math.floor(num / 10);
        }
        return s;
    }

    const yearSum = getIntermediateSum(year);
    if (karmicNumbers.includes(yearSum)) found.push(yearSum);

    // Life Path intermediate sum
    const lpRaw = day + month + year;
    const lpInt = getIntermediateSum(lpRaw);
    if (karmicNumbers.includes(lpInt)) found.push(lpInt);

    // Expression number intermediate sum
    const charMap = {
        'A': 1, 'J': 1, 'S': 1, 'Ş': 1, 'B': 2, 'K': 2, 'T': 2, 'C': 3, 'Ç': 3, 'L': 3, 'U': 3, 'Ü': 3, 'D': 4, 'M': 4, 'V': 4, 'E': 5, 'N': 5, 'W': 5, 'F': 6, 'O': 6, 'Ö': 6, 'X': 6, 'G': 7, 'Ğ': 7, 'P': 7, 'Y': 7, 'H': 8, 'Q': 8, 'Z': 8, 'I': 9, 'İ': 9, 'R': 9
    };
    let nameTotal = 0;
    for (let char of name) {
        if (charMap[char]) nameTotal += charMap[char];
    }
    const nameInt = getIntermediateSum(nameTotal);
    if (karmicNumbers.includes(nameInt)) found.push(nameInt);

    // Remove duplicates
    found = [...new Set(found)];

    const debtDesc = {
        13: "13 Borcu: Odaklanma ve disiplinle ilgili. Tembellikten kaçınmalı ve dürüst çalışmalısınız.",
        14: "14 Borcu: Özgürlüğü yanlış kullanmakla ilgili. Aşırılıklardan kaçınmalı ve dengeyi bulmalısınız.",
        16: "16 Borcu: Ego ve ilişkilerle ilgili. Kibirli olmaktan kaçınmalı ve ruhsal dürüstlüğe odaklanmalısınız.",
        19: "19 Borcu: Gücü kötüye kullanmakla ilgili. Başkalarına yardım etmeyi ve bağımsızlığı öğrenmelisiniz."
    };

    if (found.length > 0) {
        document.getElementById('hc-res-kd-val').innerText = found.join(', ');
        let descHtml = "<ul>";
        found.forEach(n => {
            descHtml += `<li>${debtDesc[n]}</li>`;
        });
        descHtml += "</ul>";
        document.getElementById('hc-res-kd-desc').innerHTML = descHtml;
    } else {
        document.getElementById('hc-res-kd-val').innerText = "Yok";
        document.getElementById('hc-res-kd-desc').innerText = "Bu verilere göre belirgin bir karmik borç sayısı bulunamadı.";
    }

    document.getElementById('hc-karmik-borc-sayisi-hesaplama-result').classList.add('visible');
}

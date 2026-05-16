function hcNumerologyLoveHesapla() {
    const b1 = document.getElementById('hc-nl-birth-1').value;
    const b2 = document.getElementById('hc-nl-birth-2').value;

    if (!b1 || !b2) {
        alert('Lütfen her iki kişinin doğum tarihini girin.');
        return;
    }

    function getLifePath(dateStr) {
        const d = new Date(dateStr);
        let sum = d.getDate() + (d.getMonth() + 1) + d.getFullYear();
        
        function reduce(num) {
            let s = 0;
            while (num > 0 || s > 9) {
                if (num === 0) { num = s; s = 0; }
                s += num % 10;
                num = Math.floor(num / 10);
            }
            return s;
        }
        return reduce(sum);
    }

    const lp1 = getLifePath(b1);
    const lp2 = getLifePath(b2);

    // Basic compatibility matrix (simplified)
    const compatibility = {
        1: [1, 3, 5, 7, 9],
        2: [2, 4, 6, 8],
        3: [1, 3, 6, 9],
        4: [2, 4, 7, 8],
        5: [1, 5, 7, 9],
        6: [2, 3, 6, 9],
        7: [1, 4, 5, 7],
        8: [2, 4, 8],
        9: [1, 3, 6, 9]
    };

    let score = 0;
    let desc = "";

    if (lp1 === lp2) {
        score = 95;
        desc = "Mükemmel uyum! Benzer enerjilere sahipsiniz, birbirinizi çok iyi anlarsınız.";
    } else if (compatibility[lp1].includes(lp2)) {
        score = 85;
        desc = "Çok iyi uyum! Farklılıklarınız birbirinizi tamamlıyor, dengeli bir ilişki.";
    } else {
        score = 65;
        desc = "Uyumlu taraflarınız var ancak sabır ve karşılıklı anlayış gerektiren bir ilişki.";
    }

    document.getElementById('hc-res-nl-val').innerText = "%" + score;
    document.getElementById('hc-res-nl-desc').innerText = `1. Kişi Yaşam Yolu: ${lp1}, 2. Kişi Yaşam Yolu: ${lp2}. ${desc}`;
    document.getElementById('hc-numeroloji-ask-uyumu-hesaplama-result').classList.add('visible');
}

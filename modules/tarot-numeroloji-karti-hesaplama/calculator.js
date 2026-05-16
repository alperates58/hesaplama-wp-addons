function hcTarotNumHesapla() {
    const dStr = document.getElementById('hc-tnc-date').value;
    if (!dStr) {
        alert('Lütfen doğum tarihinizi girin.');
        return;
    }

    const digits = dStr.replace(/-/g, '').split('');
    let sum = 0;
    digits.forEach(d => sum += parseInt(d));

    while (sum > 9) {
        let tempSum = 0;
        sum.toString().split('').forEach(d => tempSum += parseInt(d));
        sum = tempSum;
    }

    const cards = {
        1: { name: "1 - Büyücü (The Magician)", desc: "Siz bir yaratıcısınız. Elinizdeki kaynakları kullanarak yeni dünyalar kurma gücüne sahipsiniz. Kararlılık ve irade sizin anahtar kelimeleriniz." },
        2: { name: "2 - Azize (The High Priestess)", desc: "Sezgisel ve derin bir bilgeliğe sahipsiniz. Olayların arkasındaki gizli gerçekleri görebilir ve sessizliğin gücünü kullanabilirsiniz." },
        3: { name: "3 - İmparatoriçe (The Empress)", desc: "Bolluk, bereket ve sevgi enerjisiyle dolusunuz. Besleyici, yaratıcı ve doğurgan bir doğanız var." },
        4: { name: "4 - İmparator (The Emperor)", desc: "Düzen, disiplin ve otoriteyi temsil ediyorsunuz. Hayatınızı sağlam temeller üzerine kurar ve koruyucu bir liderlik sergilersiniz." },
        5: { name: "5 - Aziz (The Hierophant)", desc: "Geleneklere, öğrenmeye ve ruhsal rehberliğe önem verirsiniz. Toplumsal uyum ve bilginin paylaşılması sizin için esastır." },
        6: { name: "6 - Aşıklar (The Lovers)", desc: "Seçimler, uyum ve ikili ilişkiler sizin yaşam dersinizdir. Kalbinizin sesini dinleyerek dengeyi bulmayı öğrenirsiniz." },
        7: { name: "7 - Araba (The Chariot)", desc: "Odaklanma ve irade gücüyle her türlü engeli aşabilirsiniz. Hareket, hız ve zafer sizin enerjinizdir." },
        8: { name: "8 - Güç (Strength)", desc: "İçsel bir güç ve sarsılmaz bir sabra sahipsiniz. Zorlukları nezaket ve sevgiyle yenme yeteneğiniz var." },
        9: { name: "9 - Ermiş (The Hermit)", desc: "Bilgelik ve iç gözlem arayışındasınız. Kendi iç ışığınızı bularak başkalarına rehberlik edecek olgunluğa sahipsiniz." }
    };

    const myCard = cards[sum];

    document.getElementById('hc-tnc-value').innerText = myCard.name;
    document.getElementById('hc-tnc-desc').innerHTML = `<p>${myCard.desc}</p>`;
    document.getElementById('hc-tarot-numeroloji-karti-result').classList.add('visible');
}

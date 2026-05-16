function hcSansliRenkTarihHesapla() {
    const dStr = document.getElementById('hc-lcd-date').value;
    if (!dStr) {
        alert('Lütfen doğum tarihinizi seçin.');
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

    const colors = {
        1: { name: "Kırmızı", hex: "#FF0000", desc: "1 sayısı liderliği temsil eder. Kırmızı size canlılık ve cesaret verir." },
        2: { name: "Turuncu", hex: "#FFA500", desc: "2 sayısı uyumu temsil eder. Turuncu yaratıcılığınızı ve sosyal bağlarınızı güçlendirir." },
        3: { name: "Sarı", hex: "#FFFF00", desc: "3 sayısı neşeyi temsil eder. Sarı zekanızı keskinleştirir ve iyimserliğinizi artırır." },
        4: { name: "Yeşil", hex: "#008000", desc: "4 sayısı istikrarı temsil eder. Yeşil size güven ve huzur verir." },
        5: { name: "Mavi", hex: "#0000FF", desc: "5 sayısı özgürlüğü temsil eder. Mavi iletişiminizi ve macera ruhunuzu destekler." },
        6: { name: "Çivit Mavisi (İndigo)", hex: "#4B0082", desc: "6 sayısı sevgiyi temsil eder. Bu derin mavi tonu sezgilerinizi ve sorumluluk duygunuzu pekiştirir." },
        7: { name: "Mor", hex: "#800080", desc: "7 sayısı bilgeliği temsil eder. Mor spiritüel farkındalığınızı artırır." },
        8: { name: "Pembe", hex: "#FFC0CB", desc: "8 sayısı gücü temsil eder. Pembe otorite ile şefkat arasındaki dengeyi kurmanıza yardımcı olur." },
        9: { name: "Altın", hex: "#FFD700", desc: "9 sayısı tamamlanmayı temsil eder. Altın rengi size evrensel sevgi ve başarı enerjisi getirir." }
    };

    const myColor = colors[sum];

    document.getElementById('hc-lcd-value').innerText = myColor.name;
    document.getElementById('hc-lcd-box').style.backgroundColor = myColor.hex;
    document.getElementById('hc-lcd-desc').innerHTML = `<p>${myColor.desc}</p>`;
    document.getElementById('hc-dogum-tarihine-gore-sansli-renk-result').classList.add('visible');
}

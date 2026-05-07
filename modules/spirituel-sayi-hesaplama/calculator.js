function hcSpirituelBul() {
    const dStr = document.getElementById('hc-spirit-date').value;
    const name = document.getElementById('hc-spirit-name').value;
    if (!dStr || !name) { alert('Lütfen bilgileri girin.'); return; }
    
    const dSum = dStr.replace(/-/g, '').split('').reduce((a, b) => parseInt(a) + parseInt(b), 0);
    const nLen = name.trim().length;
    let res = ((dSum + nLen) % 9) + 1;

    const sayilar = {
        1: { name: "1 - Öncü Ruh", desc: "Spiritüel sayınız 1, sizin bu dünyaya yeni yollar açmak ve liderlik etmek için geldiğinizi gösterir. İçsel gücünüzü keşfetmeli ve kendi gerçekliğinizi yaratmalısınız." },
        2: { name: "2 - Uyumlu Ruh", desc: "Sizin sayınız 2, sevgi, ortaklık ve denge üzerine kuruludur. Hayat amacınız, kutuplaşmış dünyada barışı ve birliği sağlamak, ruhsal bağlar kurmaktır." },
        3: { name: "3 - Yaratıcı Ruh", desc: "Sayınız 3, neşe ve kendini ifade etme enerjisidir. Dünyayı sanatınızla, sözlerinizle veya sadece varlığınızdaki neşeyle şifalandırmak için buradasınız." },
        4: { name: "4 - İnşacı Ruh", desc: "Sayınız 4, disiplin ve somut başarıyı simgeler. Ruhsal vizyonları bu dünyada kalıcı, güvenli ve düzenli yapılara dönüştürmek sizin asıl görevinizdir." },
        5: { name: "5 - Özgür Ruh", desc: "Sayınız 5, değişim ve macera demektir. Hayatın her türlü deneyimini tatmalı, sınırları aşmalı ve özgürlüğün ruhsal anlamını keşfetmelisiniz." },
        6: { name: "6 - Şifacı Ruh", desc: "Sayınız 6, sorumluluk ve merhamet merkezlidir. Sevdiklerinizi beslemek, bir yuva kurmak ve çevrenize şifa dağıtmak sizin ruhsal misyonunuzdur." },
        7: { name: "7 - Bilge Ruh", desc: "Sayınız 7, derinlemesine düşünme ve ruhsal keşif sayıdır. Gerçeğin peşinden gitmeli, yalnızlığın içindeki bilgeliği bulmalı ve manevi dünyayı keşfetmelisiniz." },
        8: { name: "8 - Güçlü Ruh", desc: "Sayınız 8, otorite ve bollukla ilgilidir. Maddi dünyayı ruhsal yasalarla yönetmeyi öğrenmek ve gücü adaletle kullanmak sizin sınavınızdır." },
        9: { name: "9 - Evrensel Ruh", desc: "Sayınız 9, tamamlanma ve evrensel sevgidir. Tüm insanlığa hizmet etmek, bağışlamak ve döngüleri kapatmak sizin en yüksek ruhsal aşamanızdır." }
    };

    document.getElementById('hc-spirit-val').innerText = sayilar[res].name;
    document.getElementById('hc-spirit-desc').innerText = sayilar[res].desc;
    document.getElementById('hc-spirit-result').classList.add('visible');
}

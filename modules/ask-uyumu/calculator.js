function hcAskUyumuHesapla() {
    const n1 = document.getElementById('hc-love-name1').value.trim().toUpperCase();
    const n2 = document.getElementById('hc-love-name2').value.trim().toUpperCase();

    if (!n1 || !n2) { alert('Lütfen her iki adı da girin.'); return; }

    function getSum(name) {
        let s = 0;
        for (let char of name) s += char.charCodeAt(0);
        return s;
    }

    const s1 = getSum(n1);
    const s2 = getSum(n2);
    
    // Pseudo-random but deterministic score
    let rawSkor = ((s1 + s2) % 61) + 40; // 40-100 range
    
    // Some specific lucky letters/combinations
    if (n1.includes('A') && n2.includes('A')) rawSkor += 5;
    if (n1.length === n2.length) rawSkor += 3;
    
    const skor = Math.min(100, rawSkor);

    let desc = "";
    if (skor >= 90) {
        desc = `İnanılmaz bir aşk uyumu! İsimlerinizin frekansı birbirini mükemmel bir şekilde tamamlıyor. Aranızda çok güçlü bir çekim, derin bir anlayış ve ruhsal bir bağ var. Sizler adeta birbiriniz için yaratılmış iki ruh gibisiniz. Bu ilişki, her türlü zorluğun üstesinden gelebilecek sarsılmaz bir güven ve tutku üzerine kurulu. 2026 yılı, aşkınızı bir üst seviyeye taşımak için harika fırsatlar sunabilir.`;
    } else if (skor >= 80) {
        desc = `Harika bir uyum! Birbirinizi çok iyi anlıyor ve birlikteyken kendinizi huzurlu hissediyorsunuz. Romantik anlar ve keyifli sohbetler ilişkinizin temel taşı. Aranızdaki enerji oldukça dengeli ve besleyici. Ufak tefek fikir ayrılıklarını bile birbirinize olan sevginizle kolayca çözebilirsiniz. Birlikte büyümeye ve birbirinize ilham vermeye devam ettiğiniz sürece, çok mutlu ve uzun ömürlü bir birliktelik sizi bekliyor.`;
    } else if (skor >= 70) {
        desc = `Güçlü bir potansiyel! Aranızda göz ardı edilemez bir çekim ve merak var. Birbirinizi keşfetmekten büyük keyif alıyorsunuz. Zaman zaman farklı bakış açılarına sahip olsanız da, bu durum ilişkinize renk katıyor. İletişimi her zaman açık tutar ve birbirinizin bireysel özgürlüklerine saygı duyarsanız, bu aşk çok daha derinleşebilir. Birbirinizi tamamlamayı öğrendiğinizde, her şeyin çok daha güzel olduğunu göreceksiniz.`;
    } else {
        desc = `Öğretici bir ilişki! Birbirinizden öğrenecek çok şeyiniz var. Enerjileriniz başlangıçta biraz farklı yönlere çekilse de, bu durum aslında birbirinizin eksik yanlarını görmenizi sağlıyor. Bu ilişkide sabır, empati ve çaba göstermek çok önemli. Birbirinizin dertlerini dinleyip ortak bir paydada buluşmayı başardığınızda, çok daha bilinçli ve sağlam bir bağ kurabilirsiniz. Aşk, sadece uyum değil, aynı zamanda birlikte gelişmektir.`;
    }

    document.getElementById('hc-ask-skor').innerText = "%" + skor;
    document.getElementById('hc-ask-desc').innerHTML = desc;
    document.getElementById('hc-ask-uyumu-result').classList.add('visible');
}

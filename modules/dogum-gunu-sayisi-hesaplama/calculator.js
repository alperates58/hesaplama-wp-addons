function hcDogumGunuSayisiHesapla() {
    const dateStr = document.getElementById('hc-bn-date').value;
    if (!dateStr) { alert('Lütfen tarih seçin.'); return; }

    const date = new Date(dateStr);
    const day = date.getDate();
    
    function reduce(num) {
        let s = num.toString();
        while (s.length > 1) {
            let sum = 0;
            for (let char of s) sum += parseInt(char);
            s = sum.toString();
        }
        return parseInt(s);
    }

    const result = reduce(day);

    const interpretations = {
        1: "Liderlik yetenekleri güçlü, yaratıcı ve bağımsız bir kişilik. Başlatma gücü yüksektir.",
        2: "Hassas, diplomatik ve işbirliğine yatkın. İnsanlarla bağ kurma yeteneği ön plandadır.",
        3: "Kendini ifade etme gücü yüksek, sosyal ve neşeli. Sanatsal yönleri güçlü olabilir.",
        4: "Pratik, çalışkan ve güvenilir. Hayatında düzen ve disiplin kurmayı sever.",
        5: "Özgürlüğüne düşkün, meraklı ve değişime açık. Yeni deneyimler peşinde koşar.",
        6: "Sorumluluk sahibi, şefkatli ve aileye önem veren. Huzur ve denge arayışındadır.",
        7: "Analitik, içe dönük ve bilge. Gerçekleri sorgulamayı ve derinleşmeyi sever.",
        8: "Hırslı, güçlü ve organizasyon yeteneği yüksek. Maddi dünyada başarılı olmaya odaklıdır.",
        9: "Hümanist, cömert ve geniş görüşlü. İnsanlığa hizmet etme ve tamamlama enerjisi taşır."
    };

    document.getElementById('hc-bn-val').innerText = result;
    document.getElementById('hc-bn-desc').innerText = interpretations[result];

    document.getElementById('hc-birthday-number-result').classList.add('visible');
}

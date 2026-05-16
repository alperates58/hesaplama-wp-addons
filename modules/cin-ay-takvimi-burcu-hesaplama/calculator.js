function hcCinAyBurcuHesapla() {
    const dInput = document.getElementById('hc-cmb-date').value;
    if (!dInput) {
        alert('Lütfen doğum tarihinizi seçin.');
        return;
    }

    const d = new Date(dInput);
    const month = d.getMonth() + 1; // 1-12
    const day = d.getDate();

    let animal = "";
    let desc = "";

    // Chinese Solar Months (Approximation)
    if ((month === 2 && day >= 4) || (month === 3 && day <= 5)) {
        animal = "Kaplan";
        desc = "İçsel hayvanınız Kaplan, duygusal dünyanızın tutkulu, cesur ve bağımsız olduğunu gösterir. İçinizde güçlü bir adalet duygusu ve macera isteği taşırsınız.";
    } else if ((month === 3 && day >= 6) || (month === 4 && day <= 4)) {
        animal = "Tavşan";
        desc = "İçsel hayvanınız Tavşan, hassas, barışçıl ve diplomatik bir ruh halini temsil eder. Çevrenizle uyum içinde olmayı seversiniz ve sezgileriniz çok güçlüdür.";
    } else if ((month === 4 && day >= 5) || (month === 5 && day <= 4)) {
        animal = "Ejderha";
        desc = "İçsel hayvanınız Ejderha, büyük hayaller ve yaratıcı bir enerji taşır. İç dünyanızda kendinize güveniniz yüksektir ve idealleriniz için savaşmaktan çekinmezsiniz.";
    } else if ((month === 5 && day >= 5) || (month === 6 && day <= 5)) {
        animal = "Yılan";
        desc = "İçsel hayvanınız Yılan, derin düşünceli, gözlemci ve gizemli bir doğayı yansıtır. Duygularınızı dışarıya vurmadan önce dikkatle tartarsınız ve çok iyi bir stratejistsiniz.";
    } else if ((month === 6 && day >= 6) || (month === 7 && day <= 6)) {
        animal = "At";
        desc = "İçsel hayvanınız At, özgürlüğüne düşkün ve hareketli bir duygusal yapıya işaret eder. Kısıtlanmaktan hoşlanmazsınız ve yaşam sevinciniz bulaşıcıdır.";
    } else if ((month === 7 && day >= 7) || (month === 8 && day <= 6)) {
        animal = "Keçi";
        desc = "İçsel hayvanınız Keçi, sanatsal, şefkatli ve fedakar bir karakteri temsil eder. İç dünyanızda huzur ve güzellik ararsınız, sevdiklerinize karşı çok naziksiniz.";
    } else if ((month === 8 && day >= 7) || (month === 9 && day <= 7)) {
        animal = "Maymun";
        desc = "İçsel hayvanınız Maymun, meraklı, zeki ve esprili bir ruh halini gösterir. Problemleri yaratıcı yollarla çözmeyi seversiniz ve hayatı bir oyun gibi görebilirsiniz.";
    } else if ((month === 9 && day >= 8) || (month === 10 && day <= 7)) {
        animal = "Horoz";
        desc = "İçsel hayvanınız Horoz, dürüst, açık sözlü ve titiz bir duygusal yapıya sahiptir. Prensiplerinize bağlısınız ve iç dünyanızda her şeyin mükemmel olmasını istersiniz.";
    } else if ((month === 10 && day >= 8) || (month === 11 && day <= 6)) {
        animal = "Köpek";
        desc = "İçsel hayvanınız Köpek, sadık, koruyucu ve vefalı bir kalbi temsil eder. Adaletsizliğe dayanamazsınız ve sevdiklerinizin güvenliği sizin için her şeyden önce gelir.";
    } else if ((month === 11 && day >= 7) || (month === 12 && day <= 6)) {
        animal = "Domuz";
        desc = "İçsel hayvanınız Domuz, cömert, dürüst ve yaşamdan keyif alan bir ruhu yansıtır. Saf bir kalbiniz vardır ve insanlara güvenmek istersiniz.";
    } else if ((month === 12 && day >= 7) || (month === 1 && day <= 5)) {
        animal = "Fare";
        desc = "İçsel hayvanınız Fare, kaynaklarını iyi kullanan, zeki ve uyumlu bir doğaya sahiptir. İç dünyanızda pratik çözümler üretmekte üstünüze yoktur.";
    } else { // Jan 6 - Feb 3
        animal = "Öküz";
        desc = "İçsel hayvanınız Öküz, sabırlı, dayanıklı ve kararlı bir ruhu temsil eder. Duygusal dünyanızda sarsılmaz bir güven ve huzur arayışı içindesiniz.";
    }

    document.getElementById('hc-cmb-value').innerText = animal;
    document.getElementById('hc-cmb-desc').innerHTML = `<p>${desc}</p><p><small>Çin astrolojisinde Ay Burcu (İçsel Hayvan), kişinin gerçek duygusal karakterini ve özel yaşamını temsil eder.</small></p>`;
    document.getElementById('hc-cin-ay-takvimi-burcu-result').classList.add('visible');
}

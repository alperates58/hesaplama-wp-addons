function hcBurcHesapla() {
    const gun = parseInt(document.getElementById('hc-burc-dogum-gun').value);
    const ay = parseInt(document.getElementById('hc-burc-dogum-ay').value);

    if (!gun || !ay) {
        alert('Lütfen doğum gününüzü ve ayınızı seçin.');
        return;
    }

    let burc = "";
    let aciklama = "";

    if ((ay == 3 && gun >= 21) || (ay == 4 && gun <= 19)) {
        burc = "Koç";
        aciklama = "Koç burcu, Zodyak'ın ilk burcu olarak yeni başlangıçları, cesareti ve sınırsız enerjiyi temsil eder. Ateş elementinin öncü niteliğini taşıyan Koç bireyleri, doğal bir liderlik yeteneğine ve rekabetçi bir ruha sahiptirler. Hayata karşı oldukça dürüst ve doğrudan bir yaklaşımları vardır; düşündüklerini saklamadan ifade ederler. Maceracı yapıları onları bilinmeyene doğru sürüklerken, sabırsızlıkları en büyük sınavları olabilir. Ancak karşılarına çıkan her türlü engeli aşmak için gereken içsel güce ve motivasyona her zaman sahiptirler.";
    } else if ((ay == 4 && gun >= 20) || (ay == 5 && gun <= 20)) {
        burc = "Boğa";
        aciklama = "Boğa burcu, toprak elementinin sabit niteliğiyle güveni, huzuru ve maddi dünyayla olan güçlü bağı simgeler. Sabırları ve dayanıklılıkları ile tanınan Boğa bireyleri, bir işe başladıklarında onu sonuna kadar götürme azmine sahiptirler. Estetik değerlere, konfora ve kaliteli yaşam standartlarına büyük önem verirler. Sadakat, hayatlarındaki en temel değerlerden biridir; sevdiklerine ve prensiplerine sıkı sıkıya bağlıdırlar. Doğayla vakit geçirmek ruhlarını beslerken, değişime karşı gösterdikleri direnç zaman zaman inatçılık olarak algılanabilir.";
    } else if ((ay == 5 && gun >= 21) || (ay == 6 && gun <= 20)) {
        burc = "İkizler";
        aciklama = "İkizler burcu, hava elementinin değişken niteliğiyle iletişimi, merakı ve zihinsel esnekliği temsil eder. Bilgiye olan açlıkları ve her konuda fikir sahibi olma arzuları, onları sürekli öğrenmeye ve sosyalleşmeye iter. Oldukça hızlı düşünen, esprili ve uyumlu bir yapıları vardır; girdikleri her ortama kolayca ayak uydurabilirler. Çift karakterli olduklarına dair yaygın kanı, aslında olaylara çok yönlü bakabilme ve hızlı karar değiştirebilme yeteneklerinden kaynaklanır. Tekdüzelik onlar için en büyük kabustur, hayatlarında her zaman bir hareket ve yenilik ararlar.";
    } else if ((ay == 6 && gun >= 21) || (ay == 7 && gun <= 22)) {
        burc = "Yengeç";
        aciklama = "Yengeç burcu, su elementinin öncü niteliğiyle derin duygusallığı, sezgileri ve korumacılığı simgeler. Zodyak'ın en hassas burçlarından biri olan Yengeçler, sevdikleri için her türlü fedakarlığı yapmaya hazır, anaç ve şefkatli bir yapıya sahiptirler. Evleri ve aileleri onların güvenli sığınağıdır; geçmişe ve köklerine büyük bir bağlılık duyarlar. Sezgileri o kadar güçlüdür ki, çevrelerindeki insanların niyetlerini ve ruh hallerini anında hissedebilirler. Dışarıdan sert bir kabuğun arkasına saklansalar da, iç dünyalarında kırılgan ve romantik bir ruh taşırlar.";
    } else if ((ay == 7 && gun >= 23) || (ay == 8 && gun <= 22)) {
        burc = "Aslan";
        aciklama = "Aslan burcu, ateş elementinin sabit niteliğiyle özgüveni, yaratıcılığı ve cömertliği temsil eder. Güneş tarafından yönetilen bu burcun bireyleri, doğal bir karizmaya ve girdikleri her yerde dikkat çekme yeteneğine sahiptirler. Liderlik özellikleri çok gelişmiştir; çevrelerindeki insanlara ilham vermeyi ve onları korumayı severler. Hayata karşı büyük bir yaşama sevinci duyarlar ve eğlenceye, sanata, lükse düşkündürler. Gururları en hassas noktalarıdır; ancak bir o kadar da yufka yürekli ve paylaşımcıdırlar. Sevdikleri için her zaman en iyisini isterler.";
    } else if ((ay == 8 && gun >= 23) || (ay == 9 && gun <= 22)) {
        burc = "Başak";
        aciklama = "Başak burcu, toprak elementinin değişken niteliğiyle titizliği, çalışkanlığı ve analiz yeteneğini simgeler. Hayata son derece pratik ve rasyonel bir pencereden bakan Başak bireyleri, detaylardaki mükemmelliği yakalama konusunda ustadırlar. Yardımseverlikleri en belirgin özellikleridir; başkalarına faydalı olmak ve işleri düzene sokmak onları mutlu eder. Öğrenmeye olan merakları ve metodik yaklaşımları sayesinde her konuda uzmanlaşabilirler. Zaman zaman kendilerine ve başkalarına karşı fazla eleştirel olabilirler, ancak bu tamamen her şeyin en iyisi olması isteğinden kaynaklanır.";
    } else if ((ay == 9 && gun >= 23) || (ay == 10 && gun <= 22)) {
        burc = "Terazi";
        aciklama = "Terazi burcu, hava elementinin öncü niteliğiyle adaleti, dengeyi ve zarafeti temsil eder. İlişkiler ve sosyal uyum hayatlarının merkezindedir; yalnız kalmaktan hoşlanmazlar ve çevrelerindeki herkesle barış içinde yaşamak isterler. Diplomatik yetenekleri sayesinde en zorlu çatışmaları bile tatlılıkla çözebilirler. Estetiğe, sanata ve güzelliğe olan düşkünlükleri, hayatlarının her alanında kendini gösterir. Karar verme aşamasında her iki tarafın da haklarını gözetmek istedikleri için kararsızlık yaşayabilirler, ancak hedefleri her zaman mutlak uyumu yakalamaktır.";
    } else if ((ay == 10 && gun >= 23) || (ay == 11 && gun <= 21)) {
        burc = "Akrep";
        aciklama = "Akrep burcu, su elementinin sabit niteliğiyle tutkuyu, derinliği ve yenilenme gücünü simgeler. Zodyak'ın en gizemli ve kararlı burçlarından olan Akrepler, bir şeye odaklandıklarında onu sonuna kadar araştırmadan ve elde etmeden bırakmazlar. Sezgileri ve gözlem yetenekleri inanılmaz derecede güçlüdür; insanların maskelerinin ardındakini görebilirler. Sadakat onlar için kutsaldır ve bir kez güvendiklerinde ömür boyu yanınızda olurlar. Duygusal dünyaları çok yoğundur, ancak bunu dışarıya her zaman yansıtmazlar. Küllerinden yeniden doğma yetenekleri, onları hayatın zorluklarına karşı çok dirençli kılar.";
    } else if ((ay == 11 && gun >= 22) || (ay == 12 && gun <= 21)) {
        burc = "Yay";
        aciklama = "Yay burcu, ateş elementinin değişken niteliğiyle özgürlüğü, iyimserliği ve keşfetme tutkusunu temsil eder. Maceracı ruhları onları sürekli yeni yerler görmeye, yeni kültürler tanımaya ve hayatın anlamını sorgulamaya iter. Dürüstlük ve etik değerler hayatlarının temel taşıdır; ne düşünüyorlarsa olduğu gibi söylemekten çekinmezler. Neşeli ve espri dolu yapılarıyla girdikleri her ortama pozitif enerji yayarlar. Kısıtlanmaya ve monotonluğa gelemezler. Felsefeye ve yüksek öğrenime olan merakları, onları yaşam boyu bir öğrenci ve bilge bir yolcu yapar.";
    } else if ((ay == 12 && gun >= 22) || (ay == 1 && gun <= 19)) {
        burc = "Oğlak";
        aciklama = "Oğlak burcu, toprak elementinin öncü niteliğiyle disiplini, hırsı ve sorumluluğu simgeler. Hayata karşı oldukça ciddi ve gerçekçi bir yaklaşımları vardır; başarıya giden yolun sabır ve sıkı çalışmadan geçtiğini bilirler. Stratejik düşünme yetenekleri sayesinde uzun vadeli planlar yapmakta ve bunları gerçekleştirmekte ustadırlar. Geleneklere ve kurallara önem verirler, toplumda saygın bir yer edinmek onlar için temel bir hedeftir. Dışarıdan mesafeli ve soğuk görünseler de, aslında sevdikleri için her türlü yükü sırtlanmaya hazır, çok güvenilir ve sadık dostlardırlar.";
    } else if ((ay == 1 && gun >= 20) || (ay == 2 && gun <= 18)) {
        burc = "Kova";
        aciklama = "Kova burcu, hava elementinin sabit niteliğiyle yenilikçiliği, bağımsızlığı ve insancıllığı temsil eder. Zodyak'ın aykırı ve özgün ruhları olan Kovalar, her zaman geleceğe odaklıdırlar ve toplumu ileriye taşıyacak fikirler üretirler. Kişisel özgürlüklerine aşırı düşkündürler ve herhangi bir kalıba sokulmaktan hoşlanmazlar. Arkadaşlık onlar için en önemli bağdır; geniş bir sosyal çevreleri olsa da ruhsal olarak bağımsız kalmayı tercih ederler. Teknolojik gelişmelere ve bilime olan ilgileri, onları her zaman çağın ötesinde düşünmeye iter. Entelektüel birikimleri ve objektif bakış açıları en güçlü yönleridir.";
    } else if ((ay == 2 && gun >= 19) || (ay == 3 && gun <= 20)) {
        burc = "Balık";
        aciklama = "Balık burcu, su elementinin değişken niteliğiyle merhameti, hayal gücünü ve ruhsallığı simgeler. Zodyak'ın son burcu olarak tüm burçların deneyimlerini bünyesinde taşır. Son derece hassas, fedakar ve sezgisel bir yapıları vardır; başkalarının acısını kendi içlerinde hissedebilirler. Hayal dünyaları çok geniştir, bu da onları sanata ve yaratıcılığa yönlendirir. Maddi dünyadan ziyade maneviyat ve duygular onlar için ön plandadır. Akışta yaşamayı severler ve katı kurallar yerine esnekliği tercih ederler. Nazik ve empatik yapılarıyla çevrelerine huzur ve şifa veren bir enerjileri vardır.";
    }

    document.getElementById('hc-burc-value').innerText = burc;
    document.getElementById('hc-burc-desc').innerText = aciklama;
    document.getElementById('hc-burc-hesaplama-result').classList.add('visible');
}

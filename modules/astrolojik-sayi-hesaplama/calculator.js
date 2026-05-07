function hcAstNumHesapla() {
    const burc = document.getElementById('hc-ast-burc').value;
    
    const data = {
        "Koç": { num: 9, desc: "Koç burcunun titreşimi 9 sayısıdır. Bu sayı size cesaret, bitmek bilmeyen bir enerji ve liderlik gücü verir. Hayatınızdaki önemli başlangıçları 9 ve katları olan günlerde yapmak size şans getirebilir. Bu sayı, sizin savaşçı ruhunuzu ve kararlılığınızı simgeler." },
        "Boğa": { num: 6, desc: "Boğa burcunun enerjisi 6 sayısı ile uyumludur. Bu sayı size huzur, estetik anlayışı ve maddi güven katar. Evinizdeki düzen ve ilişkilerinizdeki denge için 6 sayısının titreşiminden faydalanabilirsiniz. Bu sayı, sizin sadık ve üretken yapınızı destekler." },
        "İkizler": { num: 5, desc: "İkizler burcunun sayısı 5'tir. Bu sayı size zihinsel bir kıvraklık, merak ve sürekli hareket enerjisi verir. İletişimle ilgili işlerinizde ve seyahatlerinizde 5 sayısının şansını hissedebilirsiniz. Bu sayı, sizin çok yönlü ve sosyal ruhunuzu temsil eder." },
        "Yengeç": { num: 2, desc: "Yengeç burcunun koruyucu sayısı 2'dir. Bu sayı size derin bir sezgi, empati ve şefkat gücü verir. Ailevi konularda ve duygusal bağlarınızda 2 sayısının birleştirici enerjisinden faydalanabilirsiniz. Bu sayı, sizin hassas ve besleyici yapınızı simgeler." },
        "Aslan": { num: 1, desc: "Aslan burcunun parlayan sayısı 1'dir. Bu sayı size özgüven, yaratıcılık ve sahne ışığı verir. Liderlik etmeniz gereken konularda ve kendinizi ifade ederken 1 sayısının gücünden ilham alabilirsiniz. Bu sayı, sizin eşsiz ve cömert kalbinizi temsil eder." },
        "Başak": { num: 3, desc: "Başak burcunun pratik sayısı 3'tür. Bu sayı size teknik beceri, düzen ve analiz gücü verir. Detaylı çalışma gerektiren işlerinizde ve hizmet odaklı projelerinizde 3 sayısının verimliliğinden faydalanabilirsiniz. Bu sayı, sizin titiz ve zeki yapınızı destekler." },
        "Terazi": { num: 7, desc: "Terazi burcunun denge sayısı 7'dir. Bu sayı size zarafet, diplomasi ve estetik bir bakış açısı verir. İlişkilerinizde ve adalet arayışınızda 7 sayısının uyum getiren enerjisinden faydalanabilirsiniz. Bu sayı, sizin nazik ve arabulucu ruhunuzu temsil eder." },
        "Akrep": { num: 8, desc: "Akrep burcunun dönüştürücü sayısı 8'dir. Bu sayı size güç, dayanıklılık ve derin bir sezgi verir. Krizleri yönetirken ve hayatınızı yeniden inşa ederken 8 sayısının sarsılmaz gücünden faydalanabilirsiniz. Bu sayı, sizin tutkulu ve stratejik yapınızı simgeler." },
        "Yay": { num: 4, desc: "Yay burcunun keşif sayısı 4'tür. Bu sayı size geniş bir vizyon, dürüstlük ve felsefi bir derinlik verir. Yeni yerler keşfederken ve öğrenme sürecinizde 4 sayısının koruyucu enerjisinden faydalanabilirsiniz. Bu sayı, sizin maceracı ve bilge ruhunuzu temsil eder." },
        "Oğlak": { num: 10, desc: "Oğlak burcunun başarı sayısı 10'dur. Bu sayı size disiplin, sabır ve zirveye ulaşma iradesi verir. Kariyer hedeflerinizde ve uzun vadeli planlarınızda 10 sayısının kalıcılık getiren enerjisinden faydalanabilirsiniz. Bu sayı, sizin hırslı ve güvenilir yapınızı destekler." },
        "Kova": { num: 11, desc: "Kova burcunun vizyoner sayısı 11'dir. Bu sayı size bağımsızlık, özgünlük ve dahi fikirler verir. Toplumsal projelerinizde ve yenilikçi girişimlerinizde 11 sayısının ilham verici enerjisinden faydalanabilirsiniz. Bu sayı, sizin insancıl ve aykırı ruhunuzu temsil eder." },
        "Balık": { num: 22, desc: "Balık burcunun şifa sayısı 22'dir. Bu sayı size sınırsız bir hayal gücü, şefkat ve ruhsal bir derinlik verir. Sanatsal çalışmalarınızda ve başkalarına yardım ederken 22 sayısının mucizevi enerjisinden faydalanabilirsiniz. Bu sayı, sizin fedakar ve sanatçı ruhunuzu simgeler." }
    };

    const res = data[burc];
    document.getElementById('hc-ast-val').innerText = res.num;
    document.getElementById('hc-ast-desc').innerText = res.desc;
    document.getElementById('hc-ast-result').classList.add('visible');
}

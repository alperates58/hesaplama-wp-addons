function hcMerkurBurcuHesapla() {
    const tarihStr = document.getElementById('hc-merkur-tarih').value;
    if (!tarihStr) { alert('Lütfen doğum tarihinizi girin.'); return; }
    const date = new Date(tarihStr);
    
    function getJD(d) { return (d.getTime() / 86400000) + 2440587.5; }
    const jd = getJD(date);
    const d = jd - 2451543.5;
    const rad = Math.PI / 180;

    function norm(x) { x %= 360; return x < 0 ? x + 360 : x; }

    function getHeliocentric(planet, d) {
        let { N, i, w, a, e, M0, M1 } = planet;
        let M = norm(M0 + M1 * d);
        let E = M + (180 / Math.PI) * e * Math.sin(M * rad) * (1 + e * Math.cos(M * rad));
        for(let j=0; j<3; j++) E = E - (E - (180/Math.PI)*e*Math.sin(E*rad) - M) / (1 - e*Math.cos(E*rad));
        let xv = a * (Math.cos(E * rad) - e);
        let yv = a * (Math.sqrt(1 - e * e) * Math.sin(E * rad));
        let v = Math.atan2(yv, xv) / rad;
        let r = Math.sqrt(xv * xv + yv * yv);
        let lonecl = norm(v + w);
        let x = r * (Math.cos(N * rad) * Math.cos(lonecl * rad) - Math.sin(N * rad) * Math.sin(lonecl * rad) * Math.cos(i * rad));
        let y = r * (Math.sin(N * rad) * Math.cos(lonecl * rad) + Math.cos(N * rad) * Math.sin(lonecl * rad) * Math.cos(i * rad));
        let z = r * Math.sin(lonecl * rad) * Math.sin(i * rad);
        return { x, y, z };
    }

    const earth = { N: 0, i: 0, w: 102.9404 + 0.0000470935 * d, a: 1.00000011, e: 0.01671022 - 0.0000000012 * d, M0: 357.5291, M1: 0.98560028 };
    const mercury = { N: 48.3313 + 0.0000324587 * d, i: 7.0047 + 0.00000005 * d, w: 77.4564 + 0.0000155447 * d, a: 0.387098, e: 0.205635, M0: 174.7947, M1: 4.0923344 };

    const pE = getHeliocentric(earth, d);
    const pM = getHeliocentric(mercury, d);

    const xG = pM.x - pE.x;
    const yG = pM.y - pE.y;
    const lonG = norm(Math.atan2(yG, xG) / rad);

    const burclar = ["Koç", "Boğa", "İkizler", "Yengeç", "Aslan", "Başak", "Terazi", "Akrep", "Yay", "Oğlak", "Kova", "Balık"];
    const burc = burclar[Math.floor(lonG / 30)];

    const yorumlar = {
        "Koç": "Merkür'ü Koç burcunda olanlar, düşünce süreçlerinde oldukça hızlı, doğrudan ve cesurdur. İletişim tarzları nettir; ne düşünüyorlarsa olduğu gibi, bazen patavatsızlığa varacak şekilde söyleyebilirler. Zihinleri her zaman yeni fikirlerle doludur ve bir konuyu uzun uzun analiz etmek yerine hemen sonuca varmayı tercih ederler. Tartışmalarda rekabetçi bir tutum sergileyebilirler. Öğrenme biçimleri deneyim odaklıdır; bir şeyi yaparak öğrenmek onlar için en etkili yoldur. Zihinsel enerjileri çok yüksektir ve çevrelerine ilham veren, öncü fikirler üretirler.",
        "Boğa": "Merkür Boğa kişileri için zihinsel süreçler daha yavaş, temkinli ve pratiktir. Bir konuyu anlamadan veya doğruluğundan emin olmadan fikir beyan etmezler. Düşünceleri oldukça sabittir; bir kez bir şeye karar verdiklerinde onları vazgeçirmek zordur. İletişim tarzları sakin, huzurlu ve güven vericidir. Soyut kavramlardan ziyade somut ve uygulanabilir bilgilerle ilgilenirler. Bellekleri çok güçlüdür ve öğrendikleri bilgileri asla unutmazlar. Estetik ve maddi değerlerle ilgili konularda zekalarını çok iyi kullanırlar. Kararlı ve metodik düşünürlerdir.",
        "İkizler": "Merkür'ün kendi yöneticisi olduğu İkizler burcunda olması, zekanın en kıvrak, en meraklı ve en esnek halini temsil eder. Bu kişiler adeta bir bilgi süngeri gibidirler; her şeyi öğrenmek, her konuda fikir sahibi olmak isterler. İletişim tarzları son derece akıcı, esprili ve çok yönlüdür. Aynı anda birden fazla konuyla ilgilenebilir ve hızlıca bir düşünceden diğerine geçebilirler. Sosyal becerileri çok gelişmiştir ve her türlü insanla kolayca diyalog kurabilirler. Yazma, konuşma ve dil yetenekleri genellikle ön plandadır. Zihinleri hiçbir zaman durmaz; her zaman yeni bir merakın peşindedirler.",
        "Yengeç": "Merkür'ü Yengeç burcunda olan bireylerde zihin ve duygular iç içe geçmiştir. Düşünce süreçleri büyük ölçüde sezgilerine ve geçmiş anılarına dayanır. İletişim tarzları nazik, korumacı ve duygusal bir derinliğe sahiptir. Bir şeyi öğrenirken onu sadece mantıklarıyla değil, kalpleriyle de hissetmek isterler. Bellekleri duygusal anlarla yüklüdür; yıllar önceki bir olayı, o an hissettikleriyle birlikte detaylıca hatırlayabilirler. Çevrelerindeki insanların ruh hallerini ve niyetlerini anlama konusunda çok yeteneklidirler. Sessiz ama çok derin bir kavrayışa sahiptirler.",
        "Aslan": "Merkür Aslan kişileri için düşünceler ve iletişim birer kendini ifade etme aracıdır. Zihinleri yaratıcı fikirlerle doludur ve bu fikirleri büyük bir özgüvenle, adeta bir sahnede sunuyormuş gibi anlatırlar. İletişim tarzları etkileyici, sıcak ve otoriterdir. İnsanları ikna etme ve onlara ilham verme yetenekleri çok gelişmiştir. Bir konuya odaklandıklarında onu geniş bir perspektiften görür ve büyük resmi yakalarlar. Gururları zihinsel süreçlerine de yansır; fikirlerinin takdir edilmesini isterler. Cömert bir zeka yapıları vardır ve her zaman parlak, dikkat çekici çözümler üretirler.",
        "Başak": "Merkür'ün hem yöneticisi olduğu hem de yüceldiği Başak burcunda bulunması, zekanın en titiz, en analizci ve en mükemmeliyetçi halini temsil eder. Bu kişiler detayları fark etme ve karmaşık yapıları parçalarına ayırarak anlama konusunda ustadırlar. İletişim tarzları net, dürüst ve pratiktir. Gereksiz bilgilerle vakit kaybetmek yerine, işe yarar ve uygulanabilir çözümler üretmeye odaklanırlar. Öğrenme biçimleri metodik ve disiplinlidir. Eleştirel bir zekaları vardır; hataları anında görür ve düzeltmek için harekete geçerler. Her şeyi bir düzen ve mantık çerçevesine oturtmak onların doğal yeteneğidir.",
        "Terazi": "Merkür'ü Terazi burcunda olanlar için zihinsel süreçler denge, adalet ve uyum arayışı üzerine kuruludur. İletişim tarzları son derece nazik, diplomatik ve zariftir. Tartışmalardan kaçınırlar ve her zaman iki tarafın da haklı yönlerini görmeye çalışırlar; bu da zaman zaman kararsızlık yaşamalarına neden olabilir. Partnerlikler ve sosyal ilişkiler hakkında düşünmek zihinlerini en çok meşgul eden konulardır. Estetik bir zeka yapıları vardır; fikirlerinin bile göze ve kulağa hoş gelmesini isterler. İnsanları bir araya getiren, barışçıl ve uzlaşmacı fikirler üretme konusunda çok başarılıdırlar.",
        "Akrep": "Merkür Akrep kişileri için zihin bir dedektif gibi çalışır. Yüzeysel olan hiçbir şey onları tatmin etmez; her zaman olayların ve insanların en derinindeki gerçeği, gizli olanı bulmaya çalışırlar. İletişim tarzları derin, gizemli ve bazen sarsıcı derecede dürüsttür. Sezgileri zekalarıyla birleşmiştir, bu da onlara inanılmaz bir analiz gücü verir. Sessizce gözlemler ve en stratejik zamanda en etkili sözü söylerler. Zihinleri çok dayanıklı ve odaklanmıştır. Sır saklama konusunda ustadırlar ve gizemli konular, psikoloji veya araştırma gerektiren alanlarda zekalarını harika kullanırlar.",
        "Yay": "Merkür'ü Yay burcunda olan bireylerin zihni özgürlük, felsefe ve geniş ufuklar için yaratılmıştır. Düşünceleri iyimser, vizyoner ve dürüsttür. İletişim tarzları doğrudan ve bazen fazla açık sözlü olabilir; ne düşünüyorlarsa filtrelemeden söylerler. Küçük detaylarla uğraşmak yerine, hayatın anlamı ve büyük resmi kavramakla ilgilenirler. Öğrenme biçimleri keşif odaklıdır; yeni kültürler, inançlar ve felsefeler zihinlerini besler. Zihinsel olarak kısıtlanmaya gelemezler. Neşeli ve espri dolu yapılarıyla girdikleri her ortama taze bir bakış açısı getirirler.",
        "Oğlak": "Merkür Oğlak kişileri için zihinsel süreçler disiplinli, ciddi ve sonuç odaklıdır. Düşünceleri oldukça gerçekçi ve pratiktir; hayalperest fikirler yerine uygulanabilir stratejiler üretirler. İletişim tarzları otoriter, mesafeli ve güven vericidir. Kelimelerini dikkatle seçerler ve sadece gerekli olduğunda konuşurlar. Öğrenme biçimleri hiyerarşik ve metodiktir. Bellekleri yapılandırılmış bilgilerle doludur. Otoriteye ve geleneklere saygılı bir zeka yapıları vardır; ancak kendi fikirlerini de sarsılmaz bir mantık çerçevesinde savunurlar. Uzun vadeli planlar yapmakta ve bunları gerçekleştirmekte üstlerine yoktur.",
        "Kova": "Merkür'ü Kova burcunda olanlar için zihin bağımsızlık, yenilik ve gelecek üzerine kuruludur. Düşünce biçimleri son derece özgün, aykırı ve objektiftir. Toplumsal kalıpların dışında düşünmeyi severler ve her zaman 'daha farklı nasıl olabilir?' diye sorarlar. İletişim tarzları entelektüel, demokratik ve biraz mesafeli olabilir. Teknoloji, bilim ve insan hakları gibi konular zihinlerini en çok meşgul eden alanlardır. İnanılmaz derecede hızlı kavrayış yetenekleri vardır ve beklenmedik, dahi fikirler üretebilirler. Fikir birliğine önem verirler ama kendi bağımsız düşüncelerinden asla ödün vermezler.",
        "Balık": "Merkür'ü Balık burcunda olan bireylerde zihin daha çok hayal gücü, sezgi ve sembollerle çalışır. Mantıksal çıkarımlardan ziyade, bütünü hissederek anlama yetenekleri vardır. İletişim tarzları şiirsel, yumuşak ve empatiktir. Kelimelerin ötesindeki duyguları ve enerjileri okuyabilirler. Öğrenme biçimleri akışkandır; her şeyi birbiriyle bağlantılı bir bütün olarak görürler. Sanatsal ve yaratıcı zekaları çok gelişmiştir. Zaman zaman düşünceleri dalgın ve dağınık olabilir, ancak bu onların aynı anda birçok farklı boyuttan bilgi almalarından kaynaklanır. Sessiz bir bilgelikleri ve çok derin bir kavrayışları vardır."
    };

    document.getElementById('hc-merkur-value').innerText = burc;
    document.getElementById('hc-merkur-desc').innerText = yorumlar[burc];
    document.getElementById('hc-merkur-burcu-result').classList.add('visible');
}

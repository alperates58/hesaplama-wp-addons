function hcTasBul() {
    const burc = document.getElementById('hc-tas-burc').value;
    const data = {
        "Koç": { tas: "Akik, Elmas, Hematit", desc: "Koç burcunun yüksek enerjisini dengeleyen ve cesaretini pekiştiren en önemli taş Hematit'tir. Akik ise fiziksel gücü korur." },
        "Boğa": { tas: "Zümrüt, Turkuaz, Malakit", desc: "Boğa'nın huzur arayışına en iyi cevap veren taş Zümrüt'tür. Malakit ise kalbi korur ve bolluk bereket enerjisini çeker." },
        "İkizler": { tas: "Akik, Kaplan Gözü, Ay Taşı", desc: "İkizler'in zihinsel dağınıklığını toplayan Kaplan Gözü, odaklanmayı artırır. Ay Taşı ise duygusal denge sağlar." },
        "Yengeç": { tas: "Ay Taşı, İnci, Kuvars", desc: "Yengeç'in hassas ruhuna en uygun taş İnci'dir. Ay Taşı ise sezgileri güçlendirir ve duygusal şifa verir." },
        "Aslan": { tas: "Kehribar, Sitrin, Kaplan Gözü", desc: "Aslan'ın ışığını yansıtan Sitrin, neşe ve bolluk getirir. Kehribar ise negatif enerjiyi temizler ve güç verir." },
        "Başak": { tas: "Jasper, Akik, Turkuaz", desc: "Başak'ın titiz yapısını Jasper ile dengelemek mümkündür. Akik ise zihinsel netlik ve huzur sağlar." },
        "Terazi": { tas: "Pembe Kuvars, Safir, Opal", desc: "Terazi'nin uyum arayışına Pembe Kuvars eşlik eder. Safir ise adalet duygusunu ve zihinsel odaklanmayı pekiştirir." },
        "Akrep": { tas: "Obsidyen, Lal, Akik", desc: "Akrep'in derinliğini koruyan Obsidyen, negatif enerjiyi emer. Lal ise tutkuyu ve yaşam enerjisini artırır." },
        "Yay": { tas: "Turkuaz, Topaz, Ametist", desc: "Yay'ın maceracı ruhunu Turkuaz korur. Topaz ise şans ve bilgelik getirerek ufukları açar." },
        "Oğlak": { tas: "Kehribar, Oniks, Florit", desc: "Oğlak'ın disiplinli yapısına Oniks güç katar. Florit ise zihinsel karmaşayı giderir ve başarıyı destekler." },
        "Kova": { tas: "Ametist, Akumarin, Garnet", desc: "Kova'nın yenilikçi zihnine Ametist huzur verir. Akuamarin ise iletişimi ve özgür ifadeyi güçlendirir." },
        "Balık": { tas: "Ametist, Ay Taşı, Mercan", desc: "Balık'ın ruhsal dünyasını Ametist şifalandırır. Ay Taşı ise hayal gücü ile gerçeklik arasındaki bağı kurar." }
    };

    const res = data[burc];
    document.getElementById('hc-tas-val').innerText = res.tas;
    document.getElementById('hc-tas-desc').innerText = res.desc;
    document.getElementById('hc-tas-result').classList.add('visible');
}

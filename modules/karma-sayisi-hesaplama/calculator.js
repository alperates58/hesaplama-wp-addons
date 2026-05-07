function hcKarmaHesapla() {
    const dStr = document.getElementById('hc-karma-date').value;
    if (!dStr) { alert('Lütfen doğum tarihinizi girin.'); return; }
    
    let sum = dStr.replace(/-/g, '').split('').reduce((a, b) => parseInt(a) + parseInt(b), 0);
    // Karma usually uses the 13, 14, 16, 19 specific numbers as well
    const specialKarma = [13, 14, 16, 19];
    let isSpecial = specialKarma.includes(sum);
    
    while (sum > 9 && !isSpecial) {
        sum = sum.toString().split('').reduce((a, b) => parseInt(a) + parseInt(b), 0);
        isSpecial = specialKarma.includes(sum);
    }

    const karmalar = {
        1: { name: "1 - Bireysellik Karması", desc: "Geçmişte başkalarına fazla bağımlı kalmış olabilirsiniz. Bu hayattaki dersiniz, kendi ayaklarınız üzerinde durmayı öğrenmek ve özgün bir liderlik geliştirmektir." },
        2: { name: "2 - Ortaklık Karması", desc: "Geçmişte fazla bencil davranmış olabilirsiniz. Bu hayatta iş birliği yapmayı, empati kurmayı ve ikili ilişkilerde dengeyi bulmayı öğrenmeniz gerekiyor." },
        3: { name: "3 - İfade Karması", desc: "Yaratıcılığınızı ve sesinizi bastırmış olabilirsiniz. Bu hayattaki karmik borcunuz, duygularınızı dürüstçe ve neşeyle ifade etmek, dünyaya ışık saçmaktır." },
        4: { name: "4 - Disiplin Karması", desc: "Geçmişte sorumluluklardan kaçmış olabilirsiniz. Bu hayatta çok çalışmak, düzen kurmak ve kalıcı eserler bırakmak sizin ruhsal gelişiminiz için hayati önem taşır." },
        5: { name: "5 - Değişim Karması", desc: "Fazla tutucu veya kısıtlayıcı bir hayat sürmüş olabilirsiniz. Bu hayatta yeniliklere açık olmayı, özgürlüğü ve farklı deneyimlerin tadını çıkarmayı öğrenmelisiniz." },
        6: { name: "6 - Sorumluluk Karması", desc: "Ailevi veya toplumsal görevlerinizi ihmal etmiş olabilirsiniz. Bu hayatta sevdiklerinize bakmak, şefkat göstermek ve fedakarlık yapmak sizin asıl sınavınızdır." },
        7: { name: "7 - İnanç Karması", desc: "Maddi dünyaya fazla dalmış olabilirsiniz. Bu hayatta yalnız kalmayı, içsel dünyanızı keşfetmeyi ve ruhsal gerçeklerin peşinden gitmeyi öğrenmeniz gerekiyor." },
        8: { name: "8 - Güç Karması", desc: "Gücü yanlış kullanmış veya güçten korkmuş olabilirsiniz. Bu hayattaki dersiniz, maddi gücü ve otoriteyi adaletle, ruhsal yasalarla uyumlu şekilde yönetmektir." },
        9: { name: "9 - Fedakarlık Karması", desc: "Bencil hedeflerin ötesine geçememiş olabilirsiniz. Bu hayatta tüm insanlığa hizmet etmeyi, bağışlamayı ve karşılıksız sevgiyi öğrenmek sizin en yüksek dersinizdir." },
        13: { name: "13 - Dönüşüm Karması", desc: "Bu çok güçlü bir karma sayısıdır. Hayatınızda köklü değişimler yaşayabilirsiniz. Dersiniz, eskiyi tamamen bırakıp küllerinizden yeniden doğmayı başarmaktır." },
        14: { name: "14 - Denge Karması", desc: "Aşırılıklardan kaçınmayı ve her konuda itidalli olmayı öğrenmelisiniz. Bu karma, bağımlılıklar ve özgürlük arasındaki dengeyi bulmanızı ister." },
        16: { name: "16 - Alçakgönüllülük Karması", desc: "Egonun yıkılması ve ruhsal uyanışla ilgilidir. Hayatınızdaki zorluklar sizi sahte gururdan arındırıp gerçek ruhsal kimliğinize ulaştırmak içindir." },
        19: { name: "19 - Özgüven Karması", desc: "Başkalarına hükmetmek yerine, kendi içsel otoritenizi bulmanız gerektiğini söyler. Yardım istemeyi ve diğer insanlarla uyumlu çalışmayı öğrenmelisiniz." }
    };

    const k = karmalar[sum] || karmalar[9];
    document.getElementById('hc-karma-val').innerText = k.name;
    document.getElementById('hc-karma-desc').innerText = k.desc;
    document.getElementById('hc-karma-result').classList.add('visible');
}

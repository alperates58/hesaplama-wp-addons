function hcKisiselTarotHesapla() {
    const dStr = document.getElementById('hc-ktc-date').value;
    if (!dStr) {
        alert('Lütfen doğum tarihinizi girin.');
        return;
    }

    const birthDate = new Date(dStr);
    const bSum = birthDate.getDate() + (birthDate.getMonth() + 1) + birthDate.getFullYear();

    const now = new Date();
    const nSum = now.getDate() + (now.getMonth() + 1) + now.getFullYear();

    let finalSum = (bSum + nSum);
    while (finalSum > 22) {
        let t = 0;
        finalSum.toString().split('').forEach(v => t += parseInt(v));
        finalSum = t;
    }
    if (finalSum === 0) finalSum = 22; // Fool

    const dailyCards = {
        1: { name: "Büyücü", desc: "Bugün yaratıcı gücünüz zirvede. Fikirlerinizi eyleme dökme ve yeni başlangıçlar yapma zamanı." },
        2: { name: "Azize", desc: "Bugün iç sesinizi dinleyin. Sessiz kalarak ve gözlemleyerek daha çok şey öğrenebilirsiniz." },
        3: { name: "İmparatoriçe", desc: "Bugün sevgi, şefkat ve bolluk enerjisi sizinle. Kendinizi şımartın ve güzelliklere odaklanın." },
        4: { name: "İmparator", desc: "Bugün disiplinli ve planlı olma günü. Sınırlarınızı çizin ve kontrolü elinize alın." },
        5: { name: "Aziz", desc: "Bugün geleneksel yöntemlere bağlı kalmak veya bir uzmandan tavsiye almak size iyi gelecektir." },
        6: { name: "Aşıklar", desc: "Bugün ikili ilişkiler ön planda. Kalbinizi ilgilendiren konularda dürüst seçimler yapmalısınız." },
        7: { name: "Araba", desc: "Bugün kararlılıkla ilerleme günü. Hedefinize odaklanın ve hiçbir engelin sizi durdurmasına izin vermeyin." },
        8: { name: "Güç", desc: "Bugün sabır ve içsel güç günü. Karşılaştığınız zorlukları nezaket ve anlayışla çözebilirsiniz." },
        9: { name: "Ermiş", desc: "Bugün iç dünyanıza dönme ve tefekkür etme günü. Yalnız vakit geçirmek size cevapları getirecek." },
        10: { name: "Kader Çarkı", desc: "Bugün şanslı ve beklenmedik gelişmelere açık olun. Hayatın döngülerine güvenin." },
        11: { name: "Adalet", desc: "Bugün dürüstlük ve hakkaniyet günü. Kararlarınızı verirken objektif olmaya çalışın." },
        12: { name: "Asılan Adam", desc: "Bugün olaylara farklı bir açıdan bakma günü. Bazı şeyleri bırakmak size yeni perspektifler kazandırır." },
        13: { name: "Ölüm", desc: "Bugün dönüşüm günü. Artık size hizmet etmeyen bir durumu sonlandırıp yeniye yer açın." },
        14: { name: "Denge", desc: "Bugün uyum ve ölçülülük günü. Aşırılıklardan kaçının ve sakin kalmaya odaklanın." },
        15: { name: "Şeytan", desc: "Bugün tutkularınıza ve bağlılıklarınıza dikkat edin. Sizi kısıtlayan alışkanlıklarınızı fark edin." },
        16: { name: "Yıkılan Kule", desc: "Bugün ani değişimlere hazır olun. Sarsıcı olsa da bu değişim sizi özgürleştirecek." },
        17: { name: "Yıldız", desc: "Bugün umut ve ilham dolu bir gün. Hayallerinize odaklanın, evren sizi destekliyor." },
        18: { name: "Ay", desc: "Bugün belirsizliklere ve illüzyonlara dikkat edin. Sezgileriniz sizi doğruya götürecektir." },
        19: { name: "Güneş", desc: "Bugün neşe, başarı ve aydınlık bir gün. Enerjinizi çevrenize yayın ve günün tadını çıkarın." },
        20: { name: "Mahkeme", desc: "Bugün bir uyanış ve değerlendirme günü. İçsel bir çağrı alabilir, önemli bir gerçeği görebilirsiniz." },
        21: { name: "Dünya", desc: "Bugün tamamlanma ve başarı günü. Bir süreci başarıyla noktalayabilir, huzura erebilirsiniz." },
        22: { name: "Joker", desc: "Bugün yeni bir maceraya adım atma günü. Hayata güvenin ve ilk adımı cesaretle atın." }
    };

    const myCard = dailyCards[finalSum];

    document.getElementById('hc-ktc-value').innerText = myCard.name;
    document.getElementById('hc-ktc-desc').innerHTML = `<p>${myCard.desc}</p><p><small>Bugünün Tarihi: ${now.toLocaleDateString('tr-TR')}</small></p>`;
    document.getElementById('hc-kisisel-tarot-karti-result').classList.add('visible');
}

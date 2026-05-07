function hcAuraBul() {
    const dStr = document.getElementById('hc-aura-date').value;
    if (!dStr) { alert('Lütfen doğum tarihinizi girin.'); return; }
    
    let sum = dStr.replace(/-/g, '').split('').reduce((a, b) => parseInt(a) + parseInt(b), 0);
    while (sum > 9) {
        sum = sum.toString().split('').reduce((a, b) => parseInt(a) + parseInt(b), 0);
    }

    const auralar = {
        1: { name: "Kırmızı", hex: "#e74c3c", desc: "Kırmızı aura, fiziksel gücü, tutkuyu ve hayata karşı bitmek bilmeyen bir enerjiyi simgeler. Maceracı bir ruhunuz var ve liderlik etmek sizin doğanızda. İnsanları harekete geçirme gücüne sahipsiniz." },
        2: { name: "Turuncu", hex: "#e67e22", desc: "Turuncu aura, yaratıcılığı, sosyalliği ve yaşama sevincini temsil eder. Duygusal zekanız çok yüksektir ve çevreye neşe saçarsınız. Yeni şeyler üretmek ve paylaşmak sizin ruhunuzu besler." },
        3: { name: "Sarı", hex: "#f1c40f", desc: "Sarı aura, zekayı, iyimserliği ve merakı simgeler. Öğrenmeye aşıksınız ve hayata her zaman pozitif bir pencereden bakarsınız. İletişim becerilerinizle insanlara ilham verirsiniz." },
        4: { name: "Yeşil", hex: "#2ecc71", desc: "Yeşil aura, dengeyi, şifayı ve büyümeyi temsil eder. Doğayla ve huzurla iç içe olmayı seversiniz. Yardımsever bir yapınız var ve çevrenizdeki insanların huzur bulmasını sağlarsınız." },
        5: { name: "Mavi", hex: "#3498db", desc: "Mavi aura, dürüstlüğü, sakinliği ve derin bir bilgeliği simgeler. Kendinizi ifade etme biçiminiz çok zarif ve etkilidir. Güvenilir bir liman gibisiniz ve ruhsal derinliğiniz çok geniştir." },
        6: { name: "Lacivert / İndigo", hex: "#34495e", desc: "İndigo aura, sezgiselliği, maneviyatı ve vizyoner bir bakış açısını temsil eder. Olayların arkasındaki gerçeği hemen sezersiniz. Ruhsal bir rehber gibisiniz ve sezgileriniz size her zaman doğru yolu gösterir." },
        7: { name: "Mor", hex: "#9b59b6", desc: "Mor aura, hayal gücünü, sanatsal yeteneği ve ruhsal yüksekliği simgeler. Dünyaya çok farklı bir pencereden bakarsınız. Gizemli bir karizmanız var ve manevi konular hayatınızın merkezindedir." },
        8: { name: "Pembe", hex: "#fd79a8", desc: "Pembe aura, şefkati, sevgiyi ve nezaketi temsil eder. Kalbiniz her zaman sevgiyle doludur ve insanlara karşı son derece naziksiniz. İlişkilerinizde sadakat ve uyum en önemli unsurdur." },
        9: { name: "Beyaz", hex: "#ffffff", desc: "Beyaz aura, saflığı, bütünlüğü ve ruhsal aydınlanmayı simgeler. Çok nadir bulunan bir enerjidir. Evrensel sevgiye inanır ve hayata çok bütünsel, şifa veren bir pencereden bakarsınız." }
    };

    const a = auralar[sum];
    const valEl = document.getElementById('hc-aura-val');
    valEl.innerText = a.name;
    valEl.style.color = a.hex;
    document.getElementById('hc-aura-desc').innerText = a.desc;
    document.getElementById('hc-aura-result').classList.add('visible');
}

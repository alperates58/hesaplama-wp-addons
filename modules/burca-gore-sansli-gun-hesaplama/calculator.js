function hcBurcSansliGunHesapla() {
    const sign = document.getElementById('hc-sg-sign').value;
    
    const dayData = {
        "koc": { day: "Salı", ruler: "Mars", desc: "Cesaretin ve eylemin günü olan Salı, enerjinizi en yüksek seviyede kullanabileceğiniz gündür. Önemli girişimlerinizi Salı gününe denk getirmek size ivme kazandıracaktır." },
        "boga": { day: "Cuma", ruler: "Venüs", desc: "Aşkın ve bereketin günü olan Cuma, sizin estetik ve maddi değerler konusundaki şansınızı artırır. Sosyal etkinlikler ve kişisel bakım için en uygun gündür." },
        "ikizler": { day: "Çarşamba", ruler: "Merkür", desc: "Hızın ve iletişimin günü olan Çarşamba, zihninizin en keskin olduğu gündür. Önemli toplantılar, yazışmalar ve seyahat planları için bu günü değerlendirin." },
        "yengec": { day: "Pazartesi", ruler: "Ay", desc: "Duyguların ve sezgilerin günü olan Pazartesi, iç dünyanızla bağlantı kurmak ve ailenizle vakit geçirmek için en şanslı dönemdir." },
        "aslan": { day: "Pazar", ruler: "Güneş", desc: "Haftanın en parlak günü olan Pazar, sizin sahneye çıkma ve yaratıcılığınızı sergileme zamanınızdır. Özgüveninizin en yüksek olduğu bu günü kendinize ayırın." },
        "basak": { day: "Çarşamba", ruler: "Merkür", desc: "Analiz ve hizmetin günü olan Çarşamba, detaylı işlerinizi bitirmek ve sağlığınızla ilgilenmek için en verimli gündür." },
        "terazi": { day: "Cuma", ruler: "Venüs", desc: "Diplomasi ve adaletin günü olan Cuma, ikili ilişkilerinizde uyumu yakalamak ve sanatsal işlerle uğraşmak için en uygun zamandır." },
        "akrep": { day: "Salı", ruler: "Mars/Plüton", desc: "Derinliğin ve stratejinin günü olan Salı, krizleri yönetmek ve büyük dönüşümler başlatmak için size gereken gücü verir." },
        "yay": { day: "Perşembe", ruler: "Jüpiter", desc: "Bolluk ve felsefenin günü olan Perşembe, vizyonunuzu genişletmek, seyahat etmek ve akademik çalışmalar yapmak için şans kapılarını aralar." },
        "oglak": { day: "Cumartesi", ruler: "Satürn", desc: "Disiplin ve sorumluluğun günü olan Cumartesi, uzun vadeli hedefleriniz için strateji geliştirmek ve kalıcı adımlar atmak için en sağlam gündür." },
        "kova": { day: "Cumartesi", ruler: "Satürn/Uranüs", desc: "Yeniliğin ve toplumsal projelerin günü olan Cumartesi, arkadaş gruplarınızla vakit geçirmek ve geleceğe dair dâhiyane fikirler üretmek için uygundur." },
        "balik": { day: "Perşembe", ruler: "Jüpiter/Neptün", desc: "Ruhsallığın ve hayallerin günü olan Perşembe, meditasyon, sanat ve sınırsız empati gerektiren işlerde size ilham verir." }
    };

    const data = dayData[sign];
    let detailedDesc = `
        <p><strong>Neden Bu Gün?</strong> Haftanın ${data.day} günü, burcunuzun yönetici gezegeni olan ${data.ruler} tarafından yönetilir. Bu durum, o günün kozmik enerjisiyle sizin kişisel enerjinizin rezonansa girmesini sağlar.</p>
        <p><strong>Astrolojik Öneri:</strong> ${data.desc}</p>
        <p><strong>2026 Tavsiyesi:</strong> 2026 yılındaki özel gökyüzü transitleri (retro dönemleri hariç), sizin ${data.day} günlerinde alacağınız kararların daha uzun soluklu olacağını gösteriyor. Özellikle ayın kendi burcunuzda olduğu günlerin ${data.day} gününe denk gelmesi, 'süper şanslı' anlar yaratacaktır. Ajandanızda bu günleri işaretlemeyi unutmayın!</p>
    `;

    document.getElementById('hc-sg-value').innerText = data.day;
    document.getElementById('hc-sg-desc').innerHTML = detailedDesc;
    document.getElementById('hc-sg-result').classList.add('visible');
}

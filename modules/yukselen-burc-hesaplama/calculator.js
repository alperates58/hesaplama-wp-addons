function hcYukselenBurcHesapla() {
    const tarihStr = document.getElementById('hc-asc-tarih').value;
    const saatStr = document.getElementById('hc-asc-saat').value;
    const sehirCoords = document.getElementById('hc-asc-sehir').value.split(',');

    if (!tarihStr || !saatStr) {
        alert('Lütfen doğum tarihinizi ve saatinizi girin.');
        return;
    }

    const lng = parseFloat(sehirCoords[0]);
    const lat = parseFloat(sehirCoords[1]);
    const date = new Date(tarihStr + 'T' + saatStr);

    // Julian Day
    function getJD(date) {
        return (date.getTime() / 86400000) + 2440587.5;
    }

    const jd = getJD(date);
    const d = jd - 2451543.5;
    const T = d / 36525;

    // Greenwhich Mean Sidereal Time
    let gmst = 280.46061837 + 360.98564736629 * d + 0.000387933 * T * T - (T * T * T) / 38710000;
    gmst = gmst % 360;
    if (gmst < 0) gmst += 360;

    // Local Sidereal Time
    let lst = gmst + lng;
    lst = lst % 360;
    if (lst < 0) lst += 360;

    const rad = Math.PI / 180;
    const eps = 23.4392911 * rad; // Obliquity
    const phi = lat * rad;
    const ram = lst * rad;

    // Ascendant formula
    let asc = Math.atan2(Math.cos(ram), -Math.sin(ram) * Math.cos(eps) - Math.tan(phi) * Math.sin(eps)) / rad;
    asc = (asc + 360) % 360;

    const burclar = [
        "Koç", "Boğa", "İkizler", "Yengeç", "Aslan", "Başak",
        "Terazi", "Akrep", "Yay", "Oğlak", "Kova", "Balık"
    ];

    const burcIndex = Math.floor(asc / 30);
    const burc = burclar[burcIndex];

    const yorumlar = {
        "Koç": "Yükselen Koç olarak dış dünyaya karşı oldukça enerjik, cesur ve sabırsız bir imaj sergilersiniz. İnsanlar sizi ilk gördüklerinde kararlı, girişken ve bağımsız birisi olarak tanımlarlar. Hayata karşı 'önce ben' yaklaşımı sergileyebilir, yeni projelere büyük bir hevesle atılabilirsiniz. Fiziksel olarak genellikle atletik bir yapınız ve delici, odaklanmış bakışlarınız olabilir. Harekete geçmek sizin için düşünmekten daha önceliklidir; bu da sizi doğal bir lider ve öncü yapar.",
        "Boğa": "Yükselen Boğa bireyleri dışarıdan bakıldığında oldukça sakin, güvenilir ve huzurlu bir intiba bırakırlar. İlk izleniminiz sağlamlık ve dayanıklılık üzerinedir; insanlar size güvenebileceklerini hemen hissederler. Estetiğe, konfora ve kaliteye olan düşkünlüğünüz dış görünüşünüze ve giyim tarzınıza da yansır. Ağırbaşlı hareketleriniz ve sabırlı yapınız sizi çevrenizde dengeli bir figür haline getirir. Doğaya olan ilginiz ve hayattan keyif alma arzunuz, sosyal ilişkilerinizde de belirleyici bir rol oynar.",
        "İkizler": "Yükselen İkizler olarak dış dünyaya yansıttığınız enerji oldukça meraklı, konuşkan ve hareketlidir. İnsanlar sizi çok yönlü, zeki ve her konuda bilgi sahibi birisi olarak tanırlar. Sürekli bir şeylerle meşgul olan, ellerini kollarını çok kullanan ve hızlı konuşan bir yapınız olabilir. Sosyal ortamlarda bir kelebek gibi daldan dala konabilir, her türlü insanla kolayca iletişim kurabilirsiniz. Genç görünümlü ve zihinsel olarak her zaman taze kalmayı başaran bir imajınız vardır; monotonluktan nefret edersiniz.",
        "Yengeç": "Yükselen Yengeç bireyleri dış dünyaya karşı hassas, korumacı ve nazik bir maske takarlar. İnsanlar ilk bakışta sizin şefkatli ve anaç yönünüzü fark edebilirler. Duygusal güvenliğinize çok önem verdiğiniz için tanımadığınız ortamlarda başlangıçta biraz çekingen veya mesafeli durabilirsiniz. Evinize ve ailenize olan düşkünlüğünüz, dışarıya verdiğiniz imajın temelini oluşturur. Sezgileriniz çok güçlüdür ve çevrenizdeki atmosferi anında hissedersiniz; bu da sizi oldukça empatik ve duyarlı birisi yapar.",
        "Aslan": "Yükselen Aslan olarak girdiğiniz her ortamda fark edilmemeniz imkansızdır. Dış dünyaya karşı son derece özgüvenli, görkemli ve cömert bir duruş sergilersiniz. Doğal bir karizmanız vardır ve insanlar sizin liderlik vasıflarınıza kolayca kapılırlar. Saçlarınız, duruşunuz ve konuşma tarzınızla adeta bir kral veya kraliçe edasıyla hareket edersiniz. Yaratıcılığınızı sergilemekten ve takdir edilmekten büyük keyif alırsınız. Sıcakkanlı ve neşeli yapınız sayesinde çevrenize enerji dağıtan, güneş gibi parlayan bir imajınız vardır.",
        "Başak": "Yükselen Başak bireyleri dışarıdan bakıldığında oldukça derli toplu, titiz ve mütevazı bir intiba bırakırlar. İnsanlar sizi zeki, detaycı ve güvenilir birisi olarak tanımlarlar. İlk bakışta biraz mesafeli veya eleştirel görünebilirsiniz, ancak bu aslında her şeyi analiz etme ihtiyacınızdan kaynaklanır. Pratik çözümler üretmekte üstünüze yoktur ve yardımseverliğinizle tanınırsınız. Temiz, sade ve özenli bir dış görünüşünüz vardır; karmaşadan nefret eder ve her şeyin bir düzen içinde olmasını istersiniz.",
        "Terazi": "Yükselen Terazi olarak dış dünyaya karşı son derece zarif, nazik ve diplomatik bir imaj sergilersiniz. İnsanlar sizi uyumlu, adil ve sosyal ilişkilerinde başarılı birisi olarak görürler. Güzelliğe ve estetiğe olan düşkünlüğünüz, dış görünüşünüze ve çevrenize verdiğiniz öneme yansır. Tartışmalardan kaçınan ve her zaman orta yolu bulmaya çalışan yapınız sizi sevilen bir figür haline getirir. Yalnız kalmaktan hoşlanmazsınız ve her zaman şık, bakımlı görünmek istersiniz; zerafetiniz en büyük imzanızdır.",
        "Akrep": "Yükselen Akrep bireyleri dış dünyaya karşı oldukça gizemli, karizmatik ve güçlü bir maske takarlar. Bakışlarınız delici ve etkileyicidir; insanlar sizin derinliğinizden hem etkilenir hem de biraz çekinebilirler. İlk izleniminiz oldukça ketum ve mesafeli olabilir; kendinizi hemen açmaz, önce karşınızdakini tartarsınız. İçsel gücünüz ve kararlılığınız her halinizden belli olur. Dönüştürücü bir enerjiniz vardır ve yüzeysel olan hiçbir şeyden hoşlanmazsınız; her zaman olayların ve insanların özüne inmek istersiniz.",
        "Yay": "Yükselen Yay olarak dış dünyaya yansıttığınız enerji oldukça iyimser, maceracı ve özgür ruhludur. İnsanlar sizi neşeli, açık fikirli ve dürüst birisi olarak tanımlarlar. Sürekli hareket halinde olmayı, yeni yerler keşfetmeyi ve hayata felsefi bir pencereden bakmayı seversiniz. Geniş bir bakış açınız vardır ve küçük detaylarla boğulmak yerine büyük resmi görmeyi tercih edersiniz. Fiziksel olarak enerjik bir yapınız olabilir ve doğada vakit geçirmekten büyük keyif alırsınız; kısıtlanmak sizin için en büyük kabustur.",
        "Oğlak": "Yükselen Oğlak bireyleri dışarıdan bakıldığında oldukça ciddi, mesafeli ve otoriter bir intiba bırakırlar. İnsanlar sizi disiplinli, sorumluluk sahibi ve başarılı birisi olarak görürler. Küçük yaşlardan itibaren bir yetişkin olgunluğuyla hareket edebilir, kariyerinize ve statünüze büyük önem verebilirsiniz. Dayanıklılığınız ve sabrınız en belirgin özelliklerinizdir. Sade, şık ve profesyonel bir dış görünüşü tercih edersiniz. Duygularınızı kontrol altında tutan, hedeflerine odaklanmış ve güvenilir bir imajınız vardır.",
        "Kova": "Yükselen Kova olarak dış dünyaya karşı oldukça özgün, bağımsız ve entelektüel bir imaj sergilersiniz. İnsanlar sizi sıradışı, yenilikçi ve biraz da mesafeli birisi olarak tanımlarlar. Geleneksel kalıplara uymaktan hoşlanmaz, her zaman farklı ve ilerici bir duruş sergilersiniz. Toplumsal olaylara duyarlılığınız ve arkadaş canlısı yapınız sizi geniş sosyal çevrelerde ilgi odağı yapar. Teknolojiye, bilime ve geleceğe olan ilginiz dış görünüşünüze ve fikirlerinize de yansır; tam bir aykırı ruhsunuzdur.",
        "Balık": "Yükselen Balık bireyleri dış dünyaya karşı oldukça yumuşak, hayalperest ve sezgisel bir maske takarlar. İnsanlar ilk bakışta sizin merhametli ve nazik yönünüzü fark ederler. Bakışlarınız genellikle dalgın ve anlamlıdır, sanki başka dünyaları seyrediyormuşsunuz gibi bir intiba bırakırsınız. Sanatsal ve yaratıcı yönünüz dış görünüşünüze de yansır; akışkan ve romantik tarzları sevebilirsiniz. Sınırlarınız oldukça incedir, bu da sizi çevrenizdeki enerjilere karşı çok açık ve empatik birisi yapar."
    };

    document.getElementById('hc-asc-value').innerText = burc;
    document.getElementById('hc-asc-desc').innerText = yorumlar[burc];
    document.getElementById('hc-yukselen-burc-result').classList.add('visible');
}

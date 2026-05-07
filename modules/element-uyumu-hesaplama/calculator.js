function hcElementUyumuHesapla() {
    const e1 = document.getElementById('hc-elem-sel1').value;
    const e2 = document.getElementById('hc-elem-sel2').value;

    let skor = 0;
    let desc = "";

    if (e1 === e2) {
        skor = 88;
        desc = `İkiniz de <strong>${e1}</strong> elementine sahipsiniz. Aynı temel enerjiyi paylaştığınız için birbirinizin tepkilerini, arzularını ve motivasyonlarını anlamanız çok doğaldır. İlişkinizde benzer ritimlerde hareket eder ve benzer hedeflere odaklanırsınız. Ancak aynı elementten olmak, zaman zaman birbirinizin gölge yanlarını (örneğin iki ateşin aşırı öfkesini veya iki toprağın aşırı inadını) körükleyebilir. Yine de, temel bir anlayış ve güçlü bir bağ kurmanız çok kolaydır.`;
    } else if ((e1 === "Ateş" && e2 === "Hava") || (e1 === "Hava" && e2 === "Ateş")) {
        skor = 94;
        desc = `<strong>Ateş ve Hava</strong> kombinasyonu, hayatın en canlı ve ilham verici enerjilerinden biridir. Hava, ateşin daha parlak yanmasını sağlar; bu da ilişkinizde sürekli bir zihinsel uyarılma, heyecan ve hareket olacağı anlamına gelir. Birlikte yeni dünyalar keşfedebilir, büyük projeler üretebilir ve birbirinizin vizyonunu genişletebilirsiniz. Bu ilişki asla monotonlaşmaz ve çevreye sürekli pozitif bir enerji yayar. Birbirinizin özgürlüğüne saygı duyduğunuzda, bu bağ her geçen gün daha da güçlenecektir.`;
    } else if ((e1 === "Toprak" && e2 === "Su") || (e1 === "Su" && e2 === "Toprak")) {
        skor = 92;
        desc = `<strong>Toprak ve Su</strong> birleşimi, bereketin ve kalıcılığın en güzel temsilidir. Su toprağa hayat verirken, toprak da suya bir kap ve güvenli bir yön sunar. Bu birliktelikte duygusal derinlik, sadakat ve somut başarılar ön plandadır. Birbirinizi hem duygusal hem de maddi olarak çok iyi destekler ve birlikte sarsılmaz bir gelecek inşa edebilirsiniz. Oldukça besleyici, şifa veren ve huzurlu bir enerjiye sahipsiniz. Birbirinizin sessizliğini ve hassasiyetini en iyi siz anlarsınız.`;
    } else if ((e1 === "Ateş" && e2 === "Toprak") || (e1 === "Toprak" && e2 === "Ateş")) {
        skor = 75;
        desc = `<strong>Ateş ve Toprak</strong> kombinasyonu, tutku ile disiplinin bir araya gelmesidir. Ateşin heyecanı ve toprağın sağlamlığı birleştiğinde, büyük ve kalıcı işler başarma potansiyeli ortaya çıkar. Ancak ateşin hızı toprağa fazla gelebilir veya toprağın durağanlığı ateşi söndürebilir. Birbirinizin farklı hızlarına ve yaklaşımlarına uyum sağlamayı öğrendiğinizde, her ikiniz de çok daha dengeli bireyler haline geleceksiniz. Bu ilişki, sabırla ve anlayışla işlendiğinde çok güçlü bir başarı potansiyeli taşır.`;
    } else if ((e1 === "Hava" && e2 === "Su") || (e1 === "Su" && e2 === "Hava")) {
        skor = 70;
        desc = `<strong>Hava ve Su</strong> birleşimi, zihin ile duyguların dansıdır. Bir taraf olayları mantık ve iletişimle çözmek isterken, diğer taraf sezgi ve derin hislerle yaklaşır. Bu farklılık, başlarda bazı anlaşmazlıklara yol açsa da aslında birbirinizden öğrenecek çok şeyiniz var. Hava, suyun duygusal derinliğini anlamlandırmasına yardım ederken; su, havanın biraz daha hissetmesini ve empati kurmasını sağlar. Birbirinizin dillerini konuşmayı başardığınızda, çok zengin ve öğretici bir bağ kurabilirsiniz.`;
    } else {
        skor = 60;
        desc = `<strong>Ateş ve Su</strong> veya <strong>Hava ve Toprak</strong> gibi zıt enerjiler, 'zıt kutupların çekimi' kuralıyla birbirlerine çok güçlü bir şekilde kapılabilirler. Ancak bu ilişkide dengeyi korumak büyük bir özveri gerektirir. Birbirinizin tam tersi olan yaklaşımları, hayata bakışınızı genişletmek için harika bir fırsattır. Sabır, empati ve birbirinizin temel ihtiyaçlarına saygı duymak başarınızın anahtarıdır. Zorlukları aşıp orta yolu bulduğunuzda, birbirinizi en iyi tamamlayan çiftlerden biri olabilirsiniz.`;
    }

    document.getElementById('hc-elem-skor').innerText = "%" + skor;
    document.getElementById('hc-elem-desc').innerHTML = desc;
    document.getElementById('hc-element-uyumu-result').classList.add('visible');
}

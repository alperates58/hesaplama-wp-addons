function hcTimeAnalizHesapla() {
    const time = document.getElementById('hc-time-input').value;
    if (!time) { alert('Lütfen bir saat seçin.'); return; }

    const hour = parseInt(time.split(':')[0]);
    let desc = "";

    if (hour >= 5 && hour < 8) {
        desc = "Günün ilk ışıklarıyla doğmuşsunuz. Bu saatlerde doğanlar genellikle hayata karşı çok daha canlı, girişken ve dışadönük bir tavır sergilerler. Yükselen burcunuz muhtemelen Güneş burcunuzla aynı veya bir sonraki burçtur; bu da kişiliğiniz ile dış dünyadaki imajınızın çok uyumlu olduğunu gösterir.";
    } else if (hour >= 8 && hour < 11) {
        desc = "Kuşluk vaktinde doğmuşsunuz. Bu saatler sosyal çevre, arkadaşlar ve ideallerle ilgilidir. Hayatınızda sosyal bağlantılar ve gruplar içindeki yeriniz çok önemli olabilir. İnsanlara yardım etmek ve toplumsal vizyonlar geliştirmek ruhunuzu besleyen temel bir unsurdur.";
    } else if (hour >= 11 && hour < 14) {
        desc = "Güneşin en tepede olduğu saatlerde doğmuşsunuz. Kariyer, başarı ve toplumsal statü sizin için çok önemli olacaktır. Kendinizi dünyada kanıtlama arzunuz yüksektir. Otorite figürleriyle olan ilişkileriniz ve toplum önündeki imajınız hayatınızın ana temasını oluşturur.";
    } else if (hour >= 14 && hour < 17) {
        desc = "Öğleden sonra doğmuşsunuz. Bu saatler ufukları genişletmek, eğitim ve seyahatlerle ilgilidir. Hayata felsefi bir bakış açısıyla yaklaşırsınız. Sürekli yeni şeyler öğrenmek ve farklı dünyalar keşfetmek sizin en büyük tutkunuz olabilir.";
    } else if (hour >= 17 && hour < 20) {
        desc = "Güneş batarken doğmuşsunuz. İkili ilişkiler, ortaklıklar ve evlilik sizin için çok hayati bir önem taşır. Hayatı bir başkasıyla paylaşmak, başkalarının gözünden kendinizi görmek ve sosyal uyum sizin ana rotanızdır.";
    } else {
        desc = "Gece veya sabaha karşı doğmuşsunuz. Bu saatler içsel dünya, bilinçaltı ve köklerle ilgilidir. Sezgileriniz çok güçlü olabilir. Hayatınızın büyük bir kısmını içsel keşifler yaparak ve ruhsal derinlik kazanarak geçirebilirsiniz. Ev ve aile hayatı sizin en güvenli limanınızdır.";
    }

    document.getElementById('hc-time-desc').innerText = desc;
    document.getElementById('hc-time-result').classList.add('visible');
}

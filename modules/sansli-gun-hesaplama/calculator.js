function hcSansliGunBul() {
    const dStr = document.getElementById('hc-sg-date').value;
    if (!dStr) { alert('Lütfen doğum tarihinizi girin.'); return; }
    
    const date = new Date(dStr);
    const dayIndex = date.getDay(); // 0: Sun, 1: Mon...

    const gunler = [
        { name: "Pazar", planet: "Güneş", desc: "Pazar günü doğanlar Güneş'in ışığını taşırlar. Sizin için en şanslı gün Pazar'dır. Hayatınızda parlamak, liderlik etmek ve yaratıcılığınızı sergilemek için haftanın bu gününü kullanmalısınız. Enerjiniz Pazar günleri zirveye ulaşır." },
        { name: "Pazartesi", planet: "Ay", desc: "Pazartesi doğanlar Ay'ın hassasiyetini ve sezgiselliğini taşırlar. Sizin şanslı gününüz Pazartesi'dir. Duygusal bağlar kurmak, yuva ile ilgili işleri halletmek ve sezgilerinize güvenmek için bu gün harikadır." },
        { name: "Salı", planet: "Mars", desc: "Salı günü doğanlar Mars'ın cesaretini ve enerjisini taşırlar. Sizin en şanslı ve en güçlü olduğunuz gün Salı'dır. Mücadele gerektiren işler, spor ve fiziksel aktiviteler için haftanın bu gününü tercih etmelisiniz." },
        { name: "Çarşamba", planet: "Merkür", desc: "Çarşamba doğanlar Merkür'ün zekasını ve iletişim gücünü taşırlar. Sizin şanslı gününüz Çarşamba'dır. Ticari görüşmeler, yazışmalar ve yeni şeyler öğrenmek için haftanın bu günü size kapılar açacaktır." },
        { name: "Perşembe", planet: "Jüpiter", desc: "Perşembe günü doğanlar Jüpiter'in bolluğunu ve şansını taşırlar. Sizin için haftanın en bereketli günü Perşembe'dir. Finansal işler, eğitim ve ruhsal büyüme için bu günün yüksek enerjisinden faydalanmalısınız." },
        { name: "Cuma", planet: "Venüs", desc: "Cuma doğanlar Venüs'ün zarafetini ve sevgisini taşırlar. Sizin en şanslı gününüz Cuma'dır. Aşk, sanat, güzellik ve sosyalleşme için haftanın bu günü size muazzam bir çekim gücü verir." },
        { name: "Cumartesi", planet: "Satürn", desc: "Cumartesi günü doğanlar Satürn'ün disiplinini ve kalıcılığını taşırlar. Sizin şanslı gününüz Cumartesi'dir. Uzun vadeli planlar yapmak, sorumluluk almak ve ciddi işleri tamamlamak için bu günün sağlam enerjisini kullanın." }
    ];

    const g = gunler[dayIndex];
    document.getElementById('hc-sg-val').innerText = g.name + " (Gezegeniniz: " + g.planet + ")";
    document.getElementById('hc-sg-desc').innerText = g.desc;
    document.getElementById('hc-sg-result').classList.add('visible');
}

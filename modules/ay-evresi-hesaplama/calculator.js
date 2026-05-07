function hcAyEvresiHesapla() {
    const dateStr = document.getElementById('hc-ay-date').value;
    if (!dateStr) { alert('Lütfen bir tarih seçin.'); return; }
    
    const date = new Date(dateStr);
    const lp = 2551443; // Lunar cycle in seconds
    const now = Math.floor(date.getTime() / 1000);
    const new_moon = 592500; // Reference New Moon in 1970
    
    let phase = ((now - new_moon) % lp) / lp;
    if (phase < 0) phase += 1;

    let phaseName = "";
    let phaseDesc = "";
    let icon = "";

    if (phase < 0.03 || phase > 0.97) {
        phaseName = "Yeni Ay";
        icon = "🌑";
        phaseDesc = "Yeni Ay evresi, başlangıçları, tohum ekmeyi ve niyet etmeyi temsil eder. Gökyüzünde Ay görünmezdir, bu da içe dönüş ve yenilenme vaktidir. Yeni projelere başlamak ve hayatınızda temiz bir sayfa açmak için en uygun zamandır.";
    } else if (phase < 0.22) {
        phaseName = "Hilal";
        icon = "🌒";
        phaseDesc = "Hilal evresi, niyetlerin filizlenmeye başladığı zamandır. Planlarınızı netleştirmek ve hedeflerinize doğru ilk adımları atmak için motivasyonunuzun arttığı bir dönemdir. Sabırla büyüme sürecine odaklanmalısınız.";
    } else if (phase < 0.28) {
        phaseName = "İlk Dördün";
        icon = "🌓";
        phaseDesc = "İlk Dördün evresi, harekete geçme ve engelleri aşma vaktidir. Gökyüzünde Ay'ın yarısı görünür. Bu dönemde kararlılığınız test edilebilir; planlarınızı uygulamak için cesaretle ilerlemelisiniz.";
    } else if (phase < 0.47) {
        phaseName = "Büyüyen Ay";
        icon = "🌔";
        phaseDesc = "Ay büyümeye devam ederken enerjiniz de yükselir. Bu evre, detaylara odaklanmak, işleri mükemmelleştirmek ve gelişimi gözlemlemek için harikadır. Hedeflerinize ulaşmanıza çok az kaldı.";
    } else if (phase < 0.53) {
        phaseName = "Dolunay";
        icon = "🌕";
        phaseDesc = "Dolunay evresi, hasat, tamamlanma ve aydınlanma zamanıdır. Duygular zirveye ulaşır ve her şey tüm çıplaklığıyla görünür hale gelir. Çabalarınızın sonuçlarını alabilir ve artık size hizmet etmeyen şeyleri bırakabilirsiniz.";
    } else if (phase < 0.72) {
        phaseName = "Küçülen Ay";
        icon = "🌖";
        phaseDesc = "Hasat sonrası paylaşma ve şükretme vaktidir. Bilginizi ve tecrübelerinizi başkalarına aktarmak, çevrenize faydalı olmak için ideal bir dönemdir. Enerjiniz yavaş yavaş içe doğru çekilmeye başlar.";
    } else if (phase < 0.78) {
        phaseName = "Son Dördün";
        icon = "🌗";
        phaseDesc = "Son Dördün, bırakma ve arınma zamanıdır. Artık işe yaramayan kalıpları, alışkanlıkları ve yükleri serbest bırakmalısınız. Yeni döngüye hazırlanmak için ruhsal ve fiziksel bir temizlik yapma vaktidir.";
    } else {
        phaseName = "Balzamik Ay";
        icon = "🌘";
        phaseDesc = "Döngünün son evresi olan Balzamik Ay, dinlenme ve rüya görme vaktidir. Fiziksel aktiviteleri azaltıp ruhsal çalışmalara odaklanmalı, gelecekteki Yeni Ay için güç toplamalısınız. Tam bir teslimiyet vaktidir.";
    }

    document.getElementById('hc-ay-val').innerText = icon + " " + phaseName;
    document.getElementById('hc-ay-desc').innerText = phaseDesc;
    document.getElementById('hc-ay-result').classList.add('visible');
}

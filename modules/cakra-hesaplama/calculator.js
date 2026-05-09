function hcCakraBul() {
    const dStr = document.getElementById('hc-cakra-date').value;
    if (!dStr) { alert('Lütfen doğum tarihinizi girin.'); return; }
    
    const sum = dStr.replace(/-/g, '').split('').reduce((a, b) => parseInt(a) + parseInt(b), 0);
    const res = (sum % 7) + 1;

    const cakralar = {
        1: { name: "Kök Çakra (Muladhara)", desc: "Güven, hayatta kalma ve aidiyet duygusunun merkezidir. Kök çakranız baskın olduğunda kendinizi dünyada güvende, köklenmiş ve fiziksel olarak güçlü hissedersiniz." },
        2: { name: "Sakral Çakra (Svadhisthana)", desc: "Yaratıcılık, duygular ve tutkunun merkezidir. Hayatın tadını çıkarma, esneklik ve değişimlere uyum sağlama yeteneğiniz bu merkezden beslenir." },
        3: { name: "Solar Pleksus Çakra (Manipura)", desc: "Özgüven, irade gücü ve kişisel kimliğin merkezidir. Karar verme yeteneğiniz ve hayattaki duruşunuz bu enerji noktasından kaynaklanır." },
        4: { name: "Kalp Çakrası (Anahata)", desc: "Sevgi, şefkat ve bağışlamanın merkezidir. Kendinize ve başkalarına karşı duyduğunuz koşulsuz sevgi ve empati yeteneğiniz bu merkezle ilgilidir." },
        5: { name: "Boğaz Çakrası (Vishuddha)", desc: "İletişim, dürüstlük ve kendini ifade etmenin merkezidir. Kendi gerçeğinizi söyleme ve yaratıcı fikirlerinizi paylaşma gücünüz buradan gelir." },
        6: { name: "Üçüncü Göz Çakrası (Ajna)", desc: "Sezgi, öngörü ve ruhsal farkındalığın merkezidir. Görünenin ötesini fark etme ve içsel bilgelikle hareket etme yeteneğinizi temsil eder." },
        7: { name: "Tepe Çakra (Sahasrara)", desc: "Ruhsal bağlantı, aydınlanma ve evrensel bilincin merkezidir. Varoluşla bir olma hissi ve ruhsal bütünlük bu enerji noktasının ana temasıdır." }
    };

    const c = cakralar[res];
    document.getElementById('hc-cakra-val').innerText = c.name;
    document.getElementById('hc-cakra-desc').innerText = c.desc;
    document.getElementById('hc-cakra-result').classList.add('visible');
}

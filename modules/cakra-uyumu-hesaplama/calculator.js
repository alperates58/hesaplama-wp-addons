function hcCakraUyumuHesapla() {
    const d1 = document.getElementById('hc-cakra-date1').value;
    const d2 = document.getElementById('hc-cakra-date2').value;

    if (!d1 || !d2) { alert('Lütfen her iki doğum tarihini de girin.'); return; }

    function getCakra(date) {
        const sum = date.replace(/-/g, '').split('').reduce((a, b) => parseInt(a) + parseInt(b), 0);
        const res = (sum % 7) + 1;
        const names = ["Kök Çakra", "Sakral Çakra", "Solar Pleksus Çakra", "Kalp Çakrası", "Boğaz Çakrası", "Üçüncü Göz Çakrası", "Tepe Çakrası"];
        return { val: res, name: names[res-1] };
    }

    const c1 = getCakra(d1);
    const c2 = getCakra(d2);

    let skor = 0;
    let desc = "";

    const diff = Math.abs(c1.val - c2.val);

    if (diff === 0) {
        skor = 98;
        desc = `İnanılmaz! Her ikiniz de aynı temel çakra enerjisine (<strong>${c1.name}</strong>) sahipsiniz. Bu durum, ruhsal olarak birbirinizi hiçbir söz söylemeden anlamanızı ve aynı hayat frekansında titreşmenizi sağlar. Enerjileriniz birbirini besler ve ruhsal gelişiminizde birbirinize ayna görevi görürsünüz. Bu birliktelik, çok derin bir ruhsal bağ ve sarsılmaz bir birlik duygusu vaat ediyor.`;
    } else if (diff <= 2) {
        skor = 85;
        desc = `Çakra merkezleriniz (<strong>${c1.name}</strong> ve <strong>${c2.name}</strong>) birbirine çok yakın frekanslarda. Bu, enerjilerinizin kolayca birbirine uyum sağladığı ve birlikteyken kendinizi çok daha dengeli hissettiğiniz anlamına gelir. Birbirinizin eksik kalan enerji noktalarını doğal bir şekilde tamamlarsınız. Birlikte meditasyon yapmak veya ruhsal çalışmalar yürütmek aşkınızı çok daha yüksek bir boyuta taşıyacaktır.`;
    } else {
        skor = 70;
        desc = `Çakra merkezleriniz (<strong>${c1.name}</strong> ve <strong>${c2.name}</strong>) farklı yaşam alanlarını temsil ediyor. Bu durum, ilişkinizde çok geniş bir bakış açısı ve çeşitlilik sağlar. Biriniz daha dünyevi ve köklenmişken, diğeriniz daha ruhsal ve vizyoner olabilir. Bu farklılık, birbirinizi geliştirmeniz ve hayata çok daha bütünsel bakmanız için bir fırsattır. Enerjilerinizi dengelemeyi öğrendiğinizde, her ikiniz de çok daha güçlü bireyler haline geleceksiniz.`;
    }

    document.getElementById('hc-cakra-val1').innerText = c1.name;
    document.getElementById('hc-cakra-val2').innerText = c2.name;
    document.getElementById('hc-cakra-skor').innerText = "%" + skor;
    document.getElementById('hc-cakra-desc').innerHTML = desc;
    document.getElementById('hc-cakra-uyumu-result').classList.add('visible');
}

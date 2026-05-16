function hcOlgunlukSayisiHesapla() {
    const name = document.getElementById('hc-mn-name').value.trim();
    const dateStr = document.getElementById('hc-mn-date').value;
    if (!name || !dateStr) { alert('Lütfen tüm alanları doldurun.'); return; }

    function reduce(num) {
        let s = num.toString();
        while (s.length > 1) {
            let sum = 0;
            for (let char of s) sum += parseInt(char);
            s = sum.toString();
        }
        return parseInt(s);
    }

    const map = {
        'a':1,'j':1,'s':1,'ş':1,
        'b':2,'k':2,'t':2,
        'c':3,'ç':3,'l':3,'u':3,'ü':3,
        'd':4,'m':4,'v':4,
        'e':5,'n':5,'w':5,
        'f':6,'o':6,'ö':6,'x':6,
        'g':7,'ğ':7,'p':7,'y':7,
        'h':8,'q':8,'z':8,
        'i':9,'ı':9,'r':9
    };

    // Expression Number
    let nameSum = 0;
    for (let char of name.toLowerCase()) {
        if (map[char]) nameSum += map[char];
    }
    const expressionNum = reduce(nameSum);

    // Life Path Number
    const date = new Date(dateStr);
    let dateSum = date.getDate() + (date.getMonth() + 1);
    let yearS = date.getFullYear().toString();
    for (let char of yearS) dateSum += parseInt(char);
    const lifePathNum = reduce(dateSum);

    // Maturity Number = Expression + Life Path
    const result = reduce(expressionNum + lifePathNum);

    const interpretations = {
        1: "Yaşlandıkça daha bağımsız ve öncü bir karakter sergileyeceksiniz. Kendi projelerinizi yönetmek sizi tatmin edecek.",
        2: "Olgunluk döneminde huzur, denge ve uyumlu ilişkiler ön planda olacak. Paylaşımcı ve arabulucu bir rol üstleneceksiniz.",
        3: "Hayatın ilerleyen yıllarında yaratıcılığınız ve sosyal çevreniz genişleyecek. Kendinizi sanat veya sözcüklerle ifade etmek sizi mutlu edecek.",
        4: "Olgunlukta kalıcılık, güvenilirlik ve düzen kurma enerjisi hakim olacak. Birikimlerinizi ve tecrübenizi somut bir yapıya dönüştüreceksiniz.",
        5: "İlerleyen yaşlarda daha maceracı, esnek ve özgür bir ruh haline bürüneceksiniz. Yeni yerler görmek ve öğrenmek tutkunuz olacak.",
        6: "Hayatın ikinci yarısında aile, yuva ve toplumsal sorumluluklar merkeze yerleşecek. Şifa veren ve sevgi dağıtan bir figür olacaksınız.",
        7: "Olgunlukta ruhsal derinlik, bilgelik ve yalnızlık ihtiyacı artacak. Hayatın anlamını sorgulayan bir gözlemciye dönüşeceksiniz.",
        8: "İlerleyen yıllarda maddi güç, otorite ve başarı enerjisi yükselecek. Büyük organizasyonlar kurma veya yönetme potansiyeliniz açığa çıkacak.",
        9: "Olgunluk döneminde evrensel sevgi, yardımseverlik ve tamamlama enerjisi hakim olacak. İnsanlığa hizmet eden bir bilge rolü üstleneceksiniz."
    };

    document.getElementById('hc-mn-val').innerText = result;
    document.getElementById('hc-mn-desc').innerText = interpretations[result];

    document.getElementById('hc-maturity-number-result').classList.add('visible');
}

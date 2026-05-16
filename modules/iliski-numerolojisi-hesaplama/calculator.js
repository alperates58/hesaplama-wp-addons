/**
 * İlişki Numerolojisi Hesaplama
 */

const HC_Num_Tool = {
    alphabet: {
        'a':1,'j':1,'s':1,'ş':1,
        'b':2,'k':2,'t':2,
        'c':3,'ç':3,'l':3,'u':3,'ü':3,
        'd':4,'m':4,'v':4,
        'e':5,'n':5,'w':5,
        'f':6,'o':6,'ö':6,'x':6,
        'g':7,'ğ':7,'p':7,'y':7,
        'h':8,'q':8,'z':8,
        'i':9,'ı':9,'r':9
    },

    reduce: function(num) {
        while (num > 9 && num !== 11 && num !== 22 && num !== 33) {
            num = num.toString().split('').reduce((a, b) => parseInt(a) + parseInt(b), 0);
        }
        return num;
    },

    getNameValue: function(name) {
        let total = 0;
        name.toLowerCase().split('').forEach(char => {
            if (this.alphabet[char]) total += this.alphabet[char];
        });
        return this.reduce(total);
    },

    getLifePath: function(dateStr) {
        const digits = dateStr.replace(/-/g, '').split('');
        let total = digits.reduce((a, b) => parseInt(a) + parseInt(b), 0);
        return this.reduce(total);
    }
};

function hcIliskiNumerolojisiHesapla() {
    const n1 = document.getElementById('hc-num-n1').value;
    const n2 = document.getElementById('hc-num-n2').value;
    const d1 = document.getElementById('hc-num-d1').value;
    const d2 = document.getElementById('hc-num-d2').value;

    if (!n1 || !n2 || !d1 || !d2) {
        alert("Lütfen tüm alanları doldurun.");
        return;
    }

    const lp1 = HC_Num_Tool.getLifePath(d1);
    const lp2 = HC_Num_Tool.getLifePath(d2);
    const dv1 = HC_Num_Tool.getNameValue(n1);
    const dv2 = HC_Num_Tool.getNameValue(n2);

    const relNum = HC_Num_Tool.reduce(lp1 + lp2);

    const meanings = {
        1: "Yenilikçi ve öncü bir ilişki. Birlikte yeni yollar açabilirsiniz.",
        2: "Uyumlu ve işbirliğine dayalı bir ilişki. Duygusal bağınız çok güçlü.",
        3: "Sosyal, neşeli ve yaratıcı bir ilişki. Birlikte çok eğlenirsiniz.",
        4: "Güvenli ve sağlam temelli bir ilişki. Planlı ve düzenli bir gelecek.",
        5: "Heyecan verici ve özgür bir ilişki. Macera ve değişim eksik olmaz.",
        6: "Sorumluluk ve sevgi odaklı bir ilişki. Aile ve yuva sıcaklığı ön planda.",
        7: "Ruhsal ve derin bir ilişki. Birbirinizi zihinsel olarak beslersiniz.",
        8: "Başarı ve güç odaklı bir ilişki. Maddi ve manevi hedeflerinize ulaşırsınız.",
        9: "Evrensel sevgi ve tamamlanma ilişkisi. Birbirinize çok şey katarsınız."
    };

    document.getElementById('hc-num-rel-value').innerText = relNum;
    
    let html = `
        <div class="hc-num-grid">
            <div class="hc-num-box">
                <strong>1. Kişi Yaşam Yolu:</strong> <span>${lp1}</span>
            </div>
            <div class="hc-num-box">
                <strong>2. Kişi Yaşam Yolu:</strong> <span>${lp2}</span>
            </div>
        </div>
        <div class="hc-num-interpretation">
            <h4>İlişki Sayınızın Anlamı: ${relNum}</h4>
            <p>${meanings[relNum] || "Bu sayı, ilişkinizin benzersiz bir titreşimde olduğunu gösterir."}</p>
        </div>
    `;

    document.getElementById('hc-num-details').innerHTML = html;
    document.getElementById('hc-iliski-numerolojisi-result').classList.add('visible');
}

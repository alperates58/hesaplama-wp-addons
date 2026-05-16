function hcMelekSayisiBul() {
    const num = document.getElementById('hc-an-input').value;
    if (!num) {
        alert('Lütfen bir sayı girin.');
        return;
    }

    const meanings = {
        "000": "Yeni başlangıçlar ve sonsuz olasılıklar. Evrenin desteği tam arkanızda.",
        "111": "Düşünceleriniz hızla gerçeğe dönüşüyor. Neye odaklandığınıza dikkat edin; pozitif kalın.",
        "222": "Güven ve denge. Her şey olması gerektiği gibi ilerliyor, sabırlı olun ve akışta kalın.",
        "333": "Yükselmiş üstatlar yanınızda. Yaratıcılığınızı kullanın ve yardım istemekten çekinmeyin.",
        "444": "Melekler sizi çevreliyor ve koruyor. Doğru yoldasınız, sıkı çalışmanızın karşılığını alacaksınız.",
        "555": "Büyük ve olumlu bir değişim kapıda. Bu değişimi korkusuzca kucaklayın.",
        "666": "Düşüncelerinizi dengeleme vakti. Maddi kaygılardan uzaklaşıp ruhsal merkezinize dönün.",
        "777": "Mucizeler ve spiritüel aydınlanma. Şans sizinle, çabalarınız meyvelerini veriyor.",
        "888": "Bolluk ve bereket dönemi. Finansal veya ruhsal anlamda büyük bir ödül yaklaşıyor.",
        "999": "Bir döngünün sonu. Yeni bir kapı açılmadan önce tamamlanması gerekenleri bitirin.",
        "1010": "Ruhsal uyanış ve kişisel gelişim. Sezgilerinize güvenin ve hedeflerinize odaklanın.",
        "1111": "Uyanış çağrısı. Evrenle tam bir uyum içindesiniz, niyetlerinizi netleştirin.",
        "1212": "Korkularınızı bırakın. Melekler sizi daha yüksek bir yaşam amacına doğru yönlendiriyor.",
        "2222": "Huzur ve uyum. İlişkilerinizde ve hayatınızda her şey yerine oturuyor."
    };

    let desc = meanings[num];

    if (!desc) {
        // Numerological reduction fallback
        let sum = 0;
        num.split('').forEach(d => sum += parseInt(d));
        while (sum > 9 && sum !== 11 && sum !== 22) {
            let tempSum = 0;
            sum.toString().split('').forEach(d => tempSum += parseInt(d));
            sum = tempSum;
        }

        const baseMeanings = {
            1: "Liderlik, bağımsızlık ve yeni başlangıçlar enerjisi.",
            2: "İş birliği, denge ve diplomasi enerjisi.",
            3: "Yaratıcılık, iletişim ve neşe enerjisi.",
            4: "Sıkı çalışma, temel ve güvenlik enerjisi.",
            5: "Özgürlük, değişim ve macera enerjisi.",
            6: "Sorumluluk, sevgi ve aile enerjisi.",
            7: "Bilgelik, iç gözlem ve spiritüellik enerjisi.",
            8: "Bolluk, güç ve otorite enerjisi.",
            9: "Tamamlanma, insani yardım ve dönüşüm enerjisi.",
            11: "Sezgi, ilham ve spiritüel uyanışın usta sayısı.",
            22: "Büyük projeler ve vizyonların usta inşaatçısı sayısı."
        };

        desc = `Bu özel sayı kombinasyonu ${sum} rakamının enerjisini taşıyor: ${baseMeanings[sum]} Melekleriniz bu enerjiyle ilerlemenizi istiyor olabilir.`;
    }

    document.getElementById('hc-an-value').innerText = num;
    document.getElementById('hc-an-desc').innerHTML = `<p>${desc}</p>`;
    document.getElementById('hc-melek-sayisi-result').classList.add('visible');
}

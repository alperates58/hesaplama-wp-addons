function hcBabaCocukUyumHesapla() {
    const sign1 = document.getElementById('hc-bc-sign1').value;
    const sign2 = document.getElementById('hc-bc-sign2').value;

    const signTypes = {
        "koc": "Ateş", "aslan": "Ateş", "yay": "Ateş",
        "boga": "Toprak", "basak": "Toprak", "oglak": "Toprak",
        "ikizler": "Hava", "terazi": "Hava", "kova": "Hava",
        "yengec": "Su", "akrep": "Su", "balik": "Su"
    };

    const e1 = signTypes[sign1];
    const e2 = signTypes[sign2];

    let score = 50;
    let desc = "";

    if (e1 === e2) {
        score = 92;
        desc = "Çocuğunuzun hayattaki duruşunu ve motivasyonlarını çok iyi anlıyorsunuz. Ona kendi deneyimlerinizle ışık tutarken ortak bir dil kurmanız çok kolay.";
    } else if ((e1 === "Ateş" && e2 === "Hava") || (e1 === "Hava" && e2 === "Ateş")) {
        score = 95;
        desc = "Çok vizyoner ve destekleyici bir bağ! Çocuğunuzun fikirlerini destekliyor ve onun özgüvenini artırıyorsunuz. Birlikte harika projeler yürütebilirsiniz.";
    } else if ((e1 === "Toprak" && e2 === "Su") || (e1 === "Su" && e2 === "Toprak")) {
        score = 88;
        desc = "Güçlü bir koruma ve disiplin bağı. Çocuğunuza sağlam bir zemin sunarken onun duygusal dünyasını da ihmal etmiyorsunuz.";
    } else {
        score = 60;
        desc = "Otorite ve özgürlük dengesinde bazen çatışmalar yaşanabilir. Çocuğunuzun hızı veya hassasiyeti sizin disiplin anlayışınıza uzak gelebilir. Esnekliğe odaklanın.";
    }

    let detailedContent = `
        <p><strong>Rehberlik Dinamiği:</strong> ${desc}</p>
        <p><strong>Baba Olarak Rolünüz:</strong> ${sign1.toUpperCase()} burcu bir baba olarak, çocuğunuza ${e1 === "Ateş" ? "cesaret" : e1 === "Toprak" ? "istikrar" : e1 === "Hava" ? "bilgi" : "merhamet"} aşılıyorsunuz.</p>
        <p><strong>2026 Baba-Çocuk Gündemi:</strong> 2026 yılında çocuğunuzun bağımsızlık arzusu artabilir. Ona kendi kararlarını alma şansı tanımanız, aranızdaki 'saygı' bağını daha da güçlendirecektir. Birlikte bir hobi veya sporla ilgilenmek için mükemmel bir yıl.</p>
        <p><strong>Tavsiye:</strong> Onun sizi bir 'kaptan' olarak görmesini sağlayın; ama gemiyi bazen onun da dümenine bırakmayı ihmal etmeyin.</p>
    `;

    document.getElementById('hc-bc-value').innerText = `% ${score}`;
    document.getElementById('hc-bc-desc').innerHTML = detailedContent;
    document.getElementById('hc-bc-result').classList.add('visible');
}

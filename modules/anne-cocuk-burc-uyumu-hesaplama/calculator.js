function hcAnneCocukUyumHesapla() {
    const sign1 = document.getElementById('hc-ac-sign1').value;
    const sign2 = document.getElementById('hc-ac-sign2').value;

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
        score = 90;
        desc = "Çocuğunuzla aynı frekanstasınız. Onun ne hissettiğini ve neye ihtiyaç duyduğunu sezgisel olarak biliyorsunuz. Ortak dünyanız oldukça zengin.";
    } else if ((e1 === "Su" || e1 === "Toprak") && (e2 === "Su" || e2 === "Toprak")) {
        score = 85;
        desc = "Huzurlu, güvenli ve şefkatli bir anne-çocuk ilişkisi. Çocuğunuza ihtiyacı olan aidiyet ve güvenlik duygusunu fazlasıyla veriyorsunuz.";
    } else if ((e1 === "Ateş" || e1 === "Hava") && (e2 === "Ateş" || e2 === "Hava")) {
        score = 88;
        desc = "Aktif, sosyal ve eğlenceli bir bağ. Çocuğunuzla birlikte yeni şeyler keşfetmekten ve öğrenmekten keyif alıyorsunuz. Onu özgür bırakma konusunda çok iyisiniz.";
    } else {
        score = 65;
        desc = "Farklı karakter yapılarınız var. Çocuğunuzun hızı veya duygusal derinliği size bazen yabancı gelebilir. Sabırlı bir gözlemle aranızdaki farkları birer avantaja dönüştürebilirsiniz.";
    }

    let detailedContent = `
        <p><strong>Ebeveynlik Dinamiği:</strong> ${desc}</p>
        <p><strong>Çocuğunuzun Ruhsal İhtiyacı:</strong> ${sign2.toUpperCase()} burcu bir çocuk olarak, özellikle ${e2 === "Su" ? "duygusal onay" : e2 === "Ateş" ? "hareket özgürlüğü" : e2 === "Toprak" ? "düzen ve güvenlik" : "zihinsel uyarılma"} bekler.</p>
        <p><strong>2026 Anne-Çocuk Gündemi:</strong> 2026 yılı eğitim ve yetenek keşfi için harika bir yıl. Çocuğunuzun gizli kalmış bir yeteneğini (özellikle sanat veya spor) bu yıl keşfedebilirsiniz. Yaz aylarında birlikte yapacağınız etkinlikler bağınızı derinleştirecektir.</p>
        <p><strong>Tavsiye:</strong> Onun dünyasına girmek için bazen kendi doğrularınızdan esnemeyi deneyin. Aşkın en saf hali olan bu bağ, her türlü burç zıtlığını aşacak güçtedir.</p>
    `;

    document.getElementById('hc-ac-value').innerText = `% ${score}`;
    document.getElementById('hc-ac-desc').innerHTML = detailedContent;
    document.getElementById('hc-ac-result').classList.add('visible');
}

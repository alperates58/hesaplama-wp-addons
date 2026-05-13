function hcParallelHesapla() {
    const p1 = document.getElementById('hc-pa-p1').value;
    const p2 = document.getElementById('hc-pa-p2').value;
    const type = document.getElementById('hc-pa-type').value;

    const planetNames = {
        "gunes": "Güneş", "ay": "Ay", "merkur": "Merkür", "venus": "Venüs",
        "mars": "Mars", "jupiter": "Jüpiter", "saturn": "Satürn"
    };

    let theme = type === "parallel" ? "Kuvvetli Birleşme" : "Zıt Dengelenme";
    let desc = "";

    if (type === "parallel") {
        desc = `Haritanızda ${planetNames[p1]} ve ${planetNames[p2]} arasındaki Parelel bağ, bu iki gezegenin sanki bir kavuşum açısı yapıyormuş gibi çok güçlü bir şekilde birleştiğini gösterir. Bu, klasik açılarda görünmeyen ama hayatınızda çok baskın olan gizli bir güç birliğidir.`;
    } else {
        desc = `Haritanızda ${planetNames[p1]} ve ${planetNames[p2]} arasındaki Kontra-Parelel bağ, bu iki gezegenin bir karşıt açı gibi birbirini dengelediğini veya çatıştığını gösterir. Bu durum, hayatınızda bir 'çek-bırak' dinamiği yaratarak sizi sürekli gelişmeye iter.`;
    }

    let detailedContent = `
        <p><strong>Boyutsal Açı Analizi:</strong> ${desc}</p>
        <p><strong>Karakter Dinamiği:</strong> Parelel açılar haritanın 'gizli motorlarıdır'. Klasik açılarda (üçgen, kare vb.) bu iki gezegen arasında bir bağ olmasa bile, deklinasyon sayesinde birbirlerinin enerjilerini doğrudan etkilerler.</p>
        <p><strong>2026 Süreci:</strong> 2026 yılında gökyüzündeki deklinasyon hareketleri, sizin bu gizli bağınızı görünür kılacak. Hayatınızdaki bazı 'rastlantısal' olayların aslında bu derin bağdan kaynaklandığını fark edebilirsiniz. Özellikle kadersel karşılaşmalar ve büyük kararlar bu açı üzerinden şekillenebilir.</p>
        <p><strong>Tavsiye:</strong> Görünmeyeni fark etmek, kadim bilgeliğin anahtarıdır. Bu bağın sunduğu enerjiyi hayatınızdaki dengeyi kurmak için kullanın.</p>
    `;

    document.getElementById('hc-pa-value').innerText = theme;
    document.getElementById('hc-pa-desc').innerHTML = detailedContent;
    document.getElementById('hc-pa-result').classList.add('visible');
}

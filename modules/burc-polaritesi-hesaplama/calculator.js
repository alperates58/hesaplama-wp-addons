function hcBurcPolariteHesapla() {
    const sign = document.getElementById('hc-bp-sign').value;
    
    const polarities = {
        "koc": "Eril (Pozitif)",
        "ikizler": "Eril (Pozitif)",
        "aslan": "Eril (Pozitif)",
        "terazi": "Eril (Pozitif)",
        "yay": "Eril (Pozitif)",
        "kova": "Eril (Pozitif)",
        "boga": "Dişil (Negatif)",
        "yengec": "Dişil (Negatif)",
        "basak": "Dişil (Negatif)",
        "akrep": "Dişil (Negatif)",
        "oglak": "Dişil (Negatif)",
        "balik": "Dişil (Negatif)"
    };

    const polariteName = polarities[sign];
    let description = "";

    if (polariteName.includes("Eril")) {
        description = `
            <p><strong>Eril (Pozitif / Dışa Dönük) Polarite:</strong> Ateş ve Hava elementinden olan burçlar bu polariteye sahiptir. Bu, enerjinizin dış dünyaya doğru aktığını, etken ve başlatıcı bir yapıda olduğunuzu gösterir.</p>
            <p><strong>Karakteristik Özellikler:</strong> Siz hayatın öznesi olmayı seversiniz. Olaylara doğrudan müdahale eder, fikirlerinizi açıkça ifade eder ve sosyal etkileşimden beslenirsiniz. "Pozitif" ifadesi burada "iyi" anlamında değil, enerjinin yayılımı anlamındadır. Siz bir şeyi talep eden, harekete geçiren ve dünyayı değiştirmeye çalışan tarafsınızdır. Karar alma süreçleriniz genellikle hızlıdır ve dış faktörlerden ziyade kendi vizyonunuza odaklanırsınız.</p>
            <p><strong>2026 Projeksiyonu:</strong> 2026 yılında Jüpiter'in Aslan geçişi ve Satürn'ün Koç seyahati, Eril polaritedeki burçlar için muazzam bir 'sahneye çıkış' dönemi olacaktır. Kendi gücünüzü ve yaratıcılığınızı dünyaya göstermek için daha fazla fırsat bulacaksınız. Ancak enerjinizi dağıtmamaya ve başkalarının sınırlarına saygı duymaya özen göstermelisiniz.</p>
        `;
    } else {
        description = `
            <p><strong>Dişil (Negatif / İçe Dönük) Polarite:</strong> Toprak ve Su elementinden olan burçlar bu polariteye sahiptir. Bu, enerjinizin daha çok iç dünyaya, korumaya, beslemeye ve alıcı olmaya yönelik olduğunu gösterir.</p>
            <p><strong>Karakteristik Özellikler:</strong> Siz hayatın daha derin, sezgisel ve sağlam tarafını temsil edersiniz. Olayları gözlemler, sindirir ve en uygun zamanda harekete geçersiniz. "Negatif" ifadesi burada "kötü" anlamında değil, manyetik ve alıcı enerji anlamındadır. Siz bir şeyi bekleyen, onu büyüten, koruyan ve kalıcı kılan tarafsınızdır. Duygusal zekanız ve pratik uygulama yeteneğiniz çok yüksektir. Dış dünyadaki değişimlere uyum sağlamak yerine, kendi iç huzurunuzu korumaya odaklanırsınız.</p>
            <p><strong>2026 Projeksiyonu:</strong> 2026 yılındaki tutulmalar ve dış gezegen geçişleri, Dişil polaritedeki burçlar için 'içsel güçlenme' ve 'stratejik geri çekilme' dönemlerini tetikleyebilir. Sabrınızın meyvelerini toplayacağınız bir süreçtesiniz. Acele etmek yerine olayların olgunlaşmasını beklemek size en büyük kazancı getirecektir. Sezgilerinize her zamankinden daha fazla güvenin.</p>
        `;
    }

    document.getElementById('hc-bp-value').innerText = polariteName;
    document.getElementById('hc-bp-desc').innerHTML = description;
    document.getElementById('hc-bp-result').classList.add('visible');
}

function hcQuincunxHesapla() {
    const p1 = document.getElementById('hc-q-p1').value;
    const p2 = document.getElementById('hc-q-p2').value;

    const planetNames = {
        "gunes": "Güneş", "ay": "Ay", "merkur": "Merkür", "venus": "Venüs",
        "mars": "Mars", "jupiter": "Jüpiter", "saturn": "Satürn"
    };

    let detailedContent = `
        <p><strong>Quincunx (150°) Analizi:</strong> Haritanızda <strong>${planetNames[p1]}</strong> ve <strong>${planetNames[p2]}</strong> arasındaki bu açı, iki farklı enerjinin birbiriyle 'uzlaşamama' halini temsil eder.</p>
        <p><strong>Açının Etkisi:</strong> Quincunx, kare açı gibi açık bir çatışma değil, daha çok 'sürekli bir ayar yapma' ihtiyacıdır. Hayatınızda ${p1 === 'gunes' ? 'kimliğiniz' : 'duygularınız'} ile ${p2 === 'saturn' ? 'sorumluluklarınız' : 'eylemleriniz'} arasında sürekli bir denge kurmaya çalışıyor olabilirsiniz. Bu durum bazen 'anlaşılamama' veya 'yersizlik' hissi yaratabilir.</p>
        <p><strong>2026 Süreci:</strong> 2026 yılında dışsal gezegenlerin yapacağı tetiklemeler, bu 'ayarsızlık' hissini bir şifaya dönüştürebilir. Bu yıl, hayatınızdaki iki zıt kutbu (örn: iş ve özel hayat) birleştirmek yerine, her ikisinin de farklı ihtiyaçları olduğunu kabul ederek esneklik kazanacaksınız.</p>
        <p><strong>Tavsiye:</strong> Quincunx açısı, 'kabul' ile şifalanır. İki enerjiyi zorla birleştirmeye çalışmayın; sadece aralarındaki geçişi yumuşatacak yeni rutinler geliştirin.</p>
    `;

    document.getElementById('hc-q-desc').innerHTML = detailedContent;
    document.getElementById('hc-q-result').classList.add('visible');
}

function hcBiquintileHesapla() {
    const p1 = document.getElementById('hc-bq-p1').value;
    const p2 = document.getElementById('hc-bq-p2').value;

    const planetNames = {
        "gunes": "Güneş", "ay": "Ay", "merkur": "Merkür", "venus": "Venüs",
        "mars": "Mars", "jupiter": "Jüpiter", "saturn": "Satürn"
    };

    let detailedContent = `
        <p><strong>Biquintile (144°) Analizi:</strong> Haritanızda <strong>${planetNames[p1]}</strong> ve <strong>${planetNames[p2]}</strong> arasındaki bu açı, 'ustalık ve teknik beceri' gerektiren özel bir yeteneği temsil eder.</p>
        <p><strong>Açının Etkisi:</strong> 144 derecelik açı, Quintile (72°) açısının daha olgun ve teknik bir versiyonudur. Bu açı, size bir konuyu en ince detayına kadar öğrenme ve o konuda benzersiz bir yöntem geliştirme yeteneği verir. Genellikle bilim insanlarının, üst düzey teknisyenlerin ve özgün sanatçıların haritalarında görülür.</p>
        <p><strong>2026 Süreci:</strong> 2026 yılında uzmanlaştığınız alanda büyük bir takdir ve başarı kazanabilirsiniz. Bu yıl, üzerinde uzun süredir çalıştığınız o 'özel metodu' veya projeyi tamamlamak için harika bir enerji var. Teknik becerileriniz bu yıl sizin en büyük referansınız olacak.</p>
        <p><strong>Tavsiye:</strong> Detaylarda boğulmak yerine, o detayların yarattığı bütünü görmeye çalışın. Ustalığınızı paylaşmak, onu daha da güçlendirecektir.</p>
    `;

    document.getElementById('hc-bq-desc').innerHTML = detailedContent;
    document.getElementById('hc-bq-result').classList.add('visible');
}

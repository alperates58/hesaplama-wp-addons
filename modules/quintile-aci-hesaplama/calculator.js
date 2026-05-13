function hcQuintileHesapla() {
    const p1 = document.getElementById('hc-qn-p1').value;
    const p2 = document.getElementById('hc-qn-p2').value;

    const planetNames = {
        "gunes": "Güneş", "ay": "Ay", "merkur": "Merkür", "venus": "Venüs",
        "mars": "Mars", "jupiter": "Jüpiter", "saturn": "Satürn"
    };

    let detailedContent = `
        <p><strong>Quintile (72°) Analizi:</strong> Haritanızda <strong>${planetNames[p1]}</strong> ve <strong>${planetNames[p2]}</strong> arasındaki bu açı, 'Tanrı vergisi' bir yeteneği ve yaratıcılığı temsil eder.</p>
        <p><strong>Açının Etkisi:</strong> 72 derecelik açı, majör açılardan (üçgen, kare vb.) farklı olarak daha spiritüel ve zihinsel bir yaratıcılık verir. Bir konuyu kimsenin görmediği bir açıdan görme ve onu bir sanat eserine veya dahi bir çözüme dönüştürme gücüne sahipsiniz. Bu açı sizi sıradanlıktan ayıran o 'özel' dokunuşun kaynağıdır.</p>
        <p><strong>2026 Süreci:</strong> 2026 yılında yaratıcılığınızı sergilemek için muazzam bir ilham dalgasıyla karşılaşacaksınız. Bu yıl, hobilerinizi profesyonel bir işe dönüştürmek veya yeni bir sanatsal disiplin öğrenmek için en uygun zamandır. Zihninizdeki o parlak fikirleri artık dünyaya sunmanın vakti geldi.</p>
        <p><strong>Tavsiye:</strong> Yetenek, işlenmedikçe bir yüktür. Bu özel enerjiyi disiplinle birleştirin ve dünyaya benzersiz bir şeyler katın.</p>
    `;

    document.getElementById('hc-qn-desc').innerHTML = detailedContent;
    document.getElementById('hc-qn-result').classList.add('visible');
}

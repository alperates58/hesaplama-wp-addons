function hcFullAuditHesapla() {
    const questions = document.querySelectorAll('.hc-audit-q');
    let toplamPuan = 0;

    questions.forEach(q => {
        toplamPuan += parseInt(q.value);
    });

    document.getElementById('hc-audit-res-puan').innerText = toplamPuan;
    
    const yorumBox = document.getElementById('hc-audit-res-yorum');
    let baslik = '';
    let metin = '';
    let renk = '';
    let bg = '';

    if (toplamPuan <= 7) {
        baslik = 'Düşük Riskli Kullanım (Zon I)';
        metin = 'Alkol kullanımınız şu an için düşük riskli görünmektedir. Alkol kullanımı ile ilgili eğitim ve bilinçlenme yeterlidir.';
        renk = 'var(--hc-front-green)';
        bg = 'rgba(15, 138, 95, 0.1)';
    } else if (toplamPuan <= 15) {
        baslik = 'Riskli Kullanım (Zon II)';
        metin = 'Alkol kullanımınız riskli düzeydedir. Alkol miktarını azaltmanız ve sağlığınızı izlemeniz önerilir. Kısa süreli danışmanlık faydalı olabilir.';
        renk = 'var(--hc-front-gold)';
        bg = 'rgba(201, 137, 5, 0.1)';
    } else if (toplamPuan <= 19) {
        baslik = 'Zararlı Kullanım (Zon III)';
        metin = 'Alkol kullanımınız sağlığınıza zarar veriyor olabilir. Yüksek risk düzeyindesiniz. Bir uzmandan destek almanız şiddetle önerilir.';
        renk = 'var(--hc-front-red)';
        bg = 'rgba(192, 54, 44, 0.1)';
    } else {
        baslik = 'Muhtemel Bağımlılık (Zon IV)';
        metin = 'Alkol bağımlılığı açısından yüksek risk altındasınız. Acilen bir psikiyatri uzmanına veya AMATEM gibi kurumlara başvurarak detaylı değerlendirme ve tedavi planı yaptırmalısınız.';
        renk = 'var(--hc-front-red)';
        bg = 'rgba(192, 54, 44, 0.15)';
    }

    yorumBox.innerHTML = `<strong>${baslik}</strong><br>${metin}`;
    yorumBox.style.color = renk;
    yorumBox.style.background = bg;

    document.getElementById('hc-alkol-risk-testi-result').classList.add('visible');
    
    document.getElementById('hc-alkol-risk-testi-result').scrollIntoView({ behavior: 'smooth' });
}

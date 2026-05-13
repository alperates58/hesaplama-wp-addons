function hcBurcYasHesapla() {
    const birthdate = document.getElementById('hc-byas-birthdate').value;
    if (!birthdate) {
        alert('Lütfen doğum tarihinizi giriniz.');
        return;
    }

    const date = new Date(birthdate);
    const now = new Date('2026-05-13'); // 2026 güncelliği
    const ageInDays = (now - date) / (1000 * 60 * 60 * 24);
    const ageInYears = ageInDays / 365.25;

    if (ageInYears < 0) {
        alert('Doğum tarihiniz gelecekte olamaz!');
        return;
    }

    // Gezegen Döngüleri (Yıl bazında)
    const jupiterCycle = 11.86;
    const saturnCycle = 29.45;
    const uranusCycle = 84.01;

    const jupiterAge = ageInYears / jupiterCycle;
    const saturnAge = ageInYears / saturnCycle;

    let lifePhase = "";
    if (ageInYears < 29) {
        lifePhase = "Birinci Satürn Döngüsü (Öğrenme ve İnşa): Hayatı keşfettiğiniz, kimliğinizi oluşturduğunuz bir evredesiniz.";
    } else if (ageInYears < 58) {
        lifePhase = "İkinci Satürn Döngüsü (Uygulama ve Ustalık): Sorumlulukların arttığı, meyvelerin toplandığı ve toplumdaki yerinizin sağlamlaştığı bir evredesiniz.";
    } else {
        lifePhase = "Üçüncü Satürn Döngüsü (Bilgelik ve Aktarım): Deneyimlerinizi paylaştığınız, ruhsal derinliğin zirve yaptığı bir evredesiniz.";
    }

    let detailedDesc = `
        <p><strong>Jüpiter Yaşınız:</strong> ${jupiterAge.toFixed(2)} (Jüpiter her 12 yılda bir şans ve bolluk kapılarını aralar).</p>
        <p><strong>Satürn Yaşınız:</strong> ${saturnAge.toFixed(2)} (Satürn her 29 yılda bir hayat sınavlarını ve olgunlaşmayı getirir).</p>
        <p><strong>Hayat Evreniz:</strong> ${lifePhase}</p>
        <p><strong>Astrolojik Analiz:</strong> Gezegen yaşları, ruhunuzun olgunluk seviyesini gösterir. Dünya'da 30 yaşında olabilirsiniz ama Satürn döngüsüne göre henüz yeni bir 'yetişkin' sayılırsınız (1. döngü sonu). Jüpiter yaşınızın tam sayı olması (örn: 12, 24, 36...), hayatınızda büyük şansların ve genişleme fırsatlarının olduğu bir yıla girdiğinizi gösterir.</p>
        <p>2026 yılında bu döngülerden hangisine yakın olduğunuzu bilmek, karşılaştığınız olayların birer 'sınav' mı yoksa 'ödül' mü olduğunu anlamanıza yardımcı olur. Özellikle 2. Satürn döngüsünde olanlar için 2026 yılı, kariyerde zirve yapma yılıdır.</p>
    `;

    document.getElementById('hc-byas-value').innerText = saturnAge.toFixed(2) + " Döngü";
    document.getElementById('hc-byas-desc').innerHTML = detailedDesc;
    document.getElementById('hc-byas-result').classList.add('visible');
}

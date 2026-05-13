function hcVedikBurcHesapla() {
    const birthdate = document.getElementById('hc-vb-birthdate').value;
    if (!birthdate) {
        alert('Lütfen doğum tarihinizi giriniz.');
        return;
    }

    const date = new Date(birthdate);
    const year = date.getFullYear();
    const startOfAries = new Date(year, 2, 21);
    let diffDays = Math.floor((date - startOfAries) / (1000 * 60 * 60 * 24));
    if (diffDays < 0) diffDays += 365;

    let tropicalDegree = diffDays * (360/365);
    const ayanamsa = 22.5 + (year - 1900) * 0.0135;
    let siderealDegree = (tropicalDegree - ayanamsa + 360) % 360;

    const signs = ["Mesha (Koç)", "Vrishabha (Boğa)", "Mithuna (İkizler)", "Karka (Yengeç)", "Simha (Aslan)", "Kanya (Başak)", "Tula (Terazi)", "Vrishchika (Akrep)", "Dhanu (Yay)", "Makara (Oğlak)", "Kumbha (Kova)", "Meena (Balık)"];
    const vedikSign = signs[Math.floor(siderealDegree / 30)];

    let detailedDesc = `
        <p><strong>Vedik Astroloji (Jyotish) Nedir?</strong> Vedik sistem, binlerce yıllık Hint bilgeliğine dayanır. Bu sistemde 'Rasi' olarak bilinen burcunuz, ruhun bu dünyadaki somut görevlerini (Dharma) ve geçmişten getirdiği etkileri (Karma) gösterir.</p>
        <p><strong>Yıldızıl Farkındalık:</strong> Hesaplamanızda Lahiri Ayanamsa kullanılmıştır. Batı burcunuzun bir önceki burca kaymış olması Vedik sistemde çok doğaldır; çünkü bu sistem gökyüzündeki gerçek takımyıldız konumlarını esas alır.</p>
        <p><strong>Ruhsal Analiz:</strong> ${vedikSign} burcu olarak, ruhsal yolculuğunuzda sabır ve disiplin ön plandadır. Vedik sistemde her burç bir 'Purushartha' (yaşam amacı) ile ilişkilidir. Sizin burcunuzun enerjisi, hayatta hangi alanda en çok 'ışık' saçacağınızı belirler.</p>
        <p>2026 yılı Vedik takvimine göre (Shaka Samvat), ruhsal çalışmalarınızı yoğunlaştırmak ve kadim bilgileri hayatınıza entegre etmek için çok destekleyici bir yıldır. Kendi iç ışığınızı bulmak için sezgilerinizi takip edin.</p>
    `;

    document.getElementById('hc-vb-value').innerText = vedikSign;
    document.getElementById('hc-vb-desc').innerHTML = detailedDesc;
    document.getElementById('hc-vb-result').classList.add('visible');
}

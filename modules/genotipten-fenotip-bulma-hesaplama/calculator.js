function hcGenotipAnaliz() {
    const input = document.getElementById('hc-gen-input').value.trim();
    
    if (input.length % 2 !== 0 || input.length === 0) {
        alert('Lütfen geçerli bir genotip giriniz (her karakter çift olmalıdır, örn: AaBb).');
        return;
    }

    let n = 0; // Heterozigot sayısı
    let pheno = "";
    
    for (let i = 0; i < input.length; i += 2) {
        const g1 = input[i];
        const g2 = input[i+1];
        
        // Fenotip: Her zaman büyük harf baskın
        if (g1 === g1.toUpperCase() || g2 === g2.toUpperCase()) {
            pheno += g1.toUpperCase();
        } else {
            pheno += g1.toLowerCase();
        }
        
        // Heterozigotluk kontrolü
        if (g1 !== g2) {
            n++;
        }
    }

    const gameteCount = Math.pow(2, n);

    document.getElementById('hc-ga-pheno').innerText = pheno;
    document.getElementById('hc-ga-gamete').innerText = gameteCount.toLocaleString('tr-TR');
    document.getElementById('hc-ga-note').innerText = `${n} adet heterozigot karakter tespit edildi.`;
    document.getElementById('hc-gen-analysis-result').classList.add('visible');
}

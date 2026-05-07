function hcBACHesapla() {
    const cinsiyet = document.getElementById('hc-kao-cinsiyet').value;
    const kilo = parseFloat(document.getElementById('hc-kao-kilo').value);
    const miktar = parseFloat(document.getElementById('hc-kao-miktar').value);
    const sure = parseFloat(document.getElementById('hc-kao-sure').value) || 0;

    if (isNaN(kilo) || isNaN(miktar)) {
        alert('Lütfen ağırlık ve alkol miktarını giriniz.');
        return;
    }

    // Widmark Formula: BAC = (A / (W * r)) * 100
    // A: alcohol in grams
    // W: weight in grams (kg * 1000)
    // r: 0.68 for men, 0.55 for women
    const r = (cinsiyet === 'erkek') ? 0.68 : 0.55;
    
    let bac = (miktar / (kilo * r)) * 0.1; // result in percentage
    
    // Metabolic rate: ~0.015% per hour
    bac -= (sure * 0.015);
    
    if (bac < 0) bac = 0;

    // Convert to Promil (1% = 10 Promil)
    const promil = bac * 10;

    document.getElementById('hc-kao-res-promil').innerText = promil.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' Promil';
    
    const uyariBox = document.getElementById('hc-kao-res-uyari');
    if (promil === 0) {
        uyariBox.innerText = 'Alkol tespit edilmedi.';
        uyariBox.style.background = 'rgba(15, 138, 95, 0.1)';
        uyariBox.style.color = 'var(--hc-front-green)';
    } else if (promil < 0.5) {
        uyariBox.innerText = 'Yasal sınırın (0.50) altındasınız ancak dikkatli olun!';
        uyariBox.style.background = 'rgba(201, 137, 5, 0.1)';
        uyariBox.style.color = 'var(--hc-front-gold)';
    } else {
        uyariBox.innerText = 'YASAL SINIR AŞILDI! Kesinlikle araç kullanmayınız.';
        uyariBox.style.background = 'rgba(192, 54, 44, 0.1)';
        uyariBox.style.color = 'var(--hc-front-red)';
    }

    document.getElementById('hc-kandaki-alkol-orani-result').classList.add('visible');
}

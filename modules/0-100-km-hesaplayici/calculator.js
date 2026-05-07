function hc0100Hesapla() {
    const weight = parseFloat(document.getElementById('hc-weight').value);
    const hp = parseFloat(document.getElementById('hc-hp-val').value);
    const driveFactor = parseFloat(document.getElementById('hc-drivetrain').value);

    if (isNaN(weight) || isNaN(hp) || weight <= 0 || hp <= 0) {
        alert('Lütfen geçerli ağırlık ve güç değerleri giriniz.');
        return;
    }

    // Güç-Ağırlık Oranı (kg/hp)
    const ratio = weight / hp;

    // Tahmini Süre Formülü (Empirik bir model)
    // T = (Weight/HP) * DriveFactor * 0.8 (Katsayı ayarı)
    let time = ratio * driveFactor * 0.75;
    
    // Alt sınır kontrolü (Süper otomobiller için bile fiziksel sınırlar var)
    if (time < 2.0) time = 2.0 + (ratio * 0.1);

    document.getElementById('hc-res-time').innerText = time.toFixed(1);

    const rank = document.getElementById('hc-res-rank');
    if (time < 4.5) {
        rank.innerText = "🚀 Süper Spor Performansı";
        rank.style.color = "#ef4444";
    } else if (time < 7) {
        rank.innerText = "🔥 Yüksek Performans";
        rank.style.color = "#f97316";
    } else if (time < 10) {
        rank.innerText = "⚡ Standart Performans";
        rank.style.color = "#3b82f6";
    } else {
        rank.innerText = "🐢 Ekonomik Performans";
        rank.style.color = "#64748b";
    }

    document.getElementById('hc-0-100-result').classList.add('visible');
    document.getElementById('hc-0-100-result').scrollIntoView({ behavior: 'smooth', block: 'nearest' });
}

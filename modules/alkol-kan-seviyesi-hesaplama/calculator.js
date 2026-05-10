function hcBACHesapla() {
    const gender = document.getElementById('hc-ba-gender').value;
    const weight = parseFloat(document.getElementById('hc-ba-weight').value) * 1000; // grama çevir
    const amount = parseFloat(document.getElementById('hc-ba-amount').value);
    const pct = parseFloat(document.getElementById('hc-ba-pct').value) / 100;
    const hours = parseFloat(document.getElementById('hc-ba-time').value);

    if (!weight || !amount || isNaN(hours)) return;

    // Alkol Gram = Miktar * % * 0.8 (yoğunluk)
    const alcoholGrams = amount * pct * 0.8;
    
    // R (Widmark factor): Erkek 0.68, Kadın 0.55
    const r = (gender === 'male' ? 0.68 : 0.55);
    
    // BAC = (A / (W * r)) * 100
    let bac = (alcoholGrams / (weight * r)) * 100;
    
    // Azalma: Saatte 0.015 %
    bac = bac - (hours * 0.015);
    if (bac < 0) bac = 0;

    // Promil = BAC * 10
    const promil = bac * 10;

    document.getElementById('hc-ba-val').innerText = promil.toFixed(2) + ' Promil';
    
    let desc = "";
    if (promil >= 0.5) desc = "⚠️ Yasal limitin üzerinde! Araç kullanmayın.";
    else desc = "Yasal limitin altında olabilir (Lütfen dikkatli olun).";

    document.getElementById('hc-ba-desc').innerText = desc;
    document.getElementById('hc-ba-result').classList.add('visible');
}

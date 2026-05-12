function hcTursuOraniHesapla() {
    const water = parseFloat(document.getElementById('hc-pr-water').value);
    if (!water || water <= 0) return;

    // Standart oranlar (1 Litre su için)
    const saltG = water * 50; // 50g rock salt
    const vinegarMl = water * 200; // 200ml vinegar
    const lemonSaltG = water * 5; // 5g lemon salt (optional)

    const resList = document.getElementById('hc-pr-res-list');
    resList.innerHTML = `
        <div class="hc-result-item"><span>Gereken Kaya Tuzu:</span> <strong>${Math.round(saltG).toLocaleString('tr-TR')} g (~${(saltG/15).toFixed(1)} YK)</strong></div>
        <div class="hc-result-item"><span>Gereken Sirke:</span> <strong>${Math.round(vinegarMl).toLocaleString('tr-TR')} ml (~1 Su Bardağı)</strong></div>
        <div class="hc-result-item"><span>Limon Tuzu (Opsiyonel):</span> <strong>${Math.round(lemonSaltG).toLocaleString('tr-TR')} g</strong></div>
    `;

    document.getElementById('hc-pickle-ratio-result').classList.add('visible');
}

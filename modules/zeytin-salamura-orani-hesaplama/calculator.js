function hcZeytinOraniHesapla() {
    const water = parseFloat(document.getElementById('hc-ob-water').value);
    if (!water || water <= 0) return;

    // Standart oranlar (%8-10 tuzluluk)
    const saltG = water * 90; // 90g per liter
    const lemonSaltG = water * 5; // 5g per liter
    const vinegarMl = water * 20; // 20ml per liter

    const resList = document.getElementById('hc-ob-res-list');
    resList.innerHTML = `
        <div class="hc-result-item"><span>Gereken Kaya Tuzu:</span> <strong>${Math.round(saltG).toLocaleString('tr-TR')} g</strong></div>
        <div class="hc-result-item"><span>Limon Tuzu:</span> <strong>${Math.round(lemonSaltG).toLocaleString('tr-TR')} g</strong></div>
        <div class="hc-result-item"><span>Sirke (Opsiyonel):</span> <strong>${Math.round(vinegarMl).toLocaleString('tr-TR')} ml</strong></div>
    `;

    document.getElementById('hc-olive-brine-result').classList.add('visible');
}

function hcSporİçeceğiKarışımıHesapla() {
    const vol = parseFloat(document.getElementById('hc-drink-vol').value);
    const carbPercent = parseFloat(document.getElementById('hc-drink-intensity').value);

    if (!vol) return;

    // Karbonhidrat (Şeker/Bal/Meyve Suyu): vol * (percent / 100) gram
    const carbGrams = vol * (carbPercent / 100);
    // Tuz: 500ml için yaklaşık 0.5g - 0.7g (bir tutam)
    const saltGrams = (vol / 500) * 0.6;

    let recipe = `💧 <strong>Su:</strong> ${vol} ml<br>`;
    recipe += `🍯 <strong>Karbonhidrat (Bal/Şeker):</strong> ${carbGrams.toFixed(1)} gr<br>`;
    recipe += `🧂 <strong>Tuz (Sodyum):</strong> ${saltGrams.toFixed(1)} gr (Yaklaşık bir tutam)<br>`;
    recipe += `🍋 <strong>Limon Suyu:</strong> 1-2 yemek kaşığı (tatlandırmak için)`;

    document.getElementById('hc-drink-recipe').innerHTML = recipe;
    document.getElementById('hc-drink-result').classList.add('visible');
}

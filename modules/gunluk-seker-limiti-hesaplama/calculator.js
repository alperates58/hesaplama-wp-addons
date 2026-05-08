function hcSekerLimitiHesapla() {
    const tdee = parseFloat(document.getElementById('hc-sl-tdee').value);

    if (isNaN(tdee)) {
        alert('Lütfen günlük kalori ihtiyacınızı girin.');
        return;
    }

    // 1g sugar = 4 kcal
    const maxGrams = (tdee * 0.10) / 4;
    const idealGrams = (tdee * 0.05) / 4;

    document.getElementById('hc-sl-max').innerText = Math.round(maxGrams) + ' g';
    document.getElementById('hc-sl-ideal').innerText = Math.round(idealGrams) + ' g';

    const cubes = Math.round(maxGrams / 4);
    document.getElementById('hc-sl-cubes').innerText = `Yaklaşık ${cubes} adet küp şeker.`;

    document.getElementById('hc-sugar-limit-result').classList.add('visible');
}

function hcKotPantolonBedeniHesapla() {
    const waistCm = parseFloat(document.getElementById('hc-jeans-waist').value);
    const lengthCm = parseFloat(document.getElementById('hc-jeans-length').value);

    if (!waistCm || !lengthCm) return;

    // Kot bedenleri inç cinsindendir. 1 inç = 2.54 cm.
    // Genelde vücut ölçüsünden 1-2 inç çıkarılarak "denim size" bulunur (esneme payı).
    const W = Math.round((waistCm / 2.54) - 2);
    const L = Math.round(lengthCm / 2.54);

    document.getElementById('hc-jeans-val').innerText = `W${W} / L${L}`;
    document.getElementById('hc-jeans-result').classList.add('visible');
}

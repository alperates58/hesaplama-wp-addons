function hcÇerçeveÖlçüsüHesapla() {
    const w = parseFloat(document.getElementById('hc-fr-w').value);
    const h = parseFloat(document.getElementById('hc-fr-h').value);
    const mat = parseFloat(document.getElementById('hc-fr-mat').value) || 0;
    const border = parseFloat(document.getElementById('hc-fr-border').value) || 0;

    if (!w || !h) return;

    // Toplam Genişlik = FotoW + (2 * Paspartu) + (2 * ÇerçeveÇıtası)
    const totalW = w + (2 * mat) + (2 * border);
    const totalH = h + (2 * mat) + (2 * border);

    document.getElementById('hc-fr-val').innerText = `${totalW.toFixed(1)} x ${totalH.toFixed(1)} cm`;
    document.getElementById('hc-fr-result').classList.add('visible');
}

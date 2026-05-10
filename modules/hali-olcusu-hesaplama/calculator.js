function hcHalıÖlçüsüHesapla() {
    const w = parseFloat(document.getElementById('hc-rs-width').value);
    const l = parseFloat(document.getElementById('hc-rs-length').value);
    const factor = parseFloat(document.getElementById('hc-rs-style').value);

    if (!w || !l) return;

    // Genelde duvarlardan 45-60cm boşluk bırakılması istenir.
    // Stil faktörüne göre küçültüyoruz.
    const rugW = Math.round((w * Math.sqrt(factor)) / 10) * 10;
    const rugL = Math.round((l * Math.sqrt(factor)) / 10) * 10;

    document.getElementById('hc-rs-val').innerText = `${rugW} x ${rugL} cm`;
    document.getElementById('hc-rs-info').innerText = `Tahmini Alan: ${(rugW * rugL / 10000).toFixed(2)} m²`;
    document.getElementById('hc-rs-result').classList.add('visible');
}

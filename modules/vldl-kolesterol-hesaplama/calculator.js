function hcVLDLHesapla() {
    const tg = parseFloat(document.getElementById('hc-vldl-tg').value);
    if (!tg) return;

    // VLDL = TG / 5
    const vldl = tg / 5;

    document.getElementById('hc-vldl-val').innerText = Math.round(vldl) + ' mg/dL';
    document.getElementById('hc-vldl-result').classList.add('visible');
}

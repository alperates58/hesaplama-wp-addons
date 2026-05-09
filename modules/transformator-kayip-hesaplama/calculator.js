function hcTransformerLossHesapla() {
    const iron = parseFloat(document.getElementById('hc-tl-iron').value) || 0;
    const copper = parseFloat(document.getElementById('hc-tl-copper').value) || 0;
    const loadPerc = parseFloat(document.getElementById('hc-tl-load').value) || 100;

    const k = loadPerc / 100;
    const totalLoss = iron + (Math.pow(k, 2) * copper);

    document.getElementById('hc-res-tl-val').innerText = totalLoss.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' Watt';
    document.getElementById('hc-transformer-loss-result').classList.add('visible');
}

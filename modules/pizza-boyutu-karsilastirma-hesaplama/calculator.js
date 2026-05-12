function hcPizzaKarsilastir() {
    const d1 = parseFloat(document.getElementById('hc-pc-d1').value);
    const p1 = parseFloat(document.getElementById('hc-pc-p1').value);
    const d2 = parseFloat(document.getElementById('hc-pc-d2').value);
    const p2 = parseFloat(document.getElementById('hc-pc-p2').value);

    if (!d1 || !d2) return;

    const a1 = Math.PI * Math.pow(d1 / 2, 2);
    const a2 = Math.PI * Math.pow(d2 / 2, 2);

    const up1 = p1 / a1;
    const up2 = p2 / a2;

    const better = up1 < up2 ? 'Pizza A' : 'Pizza B';
    const percent = Math.abs((up1 - up2) / Math.max(up1, up2) * 100);

    const resText = document.getElementById('hc-pc-res-text');
    resText.innerHTML = `
        <div class="hc-result-item"><span>Alan A:</span> <strong>${Math.round(a1)} cm²</strong></div>
        <div class="hc-result-item"><span>Alan B:</span> <strong>${Math.round(a2)} cm²</strong></div>
        <div class="hc-result-item"><span>Avantaj:</span> <strong>${better} %${Math.round(percent)} daha ekonomik.</strong></div>
    `;

    document.getElementById('hc-pizza-comp-result').classList.add('visible');
}

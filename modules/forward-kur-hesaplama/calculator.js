function hcForwardKurHesapla() {
    const spot = parseFloat(document.getElementById('hc-fk-spot').value);
    const rd = parseFloat(document.getElementById('hc-fk-rd').value) / 100;
    const rf = parseFloat(document.getElementById('hc-fk-rf').value) / 100;
    const days = parseInt(document.getElementById('hc-fk-days').value);

    if (!spot || isNaN(rd) || isNaN(rf) || !days) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const t = days / 360;

    // Forward = Spot * (1 + rd * t) / (1 + rf * t)
    const forward = spot * (1 + rd * t) / (1 + rf * t);
    const points = forward - spot;

    document.getElementById('hc-fk-value').innerText = forward.toLocaleString('tr-TR', { minimumFractionDigits: 4, maximumFractionDigits: 4 });
    document.getElementById('hc-fk-points').innerText = points.toLocaleString('tr-TR', { minimumFractionDigits: 4, maximumFractionDigits: 4 });

    document.getElementById('hc-fk-result').classList.add('visible');
}

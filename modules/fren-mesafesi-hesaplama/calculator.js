function hcBrkHesapla() {
    const speedKmh = parseFloat(document.getElementById('hc-brk-speed').value);
    const f = parseFloat(document.getElementById('hc-brk-surface').value);

    if (isNaN(speedKmh)) {
        alert('Lütfen hızı girin.');
        return;
    }

    const v = speedKmh / 3.6; // m/s
    const brakingDist = Math.pow(v, 2) / (2 * 9.81 * f);
    const reactionDist = v * 1.0; // 1 second reaction
    const total = brakingDist + reactionDist;

    document.getElementById('hc-brk-dist').innerText = Math.round(brakingDist) + " m";
    document.getElementById('hc-brk-total').innerText = Math.round(total) + " m";

    document.getElementById('hc-brk-result').classList.add('visible');
}

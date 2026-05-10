function hcBisikletDişliOranıHesapla() {
    const front = parseFloat(document.getElementById('hc-gear-front').value);
    const rear = parseFloat(document.getElementById('hc-gear-rear').value);
    const circ = parseFloat(document.getElementById('hc-gear-tire').value);

    if (!front || !rear || !circ) return;

    const ratio = front / rear;
    const meters = (ratio * circ) / 1000;

    document.getElementById('hc-gear-val').innerText = ratio.toFixed(2);
    document.getElementById('hc-gear-meters').innerText = `Bir pedal devrinde gidilen mesafe: ${meters.toFixed(2)} metre`;
    document.getElementById('hc-gear-result').classList.add('visible');
}

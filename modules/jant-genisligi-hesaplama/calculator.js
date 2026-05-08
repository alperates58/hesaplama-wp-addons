function hcJgcHesapla() {
    const w = parseFloat(document.getElementById('hc-jgc-width').value);

    if (isNaN(w)) {
        alert('Lütfen lastik genişliğini girin.');
        return;
    }

    const ideal = (w / 25.4) * 0.85;
    
    // Snapping to 0.5 inches
    const snap = (v) => (Math.round(v * 2) / 2).toFixed(1);

    document.getElementById('hc-jgc-ideal').innerText = snap(ideal) + " J";
    document.getElementById('hc-jgc-min').innerText = snap(ideal - 1) + " J";
    document.getElementById('hc-jgc-max').innerText = snap(ideal + 1) + " J";

    document.getElementById('hc-jgc-result').classList.add('visible');
}

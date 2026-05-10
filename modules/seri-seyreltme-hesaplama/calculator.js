function hcSeriSeyreltmeHesapla() {
    const start = parseFloat(document.getElementById('hc-sd-start').value);
    const factor = parseFloat(document.getElementById('hc-sd-factor').value);
    const steps = parseInt(document.getElementById('hc-sd-steps').value);

    if (isNaN(start) || !factor || !steps) return;

    let output = "<strong>Seyreltme Adımları:</strong><br>";
    let current = start;

    for (let i = 1; i <= steps; i++) {
        current = current / factor;
        output += `Adım ${i}: <strong>${current.toExponential(3)}</strong><br>`;
    }

    document.getElementById('hc-sd-stats').innerHTML = output;
    document.getElementById('hc-sd-result').classList.add('visible');
}

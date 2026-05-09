function hcPcConvert(source) {
    const psi = parseFloat(document.getElementById('hc-pc-input-psi').value);

    if (isNaN(psi)) return;

    const bar = psi / 14.5038;
    const kpa = bar * 100;
    const kgcm = bar * 1.01972;

    document.getElementById('hc-pc-bar').innerText = bar.toFixed(2) + " bar";
    document.getElementById('hc-pc-kpa').innerText = Math.round(kpa) + " kPa";
    document.getElementById('hc-pc-kgcm').innerText = kgcm.toFixed(2) + " kg/cm²";
}

window.addEventListener('load', () => hcPcConvert('psi'));

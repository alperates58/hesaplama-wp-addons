function hcThreadCalcHesapla() {
    const val = document.getElementById('hc-tc-metric').value.split('|');
    const D = parseFloat(val[0]);
    const P = parseFloat(val[1]);

    // Drill size for metric threads = D - P
    const drill = D - P;
    // Core diameter approx = D - 1.22 * P
    const core = D - (1.22687 * P);

    document.getElementById('hc-tc-drill').innerText = drill.toFixed(2);
    document.getElementById('hc-tc-core').innerText = core.toFixed(2);

    document.getElementById('hc-thread-result').classList.add('visible');
}

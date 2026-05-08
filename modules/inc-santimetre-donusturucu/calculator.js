function hcInToCm() {
    const inc = parseFloat(document.getElementById('hc-incm-in').value);
    if (isNaN(inc)) return;
    document.getElementById('hc-incm-cm').value = (inc * 2.54).toFixed(2);
}

function hcCmToIn() {
    const cm = parseFloat(document.getElementById('hc-incm-cm').value);
    if (isNaN(cm)) return;
    document.getElementById('hc-incm-in').value = (cm / 2.54).toFixed(4);
}

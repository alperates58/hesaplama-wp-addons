function hcFcConvert() {
    const cc = parseFloat(document.getElementById('hc-fc-input').value);

    if (isNaN(cc)) return;

    const lbs = cc / 10.5;
    const gs = (cc * 0.75) / 60; // 0.75 specific gravity for petrol

    document.getElementById('hc-fc-lbs').innerText = lbs.toFixed(1) + " lbs/hr";
    document.getElementById('hc-fc-gs').innerText = gs.toFixed(3) + " g/s";
}

window.addEventListener('load', hcFcConvert);

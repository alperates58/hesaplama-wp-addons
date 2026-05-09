function hcTrqConvert(source) {
    const nm = parseFloat(document.getElementById('hc-trq-input-nm').value);

    if (isNaN(nm)) return;

    const lbft = nm * 0.73756;
    const kgm = nm * 0.10197;

    document.getElementById('hc-trq-lbft').innerText = lbft.toFixed(1) + " lb-ft";
    document.getElementById('hc-trq-kgm').innerText = kgm.toFixed(1) + " kg-m";
}

window.addEventListener('load', () => hcTrqConvert('nm'));

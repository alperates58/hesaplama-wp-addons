function hcEvc2Convert() {
    const cc = parseFloat(document.getElementById('hc-evc-input-cc').value);

    if (isNaN(cc)) return;

    const litre = cc / 1000;
    const ci = cc * 0.0610237;

    document.getElementById('hc-evc-l').innerText = litre.toFixed(1) + " L";
    document.getElementById('hc-evc-ci').innerText = ci.toFixed(1) + " ci";
}

window.addEventListener('load', hcEvc2Convert);

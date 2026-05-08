function hcKcalToKj() {
    const kcal = parseFloat(document.getElementById('hc-kckj-kcal').value);
    if (isNaN(kcal)) return;
    const kj = kcal * 4.184;
    document.getElementById('hc-kckj-kj').value = kj.toFixed(3);
}

function hcKjToKcal() {
    const kj = parseFloat(document.getElementById('hc-kckj-kj').value);
    if (isNaN(kj)) return;
    const kcal = kj / 4.184;
    document.getElementById('hc-kckj-kcal').value = kcal.toFixed(3);
}

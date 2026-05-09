function hcKwToHp() {
    const kw = parseFloat(document.getElementById('hc-kwhp-kw').value);
    if (isNaN(kw)) return;
    const hp = kw * 1.35962;
    document.getElementById('hc-kwhp-hp').value = hp.toFixed(2);
}

function hcHpToKw() {
    const hp = parseFloat(document.getElementById('hc-kwhp-hp').value);
    if (isNaN(hp)) return;
    const kw = hp / 1.35962;
    document.getElementById('hc-kwhp-kw').value = kw.toFixed(2);
}

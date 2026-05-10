function hcKütleHacimYüzdesiHesapla() {
    const mass = parseFloat(document.getElementById('hc-mv-mass').value);
    const vol = parseFloat(document.getElementById('hc-mv-vol').value);

    if (!mass || !vol) return;

    // % w/v = (g / mL) * 100
    const percent = (mass / vol) * 100;

    document.getElementById('hc-mv-val').innerText = '% ' + percent.toFixed(2);
    document.getElementById('hc-mv-result').classList.add('visible');
}

function hcYüzdeVerimHesapla() {
    const theoretical = parseFloat(document.getElementById('hc-py-theoretical').value);
    const actual = parseFloat(document.getElementById('hc-py-actual').value);

    if (!theoretical || isNaN(actual)) return;

    const yieldP = (actual / theoretical) * 100;

    document.getElementById('hc-py-val').innerText = '% ' + yieldP.toFixed(2);
    document.getElementById('hc-py-result').classList.add('visible');
}

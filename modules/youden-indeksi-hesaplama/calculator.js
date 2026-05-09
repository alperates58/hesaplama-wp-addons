function hcYoudenHesapla() {
    const sens = parseFloat(document.getElementById('hc-yi-sens').value) || 0;
    const spec = parseFloat(document.getElementById('hc-yi-spec').value) || 0;

    const j = sens + spec - 1;

    document.getElementById('hc-res-yi-val').innerText = j.toFixed(3);
    document.getElementById('hc-youden-result').classList.add('visible');
}

function hcRiceCookedHesapla() {
    const raw = parseFloat(document.getElementById('hc-rc-raw').value) || 0;
    if (raw <= 0) return;

    const cooked = raw * 3;

    document.getElementById('hc-res-rc-cooked').innerText = Math.round(cooked) + ' gr';
    document.getElementById('hc-rice-cooked-result').classList.add('visible');
}

function hcFlHesapla() {
    const cap = parseFloat(document.getElementById('hc-fl-cap').value);
    const level = parseFloat(document.getElementById('hc-fl-level').value);

    if (isNaN(cap)) {
        alert('Lütfen depo kapasitesini girin.');
        return;
    }

    const remaining = cap * level;

    document.getElementById('hc-fl-val').innerText = remaining.toFixed(1) + " Litre";
    document.getElementById('hc-fl-result').classList.add('visible');
}

function hcYdaHesapla() {
    const base = parseFloat(document.getElementById('hc-yda-oil-type').value);
    const multiplier = parseFloat(document.getElementById('hc-yda-usage').value);

    const result = Math.round(base * multiplier);

    document.getElementById('hc-yda-val').innerText = result.toLocaleString('tr-TR') + " km";
    document.getElementById('hc-yda-result').classList.add('visible');
}

function hcFirsatMaliyetiHesapla() {
    const chosen = parseFloat(document.getElementById('hc-fm-chosen').value) || 0;
    const foregone = parseFloat(document.getElementById('hc-fm-foregone').value) || 0;

    const opportunityCost = foregone - chosen;

    document.getElementById('hc-fm-value').innerText = opportunityCost.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-fm-result').classList.add('visible');
}

function hcSolunumKaynaklıCO2EmisyonuHesapla() {
    const persons = parseFloat(document.getElementById('hc-bc-persons').value);
    const factor = parseFloat(document.getElementById('hc-bc-activity').value);

    if (!persons) return;

    const dailyCo2 = persons * factor;

    document.getElementById('hc-bc-val').innerText = dailyCo2.toFixed(2) + ' kg CO₂';
    document.getElementById('hc-bc-result').classList.add('visible');
}

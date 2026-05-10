function hcSporProteinİhtiyacıHesapla() {
    const weight = parseFloat(document.getElementById('hc-prot-weight').value);
    const activity = parseFloat(document.getElementById('hc-prot-activity').value);

    if (!weight) return;

    const totalProtein = weight * activity;

    document.getElementById('hc-prot-val').innerText = Math.round(totalProtein) + ' gram/gün';
    
    let desc = `<strong>Dağılım Önerisi:</strong><br>`;
    const mealCount = 4;
    desc += `- Öğün başına: ${Math.round(totalProtein / mealCount)} gr protein (4 öğün üzerinden)<br>`;
    desc += `- Vücut ağırlığı başına: ${activity} gr/kg`;

    document.getElementById('hc-prot-desc').innerHTML = desc;
    document.getElementById('hc-prot-result').classList.add('visible');
}

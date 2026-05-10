function hcKarbonDengelemeİçinGerekliAğaçSayısıHesapla() {
    const co2 = parseFloat(document.getElementById('hc-tc-co2').value);
    const capacity = parseFloat(document.getElementById('hc-tc-type').value);

    if (!co2) return;

    const treeCount = Math.ceil(co2 / capacity);

    document.getElementById('hc-tc-val').innerText = treeCount + ' Adet';
    document.getElementById('hc-tc-result').classList.add('visible');
}

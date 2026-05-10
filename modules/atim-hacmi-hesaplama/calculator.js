function hcAtımHacmiHesapla() {
    const edv = parseFloat(document.getElementById('hc-sv-edv').value);
    const esv = parseFloat(document.getElementById('hc-sv-esv').value);

    if (isNaN(edv) || isNaN(esv)) return;

    // SV = EDV - ESV
    const sv = edv - esv;

    document.getElementById('hc-sv-val').innerText = sv + ' mL';
    document.getElementById('hc-sv-result').classList.add('visible');
}

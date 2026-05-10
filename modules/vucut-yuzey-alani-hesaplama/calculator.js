function hcBsaHesapla() {
    const height = parseFloat(document.getElementById('hc-bsa-height').value);
    const weight = parseFloat(document.getElementById('hc-bsa-weight').value);

    if (!height || !weight) return;

    // Mosteller Formula: BSA = sqrt((height * weight) / 3600)
    const bsa = Math.sqrt((height * weight) / 3600);

    document.getElementById('hc-bsa-res-val').innerText = bsa.toFixed(2).toLocaleString('tr-TR');
    document.getElementById('hc-bsa-result').classList.add('visible');
}

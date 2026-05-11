function hcCharlesHesapla() {
    const v1 = parseFloat(document.getElementById('hc-cy-v1').value);
    const t1c = parseFloat(document.getElementById('hc-cy-t1').value);
    const v2 = parseFloat(document.getElementById('hc-cy-v2').value);
    const t2c = parseFloat(document.getElementById('hc-cy-t2').value);

    let emptyCount = 0;
    if (isNaN(v1)) emptyCount++;
    if (isNaN(t1c)) emptyCount++;
    if (isNaN(v2)) emptyCount++;
    if (isNaN(t2c)) emptyCount++;

    if (emptyCount !== 1) {
        alert('Lütfen hesaplanacak bir alanı boş bırakın.');
        return;
    }

    const toK = (c) => c + 273.15;
    const toC = (k) => k - 273.15;

    let result = "";
    if (isNaN(v1)) {
        result = "V₁ = " + (v2 * toK(t1c) / toK(t2c)).toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + " L";
    } else if (isNaN(t1c)) {
        result = "T₁ = " + toC(v1 * toK(t2c) / v2).toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + " °C";
    } else if (isNaN(v2)) {
        result = "V₂ = " + (v1 * toK(t2c) / toK(t1c)).toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + " L";
    } else if (isNaN(t2c)) {
        result = "T₂ = " + toC(v2 * toK(t1c) / v1).toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + " °C";
    }

    document.getElementById('hc-cy-res-val').innerText = result;
    document.getElementById('hc-cy-result').classList.add('visible');
}

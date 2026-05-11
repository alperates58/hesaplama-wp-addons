function hcBoyleHesapla() {
    const p1 = parseFloat(document.getElementById('hc-by-p1').value);
    const v1 = parseFloat(document.getElementById('hc-by-v1').value);
    const p2 = parseFloat(document.getElementById('hc-by-p2').value);
    const v2 = parseFloat(document.getElementById('hc-by-v2').value);

    let emptyCount = 0;
    if (isNaN(p1)) emptyCount++;
    if (isNaN(v1)) emptyCount++;
    if (isNaN(p2)) emptyCount++;
    if (isNaN(v2)) emptyCount++;

    if (emptyCount !== 1) {
        alert('Lütfen hesaplanacak bir alan bırakın (diğer 3 alanı doldurun).');
        return;
    }

    let result = "";
    if (isNaN(p1)) {
        result = "P₁ = " + ((p2 * v2) / v1).toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + " bar";
    } else if (isNaN(v1)) {
        result = "V₁ = " + ((p2 * v2) / p1).toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + " L";
    } else if (isNaN(p2)) {
        result = "P₂ = " + ((p1 * v1) / v2).toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + " bar";
    } else if (isNaN(v2)) {
        result = "V₂ = " + ((p1 * v1) / p2).toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + " L";
    }

    document.getElementById('hc-by-res-val').innerText = result;
    document.getElementById('hc-by-result').classList.add('visible');
}

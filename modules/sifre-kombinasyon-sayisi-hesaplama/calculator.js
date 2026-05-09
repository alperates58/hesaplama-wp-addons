function hcPassCombHesapla() {
    const len = parseInt(document.getElementById('hc-pc-len').value) || 0;
    
    let setSize = 0;
    if (document.getElementById('hc-pc-num').checked) setSize += 10;
    if (document.getElementById('hc-pc-lower').checked) setSize += 26;
    if (document.getElementById('hc-pc-upper').checked) setSize += 26;
    if (document.getElementById('hc-pc-sym').checked) setSize += 32;

    if (setSize === 0 || len === 0) return;

    // We use BigInt for large numbers or scientific notation
    const result = Math.pow(setSize, len);

    document.getElementById('hc-res-pc-val').innerText = result > 1e15 ? result.toExponential(2) : result.toLocaleString('tr-TR');
    document.getElementById('hc-pass-comb-result').classList.add('visible');
}

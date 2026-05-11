function hcBobinEnerjisiHesapla() {
    const lRaw = parseFloat(document.getElementById('hc-be-l').value);
    const lUnit = parseFloat(document.getElementById('hc-be-l-unit').value);
    const I = parseFloat(document.getElementById('hc-be-i').value);

    if (isNaN(lRaw) || isNaN(I)) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    const L = lRaw * lUnit;
    // E = 0.5 * L * I^2
    const E = 0.5 * L * Math.pow(I, 2);

    document.getElementById('hc-be-res-j').innerText = E.toLocaleString('tr-TR', { maximumFractionDigits: 6 }) + ' Joule';
    document.getElementById('hc-be-res-mj').innerText = (E * 1000).toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' mJ';
    
    document.getElementById('hc-be-result').classList.add('visible');
}

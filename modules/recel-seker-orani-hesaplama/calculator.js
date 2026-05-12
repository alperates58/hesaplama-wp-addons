function hcRecelSekerHesapla() {
    const fruit = parseFloat(document.getElementById('hc-rs-fruit').value);
    const ratio = parseFloat(document.getElementById('hc-rs-type').value);

    if (!fruit || fruit <= 0) return;

    const sugar = fruit * ratio;

    const resultDiv = document.getElementById('hc-jam-sugar-result');
    document.getElementById('hc-rs-res-val').innerText = Math.round(sugar).toLocaleString('tr-TR') + ' g';
    
    resultDiv.classList.add('visible');
}

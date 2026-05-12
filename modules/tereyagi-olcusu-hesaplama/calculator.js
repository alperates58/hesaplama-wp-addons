function hcTereyagiOlcusuHesapla() {
    const spoon = parseFloat(document.getElementById('hc-bs-spoon').value);
    if (!spoon || spoon <= 0) return;

    const grams = spoon * 14;

    const resultDiv = document.getElementById('hc-butter-size-result');
    document.getElementById('hc-bs-res-val').innerText = grams.toLocaleString('tr-TR') + ' g';
    
    resultDiv.classList.add('visible');
}

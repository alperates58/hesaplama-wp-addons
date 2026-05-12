function hcMayaMiktariHesapla() {
    const flour = parseFloat(document.getElementById('hc-yq-flour').value);
    const ratio = parseFloat(document.getElementById('hc-yq-time').value);

    if (!flour || flour <= 0) {
        alert('Lütfen un miktarını giriniz.');
        return;
    }

    const instantYeast = flour * ratio;
    const freshYeast = instantYeast * 3; // Rule of thumb: fresh = 3x instant

    const resultDiv = document.getElementById('hc-yeast-quantity-result');
    document.getElementById('hc-yq-res-instant').innerText = instantYeast.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' g';
    document.getElementById('hc-yq-res-fresh').innerText = freshYeast.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' g';
    
    resultDiv.classList.add('visible');
}

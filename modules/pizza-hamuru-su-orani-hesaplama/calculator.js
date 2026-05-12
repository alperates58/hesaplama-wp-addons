function hcPizzaHidrasyonHesapla() {
    const flour = parseFloat(document.getElementById('hc-ph-flour').value);
    const ratio = parseFloat(document.getElementById('hc-ph-ratio').value);

    if (!flour || flour <= 0) {
        alert('Lütfen un miktarını giriniz.');
        return;
    }

    const water = flour * (ratio / 100);
    const salt = flour * 0.03; // Standard 3% salt

    const resultDiv = document.getElementById('hc-pizza-hydro-result');
    document.getElementById('hc-ph-res-water').innerText = Math.round(water).toLocaleString('tr-TR') + ' ml';
    document.getElementById('hc-ph-res-salt').innerText = Math.round(salt).toLocaleString('tr-TR') + ' g';
    
    resultDiv.classList.add('visible');
}

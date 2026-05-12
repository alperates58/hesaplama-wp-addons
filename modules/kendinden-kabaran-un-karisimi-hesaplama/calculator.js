function hcKabaranUnHesapla() {
    const flour = parseFloat(document.getElementById('hc-sr-flour').value);

    if (!flour || flour <= 0) {
        alert('Lütfen un miktarını giriniz.');
        return;
    }

    // 100g flour -> 6g baking powder, 1g salt
    const bp = (flour / 100) * 6;
    const salt = (flour / 100) * 1;

    const resultDiv = document.getElementById('hc-self-rising-result');
    document.getElementById('hc-sr-res-bp').innerText = bp.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' g';
    document.getElementById('hc-sr-res-salt').innerText = salt.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' g';
    
    resultDiv.classList.add('visible');
}

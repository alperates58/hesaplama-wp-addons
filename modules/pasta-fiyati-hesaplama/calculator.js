function hcPastaFiyatiHesapla() {
    const count = parseInt(document.getElementById('hc-cp-count').value);
    const baseCost = parseFloat(document.getElementById('hc-cp-base').value);
    const designFactor = parseFloat(document.getElementById('hc-cp-design').value);

    if (!count || count <= 0) {
        alert('Lütfen kişi sayısını giriniz.');
        return;
    }

    const totalPrice = (count * baseCost) * designFactor;

    const resultDiv = document.getElementById('hc-cake-pricing-result');
    document.getElementById('hc-cp-res-val').innerText = totalPrice.toLocaleString('tr-TR', { minimumFractionDigits: 0, maximumFractionDigits: 0 }) + ' ₺';
    
    resultDiv.classList.add('visible');
}

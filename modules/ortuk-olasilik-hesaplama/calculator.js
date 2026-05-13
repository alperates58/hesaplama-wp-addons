function hcOrtukOlasilikHesapla() {
    const odds = parseFloat(document.getElementById('hc-implied-odds').value);
    const resultDiv = document.getElementById('hc-ortuk-olasilik-hesaplama-result');

    if (isNaN(odds) || odds <= 1) {
        alert('Lütfen 1.00\'den büyük geçerli bir oran giriniz.');
        return;
    }

    const probability = (1 / odds) * 100;
    
    document.getElementById('hc-implied-res-value').innerText = `%${probability.toLocaleString('tr-TR', {maximumFractionDigits: 2})}`;
    document.getElementById('hc-implied-res-desc').innerText = `${odds} oranına göre bu olayın gerçekleşme olasılığı %${probability.toLocaleString('tr-TR', {maximumFractionDigits: 2})} olarak öngörülmektedir.`;

    resultDiv.classList.add('visible');
}

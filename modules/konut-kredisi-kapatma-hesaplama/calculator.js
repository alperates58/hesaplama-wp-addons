function hcKonutKredisiKapatmaHesapla() {
    const balance = parseFloat(document.getElementById('hc-kkk-balance').value);
    const term = parseInt(document.getElementById('hc-kkk-term').value);

    if (isNaN(balance) || isNaN(term)) {
        alert('Lütfen kalan borç ve vadeyi girin.');
        return;
    }

    // Erken Kapama Tazminatı
    // 36 aydan fazla ise %2, az ise %1
    const feeRate = term > 36 ? 0.02 : 0.01;
    const fee = balance * feeRate;
    const total = balance + fee;

    document.getElementById('hc-kkk-res-balance').innerText = balance.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-kkk-res-fee').innerText = fee.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺ (%' + (feeRate * 100) + ')';
    document.getElementById('hc-kkk-res-total').innerText = total.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-kkk-result').classList.add('visible');
}

function hcTereyagiDonustur() {
    const amount = parseFloat(document.getElementById('hc-bc-amount').value);
    const fromG = parseFloat(document.getElementById('hc-bc-from').value);

    if (!amount || amount <= 0) return;

    const totalG = amount * fromG;

    const resList = document.getElementById('hc-bc-res-list');
    resList.innerHTML = `
        <div class="hc-result-item"><span>Toplam Ağırlık:</span> <strong>${totalG.toLocaleString('tr-TR')} g</strong></div>
        <div class="hc-result-item"><span>Su Bardağı:</span> <strong>${(totalG / 225).toLocaleString('tr-TR', { maximumFractionDigits: 1 })} Adet</strong></div>
        <div class="hc-result-item"><span>Yemek Kaşığı:</span> <strong>${(totalG / 14).toLocaleString('tr-TR', { maximumFractionDigits: 1 })} YK</strong></div>
    `;

    document.getElementById('hc-butter-conv-result').classList.add('visible');
}

function hcSekerDonustur() {
    const amount = parseFloat(document.getElementById('hc-sc-amount').value);
    const fromG = parseFloat(document.getElementById('hc-sc-from').value);

    if (!amount || amount <= 0) return;

    const totalG = amount * fromG;

    const resList = document.getElementById('hc-sc-res-list');
    resList.innerHTML = `
        <div class="hc-result-item"><span>Toplam Ağırlık:</span> <strong>${totalG.toLocaleString('tr-TR')} g</strong></div>
        <div class="hc-result-item"><span>Su Bardağı:</span> <strong>${(totalG / 200).toLocaleString('tr-TR', { maximumFractionDigits: 1 })} Adet</strong></div>
        <div class="hc-result-item"><span>Yemek Kaşığı:</span> <strong>${(totalG / 15).toLocaleString('tr-TR', { maximumFractionDigits: 1 })} YK</strong></div>
    `;

    document.getElementById('hc-sugar-conv-result').classList.add('visible');
}

function hcUnDonustur() {
    const amount = parseFloat(document.getElementById('hc-fc-amount').value);
    const fromG = parseFloat(document.getElementById('hc-fc-from').value);

    if (!amount || amount <= 0) return;

    const totalG = amount * fromG;

    const resList = document.getElementById('hc-fc-res-list');
    resList.innerHTML = `
        <div class="hc-result-item"><span>Toplam Ağırlık:</span> <strong>${totalG.toLocaleString('tr-TR')} g</strong></div>
        <div class="hc-result-item"><span>Su Bardağı:</span> <strong>${(totalG / 130).toLocaleString('tr-TR', { maximumFractionDigits: 1 })} Adet</strong></div>
        <div class="hc-result-item"><span>Yemek Kaşığı:</span> <strong>${(totalG / 12).toLocaleString('tr-TR', { maximumFractionDigits: 1 })} YK</strong></div>
    `;

    document.getElementById('hc-flour-conv-result').classList.add('visible');
}

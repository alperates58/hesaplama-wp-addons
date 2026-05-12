function hcTuzDonustur() {
    const amount = parseFloat(document.getElementById('hc-sc-amount').value);
    const fromG = parseFloat(document.getElementById('hc-sc-from').value);

    if (!amount || amount <= 0) return;

    const totalG = amount * fromG;

    const resList = document.getElementById('hc-sc-res-list');
    resList.innerHTML = `
        <div class="hc-result-item"><span>Toplam Ağırlık:</span> <strong>${totalG.toLocaleString('tr-TR')} g</strong></div>
        <div class="hc-result-item"><span>Yemek Kaşığı:</span> <strong>${(totalG / 18).toLocaleString('tr-TR', { maximumFractionDigits: 1 })} YK</strong></div>
        <div class="hc-result-item"><span>Tatlı Kaşığı:</span> <strong>${(totalG / 6).toLocaleString('tr-TR', { maximumFractionDigits: 1 })} TK</strong></div>
    `;

    document.getElementById('hc-salt-conv-result').classList.add('visible');
}

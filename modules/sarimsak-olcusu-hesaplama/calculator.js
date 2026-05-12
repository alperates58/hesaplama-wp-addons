function hcSarimsakDonustur() {
    const amount = parseFloat(document.getElementById('hc-gs-amount').value);
    const fromG = parseFloat(document.getElementById('hc-gs-from').value);

    if (!amount || amount <= 0) return;

    const totalG = amount * fromG;

    const resList = document.getElementById('hc-gs-res-list');
    resList.innerHTML = `
        <div class="hc-result-item"><span>Toplam Ağırlık:</span> <strong>${totalG.toLocaleString('tr-TR')} g</strong></div>
        <div class="hc-result-item"><span>Yaklaşık Diş:</span> <strong>${(totalG / 4).toLocaleString('tr-TR', { maximumFractionDigits: 1 })} Adet</strong></div>
        <div class="hc-result-item"><span>Yemek Kaşığı:</span> <strong>${(totalG / 15).toLocaleString('tr-TR', { maximumFractionDigits: 1 })} YK</strong></div>
    `;

    document.getElementById('hc-garlic-size-result').classList.add('visible');
}

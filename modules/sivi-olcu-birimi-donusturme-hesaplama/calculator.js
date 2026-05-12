function hcSiviDonustur() {
    const amount = parseFloat(document.getElementById('hc-lc-amount').value);
    const fromMl = parseFloat(document.getElementById('hc-lc-from').value);

    if (!amount || amount <= 0) return;

    const totalMl = amount * fromMl;

    const resList = document.getElementById('hc-lc-res-list');
    resList.innerHTML = `
        <div class="hc-result-item"><span>Mililitre:</span> <strong>${totalMl.toLocaleString('tr-TR')} ml</strong></div>
        <div class="hc-result-item"><span>Litre:</span> <strong>${(totalMl / 1000).toLocaleString('tr-TR', { maximumFractionDigits: 3 })} L</strong></div>
        <div class="hc-result-item"><span>Su Bardağı:</span> <strong>${(totalMl / 200).toLocaleString('tr-TR', { maximumFractionDigits: 2 })} Adet</strong></div>
        <div class="hc-result-item"><span>Sıvı Ons (oz):</span> <strong>${(totalMl / 29.57).toLocaleString('tr-TR', { maximumFractionDigits: 1 })} oz</strong></div>
    `;

    document.getElementById('hc-liquid-conv-result').classList.add('visible');
}

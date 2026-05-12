function hcMutfakOlcuDonustur() {
    const amount = parseFloat(document.getElementById('hc-ku-amount').value);
    const fromMl = parseFloat(document.getElementById('hc-ku-from').value);

    if (!amount || amount <= 0) {
        alert('Lütfen miktar giriniz.');
        return;
    }

    const totalMl = amount * fromMl;

    const resList = document.getElementById('hc-ku-res-list');
    resList.innerHTML = `
        <div class="hc-result-item"><span>Mililitre:</span> <strong>${totalMl.toLocaleString('tr-TR')} ml</strong></div>
        <div class="hc-result-item"><span>Su Bardağı:</span> <strong>${(totalMl / 200).toLocaleString('tr-TR', { maximumFractionDigits: 2 })} Adet</strong></div>
        <div class="hc-result-item"><span>Yemek Kaşığı:</span> <strong>${(totalMl / 15).toLocaleString('tr-TR', { maximumFractionDigits: 1 })} Adet</strong></div>
        <div class="hc-result-item"><span>Çay Kaşığı:</span> <strong>${(totalMl / 5).toLocaleString('tr-TR', { maximumFractionDigits: 1 })} Adet</strong></div>
    `;

    document.getElementById('hc-kitchen-units-result').classList.add('visible');
}

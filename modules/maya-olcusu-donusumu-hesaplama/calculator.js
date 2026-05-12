function hcMayaDonustur() {
    const amount = parseFloat(document.getElementById('hc-yc-amount').value);
    const fromType = document.getElementById('hc-yc-from').value;

    if (!amount || amount <= 0) {
        alert('Lütfen miktar giriniz.');
        return;
    }

    // Normalized to Instant yeast
    let instant;
    if (fromType === 'instant') {
        instant = amount;
    } else if (fromType === 'active') {
        instant = amount / 1.25;
    } else {
        instant = amount / 3;
    }

    const active = instant * 1.25;
    const fresh = instant * 3;

    const resList = document.getElementById('hc-yc-res-list');
    resList.innerHTML = `
        <div class="hc-result-item"><span>Instant Maya:</span> <strong>${instant.toLocaleString('tr-TR', { maximumFractionDigits: 1 })} g</strong></div>
        <div class="hc-result-item"><span>Kuru Maya:</span> <strong>${active.toLocaleString('tr-TR', { maximumFractionDigits: 1 })} g</strong></div>
        <div class="hc-result-item"><span>Yaş Maya:</span> <strong>${fresh.toLocaleString('tr-TR', { maximumFractionDigits: 1 })} g</strong></div>
    `;

    document.getElementById('hc-yeast-conv-result').classList.add('visible');
}

function hcRamadanSuHesapla() {
    const weight = parseFloat(document.getElementById('hc-rw-weight').value);

    if (isNaN(weight)) {
        alert('Lütfen kilonuzu girin.');
        return;
    }

    // Standard water need: 35ml per kg
    const totalMl = weight * 35;
    const totalL = totalMl / 1000;

    document.getElementById('hc-rw-total').innerText = totalL.toFixed(1).toLocaleString('tr-TR') + ' Litre';

    const planContainer = document.getElementById('hc-rw-plan');
    planContainer.innerHTML = '';

    const steps = [
        { label: 'İftar Açılışı (2 Bardak)', amount: 400 },
        { label: 'İftar Sonrası - Yatışa Kadar (Her saat 1 bardak)', amount: totalMl * 0.5 },
        { label: 'Sahur Öncesi ve Esnası (2-3 Bardak)', amount: 600 }
    ];

    steps.forEach(step => {
        const div = document.createElement('div');
        div.style.display = 'flex';
        div.style.justifyContent = 'space-between';
        div.style.padding = '8px 0';
        div.style.borderBottom = '1px solid #eee';
        div.innerHTML = `<span>${step.label}</span> <strong>~${Math.round(step.amount)} ml</strong>`;
        planContainer.appendChild(div);
    });

    document.getElementById('hc-ramadan-water-result').classList.add('visible');
}

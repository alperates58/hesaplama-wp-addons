function hcMTV_Hesapla() {
    const type = document.getElementById('hc-mt-type').value;
    const age = parseInt(document.getElementById('hc-mt-age').value);
    const engine = parseInt(document.getElementById('hc-mt-engine').value);

    let base = 5000; // Placeholder for 1300cc, 1-3y

    // Very simplified logic based on relative TR scales
    if (engine === 1600) base = 8000;
    if (engine === 1800) base = 15000;
    if (engine === 2000) base = 25000;
    if (engine === 2500) base = 40000;
    if (engine === 9999) base = 150000;

    let multiplier = 1;
    if (age >= 4) multiplier = 0.7;
    if (age >= 7) multiplier = 0.4;
    if (age >= 12) multiplier = 0.25;
    if (age >= 16) multiplier = 0.1;

    const total = base * multiplier;
    const installment = total / 2;

    document.getElementById('hc-mt-res-t1').innerText = installment.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-mt-res-t2').innerText = installment.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-mt-res-total').innerText = total.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-mtv-result').classList.add('visible');
}

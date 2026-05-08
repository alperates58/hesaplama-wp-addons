function hcEmlakVergisiHesapla() {
    const value = parseFloat(document.getElementById('hc-ev-value').value) || 0;
    const baseRate = parseFloat(document.getElementById('hc-ev-type').value);
    const cityMultiplier = parseFloat(document.getElementById('hc-ev-city').value);

    const total = value * baseRate * cityMultiplier;
    const installment = total / 2;

    document.getElementById('hc-ev-res-t1').innerText = installment.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-ev-res-t2').innerText = installment.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-ev-res-total').innerText = total.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-emlak-result').classList.add('visible');
}

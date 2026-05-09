function hcSolarMaliyetHesapla() {
    const power = parseFloat(document.getElementById('hc-sc-power').value);
    const unitCost = parseFloat(document.getElementById('hc-sc-type').value);
    const rate = parseFloat(document.getElementById('hc-sc-rate').value);

    if (isNaN(power) || isNaN(rate)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const totalUsd = power * unitCost;
    const totalTry = totalUsd * rate;

    document.getElementById('hc-res-sc-usd').innerText = '$' + totalUsd.toLocaleString('en-US', { maximumFractionDigits: 0 });
    document.getElementById('hc-res-sc-try').innerText = totalTry.toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + ' ₺';

    document.getElementById('hc-sc-result').classList.add('visible');
}

function hcAraçKiralamaMaliyetiHesapla() {
    const daily = parseFloat(document.getElementById('hc-cr-daily').value);
    const days = parseFloat(document.getElementById('hc-cr-days').value);
    const fuel = parseFloat(document.getElementById('hc-cr-fuel').value) || 0;
    const extra = parseFloat(document.getElementById('hc-cr-extra').value) || 0;

    if (!daily || !days) return;

    const total = (daily * days) + fuel + extra;

    document.getElementById('hc-cr-val').innerText = total.toLocaleString('tr-TR', { style: 'currency', currency: 'TRY' });
    document.getElementById('hc-cr-result').classList.add('visible');
}

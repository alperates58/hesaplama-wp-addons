function hcAylıkMarketBütçesiHesapla() {
    const persons = parseFloat(document.getElementById('hc-mb-persons').value);
    const perPerson = parseFloat(document.getElementById('hc-mb-style').value);

    if (!persons) return;

    const total = persons * perPerson;

    document.getElementById('hc-mb-val').innerText = total.toLocaleString('tr-TR', { style: 'currency', currency: 'TRY' });
    document.getElementById('hc-mb-result').classList.add('visible');
}

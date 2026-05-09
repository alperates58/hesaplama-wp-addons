function hcFirmaDegeriHesapla() {
    const mcap = parseFloat(document.getElementById('hc-fd-mcap').value) || 0;
    const debt = parseFloat(document.getElementById('hc-fd-debt').value) || 0;
    const cash = parseFloat(document.getElementById('hc-fd-cash').value) || 0;

    const netDebt = debt - cash;
    const ev = mcap + netDebt;

    document.getElementById('hc-fd-res-netdebt').innerText = netDebt.toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-fd-res-ev').innerText = ev.toLocaleString('tr-TR') + ' ₺';

    document.getElementById('hc-firma-degeri-result').classList.add('visible');
}

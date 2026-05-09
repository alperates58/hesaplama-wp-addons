function hcProdCapacityHesapla() {
    const hours = parseFloat(document.getElementById('hc-pcap-time').value) || 0;
    const cycleMin = parseFloat(document.getElementById('hc-pcap-cycle').value) || 1;
    const eff = parseFloat(document.getElementById('hc-pcap-eff').value) || 100;

    const totalMin = hours * 60;
    const capacity = (totalMin / cycleMin) * (eff / 100);

    document.getElementById('hc-res-pcap-val').innerText = Math.floor(capacity).toLocaleString('tr-TR') + ' Adet';
    document.getElementById('hc-prod-capacity-result').classList.add('visible');
}

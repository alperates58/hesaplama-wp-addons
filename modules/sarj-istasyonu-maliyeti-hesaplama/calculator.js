function hcSimHesapla() {
    const device = parseFloat(document.getElementById('hc-sim-device').value);
    const cable = parseFloat(document.getElementById('hc-sim-cable').value);
    const labor = parseFloat(document.getElementById('hc-sim-labor').value);

    const cableCost = cable * 250; // 250 TL per meter
    const total = device + cableCost + labor;

    document.getElementById('hc-sim-val').innerText = total.toLocaleString('tr-TR') + " ₺";
    document.getElementById('hc-sim-result').classList.add('visible');
}

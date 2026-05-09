function hcUPSCapacityHesapla() {
    const watts = parseFloat(document.getElementById('hc-ups-watts').value) || 0;
    const pf = parseFloat(document.getElementById('hc-ups-pf').value) || 0.8;
    const margin = parseFloat(document.getElementById('hc-ups-margin').value) || 0;

    if (pf <= 0) return;

    const va = (watts / pf) * (1 + margin / 100);

    document.getElementById('hc-res-ups-va').innerText = Math.ceil(va).toLocaleString('tr-TR') + ' VA';
    document.getElementById('hc-ups-capacity-result').classList.add('visible');
}

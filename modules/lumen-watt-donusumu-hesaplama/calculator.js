function hcLumenWattHesapla() {
    const lumen = parseFloat(document.getElementById('hc-lw-lumen').value) || 0;

    if (lumen <= 0) return;

    // Ortalama verimlilik değerleri (Lümen/Watt)
    const led = lumen / 90;
    const cfl = lumen / 60;
    const hal = lumen / 20;
    const inc = lumen / 14;

    document.getElementById('hc-res-lw-led').innerText = Math.round(led) + ' W';
    document.getElementById('hc-res-lw-cfl').innerText = Math.round(cfl) + ' W';
    document.getElementById('hc-res-lw-hal').innerText = Math.round(hal) + ' W';
    document.getElementById('hc-res-lw-inc').innerText = Math.round(inc) + ' W';
    
    document.getElementById('hc-lumen-watt-result').classList.add('visible');
}

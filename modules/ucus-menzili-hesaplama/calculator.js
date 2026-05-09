function hcFlightRangeHesapla() {
    const fuel = parseFloat(document.getElementById('hc-fr-fuel').value) || 0;
    const cons = parseFloat(document.getElementById('hc-fr-cons').value) || 1;
    const speed = parseFloat(document.getElementById('hc-fr-speed').value) || 0;

    const duration = fuel / cons;
    const range = duration * speed;

    document.getElementById('hc-res-fr-val').innerText = Math.round(range).toLocaleString('tr-TR') + ' km';
    document.getElementById('hc-res-fr-time').innerText = duration.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' saat';
    
    document.getElementById('hc-flight-range-result').classList.add('visible');
}

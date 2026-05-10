function hcElektrikliCihazWattHesapla() {
    const volt = parseFloat(document.getElementById('hc-dw-volt').value);
    const amp = parseFloat(document.getElementById('hc-dw-amp').value);

    if (!volt || !amp) return;

    const watt = volt * amp;

    document.getElementById('hc-dw-val').innerText = watt.toLocaleString('tr-TR') + ' Watt';
    document.getElementById('hc-dw-result').classList.add('visible');
}

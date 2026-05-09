function hcRocketThrustHesapla() {
    const mdot = parseFloat(document.getElementById('hc-rt-mdot').value) || 0;
    const ve = parseFloat(document.getElementById('hc-rt-ve').value) || 0;
    const pe = (parseFloat(document.getElementById('hc-rt-pe').value) || 0) * 1000; // kPa to Pa
    const pa = (parseFloat(document.getElementById('hc-rt-pa').value) || 0) * 1000;
    const ae = parseFloat(document.getElementById('hc-rt-ae').value) || 0;

    // F = mdot * ve + (pe - pa) * ae
    const thrust = (mdot * ve) + (pe - pa) * ae;

    document.getElementById('hc-res-rt-val').innerText = Math.round(thrust).toLocaleString('tr-TR') + ' Newton';
    document.getElementById('hc-rocket-thrust-result').classList.add('visible');
}

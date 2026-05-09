function hcSynapticDelayHesapla() {
    const totalMs = parseFloat(document.getElementById('hc-sd-total').value) || 0;
    const dist = parseFloat(document.getElementById('hc-sd-dist').value) || 0;
    const vel = parseFloat(document.getElementById('hc-sd-vel').value) || 1;

    const conductionMs = (dist / vel) * 1000;
    const delay = totalMs - conductionMs;

    document.getElementById('hc-res-sd-val').innerText = (delay > 0 ? delay.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) : 0) + ' ms';
    document.getElementById('hc-synaptic-delay-result').classList.add('visible');
}

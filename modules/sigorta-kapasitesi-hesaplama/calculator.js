function hcFuseCapacityHesapla() {
    const p = parseFloat(document.getElementById('hc-fc-p').value) || 0;
    const v = parseFloat(document.getElementById('hc-fc-v').value) || 230;
    const sf = parseFloat(document.getElementById('hc-fc-sf').value) || 1.25;

    if (v <= 0) return;

    const current = (p / v) * sf;

    document.getElementById('hc-res-fc-val').innerText = current.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' Amper';
    document.getElementById('hc-fuse-capacity-result').classList.add('visible');
}

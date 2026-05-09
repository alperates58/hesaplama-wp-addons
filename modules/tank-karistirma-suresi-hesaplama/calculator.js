function hcTankMixingHesapla() {
    const vol = parseFloat(document.getElementById('hc-tm-vol').value) || 0;
    const flow = parseFloat(document.getElementById('hc-tm-flow').value) || 1;
    const turn = parseFloat(document.getElementById('hc-tm-turn').value) || 3;

    const time = (vol / flow) * turn;

    document.getElementById('hc-res-tm-val').innerText = time.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' dakika';
    document.getElementById('hc-tank-mixing-result').classList.add('visible');
}

function hcDotProductHesapla() {
    const ax = parseFloat(document.getElementById('hc-d-ax').value) || 0;
    const ay = parseFloat(document.getElementById('hc-d-ay').value) || 0;
    const az = parseFloat(document.getElementById('hc-d-az').value) || 0;
    const bx = parseFloat(document.getElementById('hc-d-bx').value) || 0;
    const by = parseFloat(document.getElementById('hc-d-by').value) || 0;
    const bz = parseFloat(document.getElementById('hc-d-bz').value) || 0;

    const result = (ax * bx) + (ay * by) + (az * bz);

    document.getElementById('hc-d-res-val').innerText = result.toLocaleString('tr-TR');
    document.getElementById('hc-skaler-carpim-result').classList.add('visible');
}

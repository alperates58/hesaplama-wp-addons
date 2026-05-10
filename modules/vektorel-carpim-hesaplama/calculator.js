function hcCrossProductHesapla() {
    const ax = parseFloat(document.getElementById('hc-vc-ax').value) || 0;
    const ay = parseFloat(document.getElementById('hc-vc-ay').value) || 0;
    const az = parseFloat(document.getElementById('hc-vc-az').value) || 0;
    const bx = parseFloat(document.getElementById('hc-vc-bx').value) || 0;
    const by = parseFloat(document.getElementById('hc-vc-by').value) || 0;
    const bz = parseFloat(document.getElementById('hc-vc-bz').value) || 0;

    // Cx = AyBz - AzBy
    // Cy = AzBx - AxBz
    // Cz = AxBy - AyBx
    const cx = (ay * bz) - (az * by);
    const cy = (az * bx) - (ax * bz);
    const cz = (ax * by) - (ay * bx);

    document.getElementById('hc-vc-res-val').innerText = `C = (${cx}, ${cy}, ${cz})`;
    document.getElementById('hc-vektorel-carpim-result').classList.add('visible');
}

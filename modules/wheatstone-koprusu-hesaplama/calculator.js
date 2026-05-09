function hcWheatstoneHesapla() {
    const r1 = parseFloat(document.getElementById('hc-wb-r1').value) || 1;
    const r2 = parseFloat(document.getElementById('hc-wb-r2').value) || 0;
    const r3 = parseFloat(document.getElementById('hc-wb-r3').value) || 0;

    const rx = (r2 / r1) * r3;

    document.getElementById('hc-res-wb-val').innerText = rx.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' Ω';
    document.getElementById('hc-wheatstone-result').classList.add('visible');
}

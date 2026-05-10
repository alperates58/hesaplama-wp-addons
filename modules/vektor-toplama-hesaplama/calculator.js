function hcVecAddHesapla() {
    const ax = parseFloat(document.getElementById('hc-va-ax').value) || 0;
    const ay = parseFloat(document.getElementById('hc-va-ay').value) || 0;
    const bx = parseFloat(document.getElementById('hc-va-bx').value) || 0;
    const by = parseFloat(document.getElementById('hc-va-by').value) || 0;

    const rx = ax + bx;
    const ry = ay + by;
    const mag = Math.sqrt(rx*rx + ry*ry);

    document.getElementById('hc-va-res-val').innerText = `R = (${rx}, ${ry})`;
    document.getElementById('hc-va-mag').innerText = `Bileşke Büyüklüğü: ${mag.toLocaleString('tr-TR', { maximumFractionDigits: 4 })}`;
    document.getElementById('hc-vektor-toplama-result').classList.add('visible');
}

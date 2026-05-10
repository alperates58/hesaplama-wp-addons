function hcpKaHesapla() {
    const kaStr = document.getElementById('hc-pk-ka').value;
    if (!kaStr) return;

    const ka = parseFloat(kaStr);
    const pka = -Math.log10(ka);

    document.getElementById('hc-pk-val').innerText = pka.toFixed(3);
    document.getElementById('hc-pk-result').classList.add('visible');
}

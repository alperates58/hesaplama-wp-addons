function hcStarterRatioHesapla() {
    const flour = parseFloat(document.getElementById('hc-sr-flour').value) || 0;
    const percent = parseFloat(document.getElementById('hc-sr-percent').value) || 0;

    if (flour <= 0) return;

    const maya = flour * (percent / 100);

    document.getElementById('hc-res-sr-maya').innerText = Math.round(maya) + ' gr';
    document.getElementById('hc-starter-ratio-result').classList.add('visible');
}

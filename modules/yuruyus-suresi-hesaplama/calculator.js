function hcYuruyusSüresiHesapla() {
    const dist = parseFloat(document.getElementById('hc-wt-dist').value);
    const speed = parseFloat(document.getElementById('hc-wt-speed').value);

    if (isNaN(dist)) {
        alert('Lütfen mesafeyi girin.');
        return;
    }

    const hours = dist / speed;
    const totalMinutes = Math.round(hours * 60);
    const h = Math.floor(totalMinutes / 60);
    const m = totalMinutes % 60;

    let resultText = "";
    if (h > 0) resultText += h + " saat ";
    resultText += m + " dakika";

    document.getElementById('hc-wt-value').innerText = resultText;
    document.getElementById('hc-walk-time-result').classList.add('visible');
}

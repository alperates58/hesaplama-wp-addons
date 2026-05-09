function hcHaftaHesapla() {
    const days = parseFloat(document.getElementById('hc-h-days').value) || 0;
    const weeks = days / 7;
    const w = Math.floor(weeks);
    const d = days % 7;

    let res = w + " Hafta";
    if (d > 0) res += " " + d + " Gün";

    document.getElementById('hc-h-val').innerText = res;
    document.getElementById('hc-h-result').classList.add('visible');
}

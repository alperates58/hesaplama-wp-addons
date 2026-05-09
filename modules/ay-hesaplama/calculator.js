function hcAyHesapla() {
    const days = parseFloat(document.getElementById('hc-a-days').value) || 0;
    
    // Average month length 30.44 days
    const months = days / 30.44;
    const m = Math.floor(months);
    const d = Math.round((months - m) * 30.44);

    let res = m + " Ay";
    if (d > 0) res += " " + d + " Gün";

    document.getElementById('hc-a-val').innerText = res;
    document.getElementById('hc-a-result').classList.add('visible');
}

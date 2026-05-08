function hcYilHesapla() {
    const days = parseFloat(document.getElementById('hc-y-days').value) || 0;
    
    const years = days / 365.25;
    const y = Math.floor(years);
    const remainingDays = Math.round((years - y) * 365.25);
    
    const m = Math.floor(remainingDays / 30.44);
    const d = Math.round(remainingDays % 30.44);

    let res = y + " Yıl";
    if (m > 0) res += " " + m + " Ay";
    if (d > 0) res += " " + d + " Gün";

    document.getElementById('hc-y-val').innerText = res;
    document.getElementById('hc-y-result').classList.add('visible');
}

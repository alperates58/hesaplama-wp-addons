function hcAyTakvimiHesapla() {
    const now = new Date();
    const month = now.getMonth();
    const year = now.getFullYear();
    const firstDay = new Date(year, month, 1);
    const lastDay = new Date(year, month + 1, 0);
    
    const lp = 2551443;
    const new_moon_ref = 592500;

    const monthNames = ["Ocak", "Şubat", "Mart", "Nisan", "Mayıs", "Haziran", "Temmuz", "Ağustos", "Eylül", "Ekim", "Kasım", "Aralık"];
    document.getElementById('hc-cal-title').innerText = monthNames[month] + " " + year + " Ay Takvimi";

    let html = "<div class='hc-cal-grid'>";
    for (let d = 1; d <= lastDay.getDate(); d++) {
        const date = new Date(year, month, d);
        const ts = Math.floor(date.getTime() / 1000);
        let phase = ((ts - new_moon_ref) % lp) / lp;
        if (phase < 0) phase += 1;

        let icon = "";
        if (phase < 0.03 || phase > 0.97) icon = "🌑";
        else if (phase < 0.22) icon = "🌒";
        else if (phase < 0.28) icon = "🌓";
        else if (phase < 0.47) icon = "🌔";
        else if (phase < 0.53) icon = "🌕";
        else if (phase < 0.72) icon = "🌖";
        else if (phase < 0.78) icon = "🌗";
        else icon = "🌘";

        html += `<div class='hc-cal-day'>
            <span class='hc-cal-num'>${d}</span>
            <span class='hc-cal-icon'>${icon}</span>
        </div>`;
    }
    html += "</div>";

    document.getElementById('hc-cal-container').innerHTML = html;
    document.getElementById('hc-cal-result').classList.add('visible');
}

// Auto run on load if visible
document.addEventListener('DOMContentLoaded', () => {
    if(document.getElementById('hc-cal-container')) hcAyTakvimiHesapla();
});

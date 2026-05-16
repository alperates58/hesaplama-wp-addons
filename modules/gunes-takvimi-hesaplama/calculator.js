function hcGunesTakvimiHesapla() {
    const month = parseInt(document.getElementById('hc-sc-month').value);
    const year = parseInt(document.getElementById('hc-sc-year').value);
    const cityCoord = document.getElementById('hc-sc-city').value.split(',');
    const lat = parseFloat(cityCoord[0]);
    const lon = parseFloat(cityCoord[1]);

    function getSunTimes(d, lat, lon) {
        function getJD(date) { return (date.getTime() / 86400000) - (date.getTimezoneOffset() / 1440) + 2440587.5; }
        const jd = getJD(d);
        const n = jd - 2451545.0;
        
        let L = (280.460 + 0.9856474 * n) % 360;
        let g = (357.528 + 0.9856003 * n) % 360;
        let lambda = (L + 1.915 * Math.sin(g * Math.PI / 180) + 0.020 * Math.sin(2 * g * Math.PI / 180) + 360) % 360;
        let epsilon = 23.439 - 0.0000004 * n;
        let decl = Math.asin(Math.sin(epsilon * Math.PI / 180) * Math.sin(lambda * Math.PI / 180)) * 180 / Math.PI;
        
        // Hour angle for sunset/sunrise (-0.833 deg for refraction)
        let cosH = (Math.sin(-0.833 * Math.PI / 180) - Math.sin(lat * Math.PI / 180) * Math.sin(decl * Math.PI / 180)) / (Math.cos(lat * Math.PI / 180) * Math.cos(decl * Math.PI / 180));
        
        if (cosH > 1) return null; // Polar night
        if (cosH < -1) return null; // Polar day
        
        let H = Math.acos(cosH) * 180 / Math.PI;
        
        // Equation of Time (simplified)
        let y = Math.tan(epsilon * Math.PI / 360) ** 2;
        let et = (y * Math.sin(2 * L * Math.PI / 180) - 2 * (g / 360 * 2 * Math.PI) + 4 * y * Math.sin(g * Math.PI / 180) * Math.cos(2 * L * Math.PI / 180)) * 180 / Math.PI / 15;
        
        let noon = 12 - (lon / 15) - et + 3; // +3 for TR Timezone
        
        let sunrise = noon - (H / 15);
        let sunset = noon + (H / 15);
        
        function formatTime(t) {
            let h = Math.floor(t);
            let m = Math.floor((t - h) * 60);
            return `${h.toString().padStart(2, '0')}:${m.toString().padStart(2, '0')}`;
        }
        
        return {
            rise: formatTime(sunrise),
            set: formatTime(sunset),
            duration: `${Math.floor(2 * H / 15)}s ${Math.floor(((2 * H / 15) % 1) * 60)}dk`
        };
    }

    let daysInMonth = new Date(year, month, 0).getDate();
    let html = "";
    
    for (let d = 1; d <= daysInMonth; d++) {
        let date = new Date(year, month - 1, d, 12, 0, 0);
        let times = getSunTimes(date, lat, lon);
        
        if (times) {
            html += `<tr>
                <td>${d}</td>
                <td>${times.rise}</td>
                <td>${times.set}</td>
                <td>${times.duration}</td>
            </tr>`;
        }
    }

    document.getElementById('hc-sc-body').innerHTML = html;
    document.getElementById('hc-sun-calendar-result').classList.add('visible');
}

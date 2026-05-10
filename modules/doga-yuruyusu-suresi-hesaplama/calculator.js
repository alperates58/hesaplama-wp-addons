function hcHikingTimeHesapla() {
    const dist = parseFloat(document.getElementById('hc-ht-dist').value);
    const elev = parseFloat(document.getElementById('hc-ht-elev').value || 0);

    if (!dist) {
        alert('Lütfen mesafeyi giriniz.');
        return;
    }

    // Naismith's Rule: 
    // 1 hour for every 5 km + 1 hour for every 600m of ascent
    // In minutes: (dist / 5 * 60) + (elev / 600 * 60)
    
    const timeMinutes = (dist / 5 * 60) + (elev / 10); // 10 min for every 100m ascent (same as 1hr/600m)
    
    const h = Math.floor(timeMinutes / 60);
    const m = Math.round(timeMinutes % 60);

    const resVal = document.getElementById('hc-ht-res-val');
    resVal.innerText = `${h}:${m < 10 ? '0' + m : m}`;

    document.getElementById('hc-hiking-time-result').classList.add('visible');
}

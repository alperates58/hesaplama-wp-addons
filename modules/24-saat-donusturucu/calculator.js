function hc24To12() {
    const time = document.getElementById('hc-24h-val').value;
    if (!time) return;
    let [hr, min] = time.split(':');
    hr = parseInt(hr);
    const ampm = hr >= 12 ? 'PM' : 'AM';
    hr = hr % 12 || 12;
    document.getElementById('hc-12h-hr').value = hr;
    document.getElementById('hc-12h-min').value = min;
    document.getElementById('hc-12h-ampm').value = ampm;
}

function hc12To24() {
    let hr = parseInt(document.getElementById('hc-12h-hr').value);
    let min = parseInt(document.getElementById('hc-12h-min').value);
    const ampm = document.getElementById('hc-12h-ampm').value;
    
    if (isNaN(hr) || isNaN(min)) return;
    
    if (ampm === 'PM' && hr < 12) hr += 12;
    if (ampm === 'AM' && hr === 12) hr = 0;
    
    const hrStr = hr.toString().padStart(2, '0');
    const minStr = min.toString().padStart(2, '0');
    document.getElementById('hc-24h-val').value = `${hrStr}:${minStr}`;
}

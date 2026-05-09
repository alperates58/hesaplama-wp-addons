function hcSekerDegerlendir() {
    const fasting = parseFloat(document.getElementById('hc-ge-fasting').value);
    const post = parseFloat(document.getElementById('hc-ge-post').value);

    if (isNaN(fasting) && isNaN(post)) {
        alert('Lütfen en az bir değer girin.');
        return;
    }

    const status = document.getElementById('hc-ge-status');
    const details = document.getElementById('hc-ge-details');
    let msg = '';
    let color = '';
    let bg = '';

    if (!isNaN(fasting)) {
        if (fasting < 70) {
            msg += '<b>Açlık:</b> Düşük (Hipoglisemi). ';
            color = '#c62828'; bg = '#ffebee';
        } else if (fasting <= 100) {
            msg += '<b>Açlık:</b> Normal. ';
            if (!color) { color = '#2e7d32'; bg = '#e8f5e9'; }
        } else if (fasting <= 125) {
            msg += '<b>Açlık:</b> Sınırda (Prediyabet). ';
            if (color !== '#c62828') { color = '#ef6c00'; bg = '#fff3e0'; }
        } else {
            msg += '<b>Açlık:</b> Yüksek (Diyabet Göstergesi). ';
            color = '#c62828'; bg = '#ffebee';
        }
    }

    if (!isNaN(post)) {
        if (post < 140) {
            msg += '<br><b>Tokluk (2. sa):</b> Normal. ';
        } else if (post <= 199) {
            msg += '<br><b>Tokluk (2. sa):</b> Sınırda (Prediyabet). ';
            if (color !== '#c62828') { color = '#ef6c00'; bg = '#fff3e0'; }
        } else {
            msg += '<br><b>Tokluk (2. sa):</b> Yüksek (Diyabet Göstergesi). ';
            color = '#c62828'; bg = '#ffebee';
        }
    }

    status.innerHTML = 'ANALİZ SONUCU';
    status.style.backgroundColor = bg;
    status.style.color = color;
    details.innerHTML = msg;

    document.getElementById('hc-gl-eval-result').classList.add('visible');
}

function hc531AntrenmanAgirligiHesapla() {
    const oneRM = parseFloat(document.getElementById('hc-531-1rm').value);

    if (!oneRM) {
        alert('Lütfen 1RM değerinizi girin.');
        return;
    }

    // Training Max (TM) = 1RM * 0.90
    const tm = oneRM * 0.90;
    document.getElementById('hc-531-tm-info').innerText = `Training Max (TM): ${tm.toLocaleString('tr-TR', { maximumFractionDigits: 1 })} kg (%90)`;

    const cycle = {
        w1: [{ p: 65, r: '5' }, { p: 75, r: '5' }, { p: 85, r: '5+' }],
        w2: [{ p: 70, r: '3' }, { p: 80, r: '3' }, { p: 90, r: '3+' }],
        w3: [{ p: 75, r: '5' }, { p: 85, r: '3' }, { p: 95, r: '1+' }],
        w4: [{ p: 40, r: '5' }, { p: 50, r: '5' }, { p: 60, r: '5' }]
    };

    const renderWeek = (id, sets) => {
        let html = '<ul>';
        sets.forEach(s => {
            const weight = Math.round((tm * (s.p / 100)) / 2.5) * 2.5; // 2.5 kg yuvarlama
            html += `<li><strong>%${s.p}</strong>: ${weight.toLocaleString('tr-TR')} kg × ${s.r}</li>`;
        });
        html += '</ul>';
        document.getElementById(id).innerHTML = html;
    };

    renderWeek('hc-531-w1', cycle.w1);
    renderWeek('hc-531-w2', cycle.w2);
    renderWeek('hc-531-w3', cycle.w3);
    renderWeek('hc-531-w4', cycle.w4);

    document.getElementById('hc-531-result').classList.add('visible');
}

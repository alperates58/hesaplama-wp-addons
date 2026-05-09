function hcSaatFarkiHesapla() {
    const tz1 = document.getElementById('hc-sf-tz1').value;
    const tz2 = document.getElementById('hc-sf-tz2').value;

    const now = new Date();
    
    function getOffset(date, tz) {
        const parts = new Intl.DateTimeFormat('en-US', {
            timeZone: tz,
            timeZoneName: 'shortOffset'
        }).formatToParts(date);
        const tzName = parts.find(p => p.type === 'timeZoneName').value;
        // Format is usually GMT+3 or GMT-5
        const offset = tzName.replace('GMT', '').replace(':', '.') || '0';
        return parseFloat(offset);
    }

    const o1 = getOffset(now, tz1);
    const o2 = getOffset(now, tz2);
    const diff = o2 - o1;

    const absDiff = Math.abs(diff);
    const h = Math.floor(absDiff);
    const m = Math.round((absDiff - h) * 60);

    let resText = "";
    if (diff === 0) {
        resText = "İki bölge arasında saat farkı yoktur.";
    } else {
        resText = `${Math.abs(h)} saat ${m > 0 ? m + ' dakika ' : ''} ${diff > 0 ? 'ileride' : 'geride'}`;
    }

    document.getElementById('hc-sf-val').innerText = resText;
    document.getElementById('hc-sf-info').innerText = `${tz2} bölgesi, ${tz1} bölgesine göre saat farkı.`;
    document.getElementById('hc-sf-result').classList.add('visible');
}

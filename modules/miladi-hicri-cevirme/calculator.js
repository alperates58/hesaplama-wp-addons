function hcMiladiHicriCevir() {
    const type = document.getElementById('hc-mh-type').value;
    let result = "";

    if (type === 'm2h') {
        const mDate = document.getElementById('hc-mh-m-date').value;
        if (!mDate) { alert('Lütfen tarih seçin.'); return; }
        const date = new Date(mDate);
        result = new Intl.DateTimeFormat('tr-u-ca-islamic-uma-nu-latn', {
            day: 'numeric', month: 'long', year: 'numeric'
        }).format(date);
    } else {
        const day = parseInt(document.getElementById('hc-mh-h-day').value);
        const month = parseInt(document.getElementById('hc-mh-h-month').value);
        const year = parseInt(document.getElementById('hc-mh-h-year').value);
        
        if (!day || !month || !year) { alert('Lütfen Hicri tarihi tam girin.'); return; }

        // Simplified H2M approximation (Hijri to Gregorian)
        // Formula: M = H - (H / 33) + 622
        // For precision, we use the fact that Hijri year has ~354.36 days
        const jd = Math.floor((11 * year + 3) / 30) + 354 * year + 30 * month - Math.floor((month - 1) / 2) + day + 1948440 - 385;
        const date = new Date((jd - 2440587.5) * 86400000);
        result = date.toLocaleDateString('tr-TR', { day: 'numeric', month: 'long', year: 'numeric' });
    }

    document.getElementById('hc-mh-val').innerText = result;
    document.getElementById('hc-mh-result').classList.add('visible');
}

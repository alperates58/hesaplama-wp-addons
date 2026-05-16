function hcHilalHesapla() {
    const dateStr = document.getElementById('hc-hil-date').value;
    if (!dateStr) { alert('Lütfen tarih seçin.'); return; }

    function getElongation(d) {
        function getJD(date) { return (date.getTime() / 86400000) - (date.getTimezoneOffset() / 1440) + 2440587.5; }
        const n = getJD(d) - 2451545.0;
        let Ls = (280.460 + 0.9856474 * n) % 360;
        let gs = (357.528 + 0.9856003 * n) % 360;
        let sunL = (Ls + 1.915 * Math.sin(gs * Math.PI / 180) + 360) % 360;
        let Lm = (218.316 + 13.176396 * n) % 360;
        let Mm = (134.963 + 13.064993 * n) % 360;
        let moonL = (Lm + 6.289 * Math.sin(Mm * Math.PI / 180) + 360) % 360;
        return (moonL - sunL + 360) % 360;
    }

    let current = new Date(dateStr + 'T12:00:00');
    let nmDate = null;
    
    // Find next New Moon
    for (let i = 0; i < 31; i++) {
        let e1 = getElongation(current);
        current.setHours(current.getHours() + 1);
        let e2 = getElongation(current);
        if (e1 > 350 && e2 < 10 && e2 < e1) {
            nmDate = new Date(current);
            break;
        }
    }

    if (!nmDate) return;

    // Visibility usually starts 18-24h after New Moon
    let visibilityDate = new Date(nmDate.getTime() + 24 * 3600000);
    const options = { day: 'numeric', month: 'long', year: 'numeric', hour: '2-digit', minute: '2-digit' };
    
    document.getElementById('hc-hil-status').innerHTML = "Sıradaki Hilal Görünümü";
    document.getElementById('hc-hil-info').innerHTML = `
        <p><strong>Yeni Ay (İçtima):</strong> ${nmDate.toLocaleDateString('tr-TR', options)}</p>
        <p><strong>İlk Görünürlük (Tahmini):</strong> ${visibilityDate.toLocaleDateString('tr-TR', options)}</p>
        <p class="hc-note">Not: Hilal görünürlüğü atmosferik şartlara ve gözlem yerinin koordinatlarına göre +/- 12 saat değişiklik gösterebilir.</p>
    `;

    document.getElementById('hc-hilal-result').classList.add('visible');
}

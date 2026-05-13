function hcCI90Hesapla() {
    const mean = parseFloat(document.getElementById('hc-ci90-mean').value);
    const sd = parseFloat(document.getElementById('hc-ci90-sd').value);
    const n = parseInt(document.getElementById('hc-ci90-n').value);

    if (isNaN(mean) || isNaN(sd) || isNaN(n) || n <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    const z = 1.645;
    const se = sd / Math.sqrt(n);
    const me = z * se;

    const lower = mean - me;
    const upper = mean + me;

    const fmt = (val) => val.toLocaleString('tr-TR', { maximumFractionDigits: 4 });

    document.getElementById('hc-res-ci90-val').innerText = `[${fmt(lower)} - ${fmt(upper)}]`;
    document.getElementById('hc-res-ci90-me').innerText = '± ' + fmt(me);

    document.getElementById('hc-yuzde-90-guven-araligi-hesaplama-result').classList.add('visible');
}

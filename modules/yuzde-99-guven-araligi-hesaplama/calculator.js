function hcCI99Hesapla() {
    const mean = parseFloat(document.getElementById('hc-ci99-mean').value);
    const sd = parseFloat(document.getElementById('hc-ci99-sd').value);
    const n = parseInt(document.getElementById('hc-ci99-n').value);

    if (isNaN(mean) || isNaN(sd) || isNaN(n) || n <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    const z = 2.576;
    const se = sd / Math.sqrt(n);
    const me = z * se;

    const lower = mean - me;
    const upper = mean + me;

    const fmt = (val) => val.toLocaleString('tr-TR', { maximumFractionDigits: 4 });

    document.getElementById('hc-res-ci99-val').innerText = `[${fmt(lower)} - ${fmt(upper)}]`;
    document.getElementById('hc-res-ci99-me').innerText = '± ' + fmt(me);

    document.getElementById('hc-yuzde-99-guven-araligi-hesaplama-result').classList.add('visible');
}

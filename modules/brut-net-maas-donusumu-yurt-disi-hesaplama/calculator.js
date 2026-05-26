function hcBrutNetYurtDisiHesapla() {
    var brut = parseFloat(document.getElementById('hc-bnm-brut').value) || 0;
    var ulke = document.getElementById('hc-bnm-ulke').value;

    if (brut <= 0) {
        alert('Lütfen brüt maaş tutarını giriniz.');
        return;
    }

    var kesintiOrani = 0.25; // USA
    var paraBirimi = ' $';

    if (ulke === 'deu') {
        kesintiOrani = 0.42;
        paraBirimi = ' €';
    } else if (ulke === 'gbr') {
        kesintiOrani = 0.30;
        paraBirimi = ' £';
    } else if (ulke === 'nld') {
        kesintiOrani = 0.35;
        paraBirimi = ' €';
    }

    var kesinti = brut * kesintiOrani;
    var netYil = brut - kesinti;
    var netAy = netYil / 12;

    document.getElementById('hc-bnm-res-brut').innerText = brut.toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2}) + paraBirimi;
    document.getElementById('hc-bnm-res-kesinti').innerText = kesinti.toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2}) + paraBirimi;
    document.getElementById('hc-bnm-res-net-yil').innerText = netYil.toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2}) + paraBirimi;
    document.getElementById('hc-bnm-res-net-ay').innerText = netAy.toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2}) + paraBirimi;

    document.getElementById('hc-bnm-result').classList.add('visible');
}
function hcMppiCozDegisti() {
    var coz = document.getElementById('hc-mppi-coz').value;
    var customDiv = document.getElementById('hc-mppi-custom-coz-gr');
    if (coz === 'custom') {
        customDiv.style.display = 'block';
    } else {
        customDiv.style.display = 'none';
    }
}

function hcMonitorPikselYogunluguHesapla() {
    var coz = document.getElementById('hc-mppi-coz').value;
    var diagonalCm = parseFloat(document.getElementById('hc-mppi-diagonal').value);

    var w = 1920;
    var h = 1080;

    if (coz === 'custom') {
        w = parseFloat(document.getElementById('hc-mppi-custom-w').value);
        h = parseFloat(document.getElementById('hc-mppi-custom-h').value);
    } else {
        var parts = coz.split('x');
        w = parseInt(parts[0]);
        h = parseInt(parts[1]);
    }

    if (isNaN(w) || w <= 0 || isNaN(h) || h <= 0 || isNaN(diagonalCm) || diagonalCm <= 0) {
        alert('Lütfen geçerli çözünürlük ve köşegen boyutu girin.');
        return;
    }

    // Toplam piksel
    var toplamPiksel = w * h;

    // Köşegen piksel sayısı (Pythagoras)
    var diagPixels = Math.sqrt(Math.pow(w, 2) + Math.pow(h, 2));

    // PPI ve PPCM
    var diagonalInch = diagonalCm / 2.54;
    var ppi = diagPixels / diagonalInch;
    var ppcm = diagPixels / diagonalCm;

    // Piksel Boyutu (Dot Pitch) (milimetre - mm)
    // 1 inç = 25.4 mm olduğu için, Dot Pitch (mm) = 25.4 / PPI
    var dotPitch = 25.4 / ppi;

    var fmtSayi = function(val, dec) {
        return val.toLocaleString('tr-TR', { minimumFractionDigits: dec, maximumFractionDigits: dec });
    };

    document.getElementById('hc-mppi-res-toplam').textContent = fmtSayi(toplamPiksel, 0) + ' piksel (~' + fmtSayi(toplamPiksel / 1000000, 1) + ' MP)';
    document.getElementById('hc-mppi-res-ppi').textContent = fmtSayi(ppi, 1) + ' PPI';
    document.getElementById('hc-mppi-res-ppcm').textContent = fmtSayi(ppcm, 1) + ' PPCM';
    document.getElementById('hc-mppi-res-boyut').textContent = fmtSayi(dotPitch, 4) + ' mm';

    var yorum = '';
    var renk = '';
    if (ppi < 90) {
        yorum = 'Düşük Netlik (Pikseller yakından belirgin şekilde fark edilir, büyük ekranlarda yazıların okunması zorlaşabilir).';
        renk = 'var(--hc-front-red)';
    } else if (ppi >= 90 && ppi < 115) {
        yorum = 'Standart Netlik (Ortalama çalışma mesafesinde yeterince keskin ve dengeli bir görüntü sunar, günlük kullanım için idealdir).';
        renk = 'var(--hc-front-text)';
    } else if (ppi >= 115 && ppi < 160) {
        yorum = 'Yüksek Keskinlik (Metinler çok net, pikselleri ayırt etmek oldukça zordur. Grafik tasarım ve oyunculuk için mükemmeldir).';
        renk = 'var(--hc-front-blue)';
    } else {
        yorum = 'Mükemmel Retina Netliği (Çok yüksek yoğunluk, yazı kenarları son derece pürüzsüz ve keskindir. Üst düzey netlik deneyimi sağlar).';
        renk = 'var(--hc-front-green)';
    }

    var yorumEl = document.getElementById('hc-mppi-res-yorum');
    yorumEl.textContent = yorum;
    yorumEl.style.color = renk;

    document.getElementById('hc-monitor-ppi-result').classList.add('visible');
}

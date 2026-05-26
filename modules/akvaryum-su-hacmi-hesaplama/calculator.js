function hcAkvaryumSekilDegisti() {
    var sekil = document.getElementById('hc-ash-sekil').value;
    document.getElementById('hc-ash-input-dikdortgen').style.display = sekil === 'dikdortgen' ? 'block' : 'none';
    document.getElementById('hc-ash-input-silindir').style.display = sekil === 'silindir' ? 'block' : 'none';
    document.getElementById('hc-ash-input-ceyrek').style.display = sekil === 'ceyrek' ? 'block' : 'none';
}

function hcAkvaryumHacimHesapla() {
    var sekil = document.getElementById('hc-ash-sekil').value;
    var yukseklik = parseFloat(document.getElementById('hc-ash-yukseklik').value) || 0;
    var kum = parseFloat(document.getElementById('hc-ash-kum').value) || 0;

    if (yukseklik <= 0) {
        alert('Lütfen geçerli bir su yüksekliği giriniz.');
        return;
    }

    var brutHacim = 0;
    var kumHacim = 0;

    if (sekil === 'dikdortgen') {
        var genislik = parseFloat(document.getElementById('hc-ash-genislik').value) || 0;
        var derinlik = parseFloat(document.getElementById('hc-ash-derinlik').value) || 0;
        if (genislik <= 0 || derinlik <= 0) {
            alert('Lütfen genişlik ve derinlik değerlerini giriniz.');
            return;
        }
        brutHacim = (genislik * derinlik * yukseklik) / 1000;
        kumHacim = (genislik * derinlik * kum) / 1000;
    } else if (sekil === 'silindir') {
        var cap = parseFloat(document.getElementById('hc-ash-cap').value) || 0;
        if (cap <= 0) {
            alert('Lütfen çap değerini giriniz.');
            return;
        }
        var yaricap = cap / 2;
        brutHacim = (Math.PI * Math.pow(yaricap, 2) * yukseklik) / 1000;
        kumHacim = (Math.PI * Math.pow(yaricap, 2) * kum) / 1000;
    } else if (sekil === 'ceyrek') {
        var yaricap = parseFloat(document.getElementById('hc-ash-yaricap').value) || 0;
        if (yaricap <= 0) {
            alert('Lütfen yarıçap değerini giriniz.');
            return;
        }
        brutHacim = (Math.PI * Math.pow(yaricap, 2) * yukseklik) / 4000;
        kumHacim = (Math.PI * Math.pow(yaricap, 2) * kum) / 4000;
    }

    var netHacim = Math.max(0, brutHacim - kumHacim);
    var kumAgirlik = kumHacim * 1.5; // Ortalama kuru kum yoğunluğu ~1.5 kg/L

    document.getElementById('hc-ash-res-brut').innerText = brutHacim.toFixed(1) + ' Litre';
    document.getElementById('hc-ash-res-kum-hacim').innerText = kumHacim.toFixed(1) + ' Litre';
    document.getElementById('hc-ash-res-kum-agirlik').innerText = kumAgirlik.toFixed(1) + ' kg';
    document.getElementById('hc-ash-res-net').innerText = netHacim.toFixed(1) + ' Litre';

    document.getElementById('hc-ash-result').classList.add('visible');
}
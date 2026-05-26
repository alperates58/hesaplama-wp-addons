function hcFiltreHesapla() {
    var hacim = parseFloat(document.getElementById('hc-afk-hacim').value) || 0;
    var katsayi = parseFloat(document.getElementById('hc-afk-yuk').value) || 4;

    if (hacim <= 0) {
        alert('Lütfen akvaryum hacmini giriniz.');
        return;
    }

    var debi = hacim * katsayi;
    var sepet = hacim * 0.05; // Genel kural: tank hacminin ~%5'i kadar biyolojik filtre sepeti hacmi

    document.getElementById('hc-afk-res-devir').innerText = katsayi + ' Defa / Saat';
    document.getElementById('hc-afk-res-debi').innerText = debi.toFixed(0) + ' L/h';
    document.getElementById('hc-afk-res-sepet').innerText = sepet.toFixed(1) + ' Litre';

    document.getElementById('hc-afk-result').classList.add('visible');
}
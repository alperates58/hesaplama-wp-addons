function hcMotoGucHesapla() {
    var bore = parseFloat(document.getElementById('hc-mmg-bore').value) || 0;
    var stroke = parseFloat(document.getElementById('hc-mmg-stroke').value) || 0;
    var cyl = parseInt(document.getElementById('hc-mmg-cyl').value) || 1;
    var tork = parseFloat(document.getElementById('hc-mmg-tork').value) || 0;
    var devir = parseFloat(document.getElementById('hc-mmg-devir').value) || 0;

    if (bore <= 0 || stroke <= 0) {
        alert('Lütfen silindir çapı ve strok değerlerini giriniz.');
        return;
    }

    // Hacim = pi * (bore/2)^2 * stroke * silindir sayısı / 1000
    var yaricap = bore / 2;
    var cc = (Math.PI * Math.pow(yaricap, 2) * stroke * cyl) / 1000;

    // Güç (HP) = Tork (Nm) * Devir (RPM) / 7120.74 (Metrik HP formülü)
    var hp = 0;
    var kw = 0;
    if (tork > 0 && devir > 0) {
        hp = (tork * devir) / 7120.74;
        kw = hp * 0.7457;
    }

    document.getElementById('hc-mmg-res-cc').innerText = cc.toFixed(1) + ' cc';
    document.getElementById('hc-mmg-res-hp').innerText = hp.toFixed(2) + ' HP (Beygir)';
    document.getElementById('hc-mmg-res-kw').innerText = kw.toFixed(2) + ' kW';

    document.getElementById('hc-mmg-result').classList.add('visible');
}
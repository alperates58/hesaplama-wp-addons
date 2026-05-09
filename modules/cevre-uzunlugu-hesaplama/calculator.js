function hcCevreSekilDegistir() {
    var sekil = document.getElementById('hc-cuh-sekil').value;
    var gruplar = ['kare','dikdortgen','ucgen','daire','cokgen'];
    gruplar.forEach(function(g) {
        document.getElementById('hc-cuh-' + g + '-grup').style.display = (g === sekil) ? 'block' : 'none';
    });
}

function hcCevreUzunluguHesapla() {
    var sekil = document.getElementById('hc-cuh-sekil').value;
    var sonuc = document.getElementById('hc-cevre-uzunlugu-hesaplama-result');
    var cevre, html;
    if (sekil === 'kare') {
        var a = parseFloat(document.getElementById('hc-cuh-kare-a').value);
        if (isNaN(a) || a <= 0) { alert('Kenar uzunluğunu girin.'); return; }
        cevre = 4 * a;
        html = '<p><strong>Kare Çevresi = 4 × ' + a.toLocaleString('tr-TR') + ' m</strong></p><p class="hc-result-value">' + cevre.toLocaleString('tr-TR', {maximumFractionDigits: 6}) + ' m</p>';
    } else if (sekil === 'dikdortgen') {
        var en = parseFloat(document.getElementById('hc-cuh-dk-en').value);
        var boy = parseFloat(document.getElementById('hc-cuh-dk-boy').value);
        if (isNaN(en) || isNaN(boy) || en <= 0 || boy <= 0) { alert('En ve boy değerlerini girin.'); return; }
        cevre = 2 * (en + boy);
        html = '<p><strong>Dikdörtgen Çevresi = 2 × (' + en.toLocaleString('tr-TR') + ' + ' + boy.toLocaleString('tr-TR') + ') m</strong></p><p class="hc-result-value">' + cevre.toLocaleString('tr-TR', {maximumFractionDigits: 6}) + ' m</p>';
    } else if (sekil === 'ucgen') {
        var ua = parseFloat(document.getElementById('hc-cuh-uc-a').value);
        var ub = parseFloat(document.getElementById('hc-cuh-uc-b').value);
        var uc = parseFloat(document.getElementById('hc-cuh-uc-c').value);
        if (isNaN(ua) || isNaN(ub) || isNaN(uc)) { alert('Üç kenar uzunluğunu girin.'); return; }
        cevre = ua + ub + uc;
        html = '<p><strong>Üçgen Çevresi = ' + ua.toLocaleString('tr-TR') + ' + ' + ub.toLocaleString('tr-TR') + ' + ' + uc.toLocaleString('tr-TR') + ' m</strong></p><p class="hc-result-value">' + cevre.toLocaleString('tr-TR', {maximumFractionDigits: 6}) + ' m</p>';
    } else if (sekil === 'daire') {
        var r = parseFloat(document.getElementById('hc-cuh-da-r').value);
        if (isNaN(r) || r <= 0) { alert('Yarıçapı girin.'); return; }
        cevre = 2 * Math.PI * r;
        html = '<p><strong>Çember Çevresi = 2π × ' + r.toLocaleString('tr-TR') + ' m</strong></p><p class="hc-result-value">' + cevre.toLocaleString('tr-TR', {maximumFractionDigits: 6}) + ' m</p>';
    } else {
        var n = parseInt(document.getElementById('hc-cuh-ck-n').value);
        var ka = parseFloat(document.getElementById('hc-cuh-ck-a').value);
        if (isNaN(n) || n < 3 || isNaN(ka) || ka <= 0) { alert('Kenar sayısı (≥3) ve kenar uzunluğunu girin.'); return; }
        cevre = n * ka;
        html = '<p><strong>' + n + ' kenarlı düzgün çokgen çevresi = ' + n + ' × ' + ka.toLocaleString('tr-TR') + ' m</strong></p><p class="hc-result-value">' + cevre.toLocaleString('tr-TR', {maximumFractionDigits: 6}) + ' m</p>';
    }
    sonuc.innerHTML = html;
    sonuc.classList.add('visible');
}

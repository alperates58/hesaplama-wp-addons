function hcDogrulukTablosuOlustur() {
    var islem = document.getElementById('hc-dtb-islem').value;
    var sonuc = document.getElementById('hc-dogruluk-tablosu-hesaplama-result');
    var html = '<table class="hc-dtb-tablo"><tr>';
    if (islem === 'not') {
        html += '<th>A</th><th>NOT A</th></tr>';
        [[0,1],[1,0]].forEach(function(r){ html += '<tr><td>' + r[0] + '</td><td>' + r[1] + '</td></tr>'; });
    } else {
        var baslik = { and:'AND', or:'OR', xor:'XOR', nand:'NAND', nor:'NOR' };
        html += '<th>A</th><th>B</th><th>A ' + baslik[islem] + ' B</th></tr>';
        [[0,0],[0,1],[1,0],[1,1]].forEach(function(r) {
            var a=r[0], b=r[1], c;
            if (islem==='and') c=a&b; else if (islem==='or') c=a|b;
            else if (islem==='xor') c=a^b; else if (islem==='nand') c=1-(a&b); else c=1-(a|b);
            html += '<tr><td>' + a + '</td><td>' + b + '</td><td>' + c + '</td></tr>';
        });
    }
    html += '</table>';
    var aciklamalar = { and:'Her iki girişin 1 olması gerekir.', or:'En az bir giriş 1 ise 1.', xor:'Girişler farklıysa 1.', not:'Girişin tersi.', nand:'AND\'ın tersi.', nor:'OR\'ın tersi.' };
    html += '<p><strong>Kural:</strong> ' + aciklamalar[islem] + '</p>';
    sonuc.innerHTML = html;
    sonuc.classList.add('visible');
}

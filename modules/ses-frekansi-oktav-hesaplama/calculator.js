function hcOktavHesapla() {
    var ref = parseFloat(document.getElementById('hc-sfo-referans').value) || 440;

    if (ref <= 0) {
        alert('Lütfen geçerli bir referans frekansı giriniz.');
        return;
    }

    var tbody = document.getElementById('hc-sfo-table-body');
    tbody.innerHTML = '';

    // Havada ses hızı ~343 m/s = 34300 cm/s
    var sesHizi = 34300; 

    // -4'ten +4'e oktav aralıklarını hesapla
    for (var oct = -4; oct <= 4; oct++) {
        var frekans = ref * Math.pow(2, oct);
        var dalgaBoyu = sesHizi / frekans;
        
        var terim = 'Orta Frekans';
        if (oct < -2) terim = 'Alt Bas (Sub-Bass)';
        else if (oct < 0) terim = 'Bas / Alt Mid';
        else if (oct === 0) terim = 'Referans Oktav';
        else if (oct < 3) terim = 'Üst Mid (High-Mid)';
        else terim = 'Tiz (Treble)';

        var isaret = oct >= 0 ? '+' + oct : oct;
        if (oct === 0) isaret = '0 (Referans)';

        var tr = document.createElement('tr');
        if (oct === 0) {
            tr.style.fontWeight = 'bold';
            tr.style.background = 'rgba(16, 185, 129, 0.08)';
        }
        
        tr.innerHTML = '<td>Oktav ' + isaret + '</td>' +
                       '<td>' + terim + '</td>' +
                       '<td style="text-align:right; font-weight:bold;">' + frekans.toFixed(2) + ' Hz</td>' +
                       '<td style="text-align:right;">' + dalgaBoyu.toFixed(1) + ' cm</td>';
        tbody.appendChild(tr);
    }

    document.getElementById('hc-sfo-result').classList.add('visible');
}
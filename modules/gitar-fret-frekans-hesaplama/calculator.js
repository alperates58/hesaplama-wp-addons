function hcGitarFretHesapla() {
    var skala = parseFloat(document.getElementById('hc-gff-skala').value) || 0;
    var fretSayisi = parseInt(document.getElementById('hc-gff-fret-sayisi').value) || 22;
    var bosFrekans = parseFloat(document.getElementById('hc-gff-frekans').value) || 329.63;

    if (skala <= 0 || fretSayisi <= 0) {
        alert('Lütfen geçerli skala uzunluğu ve fret sayısı giriniz.');
        return;
    }

    var tbody = document.getElementById('hc-gff-table-body');
    tbody.innerHTML = '';

    var k = 17.817154; // 18 Kuralı sabiti
    var kalanSkala = skala;
    var kumulatifUzaklik = 0;

    for (var i = 1; i <= fretSayisi; i++) {
        var fretUzaklik = kalanSkala / k;
        kalanSkala = kalanSkala - fretUzaklik;
        kumulatifUzaklik += fretUzaklik;
        
        // Frekans = f0 * 2^(n/12)
        var frekans = bosFrekans * Math.pow(2, i / 12);

        var tr = document.createElement('tr');
        tr.innerHTML = '<td>Fret ' + i + '</td>' +
                       '<td style="text-align:right;">' + kumulatifUzaklik.toFixed(2) + ' mm</td>' +
                       '<td style="text-align:right;">' + fretUzaklik.toFixed(2) + ' mm</td>' +
                       '<td style="text-align:right;">' + frekans.toFixed(2) + ' Hz</td>';
        tbody.appendChild(tr);
    }

    document.getElementById('hc-gff-result').classList.add('visible');
}